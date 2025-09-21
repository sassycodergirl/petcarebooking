<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pet;
use App\Models\Slot;
use App\Models\User;
use App\Models\Address;
use App\Models\PetSlotReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Helpers\TwilioHelper;

class BookingController extends Controller
{
    /**
     * Store booking + slot reservations
     */
    public function store(Request $request)
    {
        // 1. Validate request
        $validated = $request->validate([
            'location'       => 'required|string',
            'booking_type'   => 'required|in:daycare,boarding',
            'check_in'       => 'required|date',
            'check_out'      => 'required|date|after_or_equal:check_in',
            'base_price'     => 'required|numeric',
            'penalty_price'  => 'nullable|numeric',
            'total_price'    => 'required|numeric',
            'owner.name'     => 'required|string',
            'owner.contact'  => 'required|string',
            'owner.alt_contact' => 'nullable|string',
            'owner.address'  => 'required|string',
            'owner.aadhar'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'pets'           => 'required|json',
        ]);

        return DB::transaction(function () use ($validated, $request) {
            $user = Auth::user();

            // 2. Update user details
            $user->update([
                'name'                => $validated['owner']['name'],
                'alt_contact'         => $validated['owner']['alt_contact'] ?? null,
                'residential_address' => $validated['owner']['address'],
            ]);

            // Update or create default Home address
            $user->addresses()->updateOrCreate(
                ['type' => 'Home'], 
                [
                    'name'          => $validated['owner']['name'],
                    'address_line1' => $validated['owner']['address'],
                    'country'       => 'India',
                    'is_default'    => 1,
                ]
            );

            // 3. Handle Aadhar upload
            if ($request->hasFile('owner.aadhar')) {
                $aadharFile = $request->file('owner.aadhar');
                $aadharFileName = 'aadhar_' . time() . '.' . $aadharFile->getClientOriginalExtension();
                $aadharFile->move(public_path('user'), $aadharFileName);
                $user->update(['aadhar' => $aadharFileName]);
            }

            // 4. Decode pets JSON
            $petsData = json_decode($validated['pets'], true);
            $numPets = count($petsData);

            // 5. Count dogs and cats
            $numDogs = count(array_filter($petsData, fn($p) => strtolower($p['type']) === 'dog'));
            $numCats = count(array_filter($petsData, fn($p) => strtolower($p['type']) === 'cat'));

            // 6. Create booking
            $booking = Booking::create([
                'user_id'           => $user->id,
                'location'          => $validated['location'],
                'booking_type'      => $validated['booking_type'],
                'check_in'          => $validated['check_in'],
                'check_out'         => $validated['check_out'],
                'num_dogs'          => $numDogs,
                'num_cats'          => $numCats,
                'pet_ids'           => [], // fill after pet creation
                'extra_pet_details' => $petsData,
                'base_price'        => $validated['base_price'],
                'penalty_price'     => $validated['penalty_price'] ?? 0,
                'total_price'       => $validated['total_price'],
                'status'            => 'pending',
            ]);

            $petIds = [];

            // ---------------------- BULLETPROOF SLOT LOGIC ----------------------
            $checkIn  = Carbon::parse($validated['check_in']);
            $checkOut = Carbon::parse($validated['check_out']);
            $dates = [];

            if ($validated['booking_type'] === 'daycare') {
                $dates[] = $checkIn->toDateString();
            } else {
                // Boarding: 8:00 AM → 8:00 AM next day
                $start = $checkIn->copy()->setTime(8, 0);
                $end   = $checkOut->copy()->setTime(8, 0);

                // Create period from start to end
                $period = CarbonPeriod::create($start, '1 day', $end);

                foreach ($period as $date) {
                    $dates[] = $date->toDateString();
                }

                // Include checkout day if after 08:00
                if ($checkOut->gt($checkOut->copy()->setTime(8, 0))) {
                    $dates[] = $checkOut->toDateString();
                }

                // Remove duplicates
                $dates = array_unique($dates);
            }

            // ---------------------- CREATE SLOTS ----------------------
            foreach ($dates as $slotDate) {
                $slot = Slot::where('location', $validated['location'])
                    ->where('slot_date', $slotDate)
                    ->lockForUpdate()
                    ->first();

                if (!$slot) {
                    $slot = Slot::create([
                        'location'     => $validated['location'],
                        'slot_date'    => $slotDate,
                        'max_capacity' => 7,
                        'booked_count' => 0,
                    ]);
                }

                if ($slot->booked_count + $numPets > $slot->max_capacity) {
                    throw new \Exception("No slots available for {$slotDate} at {$validated['location']}");
                }

                // Increment once per slot (total pets)
                $slot->increment('booked_count', $numPets);
            }

            // ---------------------- CREATE PETS & RESERVATIONS ----------------------
            foreach ($petsData as $petData) {
                $pet = Pet::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'name'    => $petData['name'],
                        'type'    => $petData['type'],
                    ],
                    $petData
                );

                $petIds[] = $pet->id;

                foreach ($dates as $slotDate) {
                    $slot = Slot::where('location', $validated['location'])
                        ->where('slot_date', $slotDate)
                        ->first();

                    PetSlotReservation::create([
                        'booking_id' => $booking->id,
                        'pet_id'     => $pet->id,
                        'slot_id'    => $slot->id,
                        'status'     => 'active',
                    ]);
                }
            }

            $booking->update(['pet_ids' => $petIds]);

            // Send WhatsApp notification
            $ownerPhone = $validated['owner']['contact'];
            $checkInFmt  = $checkIn->format('M d, h:i A');
            $checkOutFmt = $checkOut->format('M d, h:i A');
            $bookingType = ucfirst($booking->booking_type ?? 'N/A');
            $message = "Hi {$validated['owner']['name']}, your booking (ID: {$booking->id}) ({$bookingType}) has been received and is currently pending approval. "
                . "Check-in: {$checkInFmt}, Check-out: {$checkOutFmt}. We’ll notify you once it is approved.";
            TwilioHelper::sendWhatsApp($ownerPhone, $message);

            return response()->json([
                'message' => 'Booking created successfully (pending)',
                'booking' => $booking,
                'redirect_url' => route('bookings.thankyou', $booking->id)
            ]);
        });
    }





    /**
     * Get availability for a location (fully booked dates & remaining slots)
     */
   /**
 * Get availability for a location (fully booked dates & remaining slots)
 */
    public function getAvailability(Request $request)
    {
        $location = $request->query('location', 'Kharghar');
        $monthStart = now()->startOfMonth();
        $monthEnd   = now()->endOfMonth();

        // Fetch all slots for the month for this location
        $slots = Slot::where('location', $location)
            ->whereBetween('slot_date', [$monthStart, $monthEnd])
            ->get(['slot_date', 'booked_count', 'max_capacity']);

        $availability = $slots->map(function ($slot) {
            return [
                'date'           => $slot->slot_date->toDateString(),
                'availableSlots' => max(0, $slot->max_capacity - $slot->booked_count),
                'isFullyBooked'  => $slot->booked_count >= $slot->max_capacity,
            ];
        });

        // Fully booked dates
        $fullyBookedDates = $availability->filter(fn($s) => $s['isFullyBooked'])
                                        ->pluck('date')
                                        ->values();

        return response()->json([
            'fullyBookedDates' => $fullyBookedDates,
            'availability'     => $availability,
        ]);
    }


    public function getUserPets()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['pets' => []]);
        }

        $pets = $user->pets()->get()->map(function ($pet) {
            return [
                'id'         => $pet->id,
                'name'       => $pet->name,
                'type'       => $pet->type,
                'breed'      => $pet->breed,
                'age'        => $pet->age,
                'gender'     => $pet->gender,
                'conditions' => $pet->conditions,
                'food'       => $pet->food,
            ];
        });

        return response()->json(['pets' => $pets]);
    }


    public function thankYou($id)
    {
        $booking = Booking::findOrFail($id);
        return view('frontend.bookings.thankyou', compact('booking'));
    }

}
