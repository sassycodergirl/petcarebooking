<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PetSlotReservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Helpers\TwilioHelper;

class BookingManagementController extends Controller
{
    // Show all bookings
    public function index()
    {
        $bookings = Booking::latest()->paginate(20);
        return view('admin.bookings.index', compact('bookings'));
    }

    // Upcoming bookings
    public function upcoming()
    {
       $bookings = Booking::where('check_in', '>=', Carbon::now())
        ->whereIn('status', ['approved']) // only active ones
        ->orderBy('check_in')
        ->paginate(20);
        return view('admin.bookings.upcoming', compact('bookings'));
    }

    // Past bookings
   public function past()
    {
        $bookings = Booking::where(function ($query) {
                $query->where('check_out', '<', Carbon::now())
                    ->orWhere('status', 'completed'); // force completed into past
            })
            ->orderBy('check_out', 'desc')
            ->paginate(20);

        return view('admin.bookings.past', compact('bookings'));
    }

    // Pending approvals
    public function pending()
    {
        $bookings = Booking::where('status', 'pending')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.bookings.pending', compact('bookings'));
    }

    // Cancelled bookings
    public function cancelled()
    {
        $bookings = Booking::with('user')
                        ->where('status', 'cancelled')
                        ->orderBy('check_in', 'desc')
                        ->paginate(15);

        return view('admin.bookings.cancelled', compact('bookings'));
    }

   

    // Show single booking details
    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    // Approve booking

    public function approve(Booking $booking)
    {
        $booking->update(['status' => 'approved']);

        // Send WhatsApp notification
        if ($booking->user && $booking->user->phone) {
            $checkIn  = Carbon::parse($booking->check_in)->format('M d, h:i A');
            $checkOut = Carbon::parse($booking->check_out)->format('M d, h:i A');
            $bookingType = isset($booking->booking_type) ? ucfirst($booking->booking_type) : 'N/A';
             $message = "Hi {$booking->user->name}, your booking #{$booking->id} ({$bookingType}) has been approved. "
             . "Check-in: {$checkIn}, Check-out: {$checkOut}. "
             . "We are looking forward to seeing you!";

            TwilioHelper::sendWhatsApp($booking->user->phone, $message);
          
        }

        return back()->with('success', 'Booking approved successfully.');
    }

    // Cancel booking
    public function cancel(Booking $booking)
    {
        DB::transaction(function () use ($booking) {
            // 1. Only proceed if booking is not already cancelled
            if ($booking->status !== 'cancelled') {
                $booking->update(['status' => 'cancelled']);

                // 2. Cancel all related pet slot reservations
                $booking->reservations()->active()->get()->each(function ($reservation) {
                    $reservation->cancel();
                });

                // 3. Send WhatsApp notification
                if ($booking->user && $booking->user->phone) {
                    $refundAmount = isset($booking->total_price) ? "₹{$booking->total_price}" : "the paid amount";
                    $bookingType = isset($booking->booking_type) ? ucfirst($booking->booking_type) : 'N/A';
                    $checkIn = isset($booking->check_in) ? $booking->check_in->format('d M Y, h:i A') : 'N/A';
                    $checkOut = isset($booking->check_out) ? $booking->check_out->format('d M Y, h:i A') : 'N/A';
                    TwilioHelper::sendWhatsApp(
                        $booking->user->phone,
                        "Hi {$booking->user->name}, unfortunately your booking #{$booking->id} ({$bookingType}) has been cancelled. Check-in: {$checkIn}, Check-out: {$checkOut}. A refund of {$refundAmount} will be initiated shortly."
                    );
                }
            }
        });

        return back()->with('success', 'Booking cancelled successfully.');
    }


    // Mark booking as complete
    public function complete(Booking $booking)
    {
        $booking->update(['status' => 'completed']);
         // Dummy Google review link
        $googleReviewLink = "https://g.page/r/CUSTOM_DUMMY_REVIEW_LINK";

        // Send WhatsApp notification to user
        if ($booking->user && $booking->user->phone) {
            TwilioHelper::sendWhatsApp(
                $booking->user->phone,
                "Hi {$booking->user->name}, your booking #{$booking->id} has been completed. Thank you for choosing us! Your pet's stay is completed. We'd love to hear your feedback – please leave us a review: {$googleReviewLink}"
            );
        }

        return back()->with('success', 'Booking marked as completed and user notified.');
    }


    public function bookingCalendarView()
    {
        return view('admin.bookings.booking-calendar'); // updated blade name
    }
    public function bookingCalendarData(Request $request){
        // FullCalendar sends start/end params (ISO dates). We'll use them to limit the dataset.
        $start = $request->query('start'); // e.g. 2025-09-01
        $end   = $request->query('end');   // e.g. 2025-09-30

        // Base query: exclude cancelled bookings
        $query = Booking::with('user')
            ->where('status', '!=', 'cancelled');

        // If FullCalendar gave a visible range, fetch only bookings that intersect that range
        if ($start && $end) {
            $query->where(function($q) use ($start, $end) {
                $q->whereBetween('check_in', [$start, $end])
                ->orWhereBetween('check_out', [$start, $end])
                ->orWhere(function($q2) use ($start, $end) {
                    $q2->where('check_in', '<=', $start)->where('check_out', '>=', $end);
                });
            });
        }

        $bookings = $query->get();

        // Aggregate per date
        $summary = [];

        foreach ($bookings as $b) {
            $checkIn  = Carbon::parse($b->check_in);
            $checkOut = Carbon::parse($b->check_out);

            $dates = [];

            if ($b->booking_type === 'daycare') {
                // Daycare occupies the check-in day only.
                $dates[] = $checkIn->toDateString();
            } else {
                // Boarding: 8:00 AM -> 8:00 AM next day cycle
                $current = $checkIn->copy()->setTime(8, 0);

                // Add each 8AM boundary date while current < checkOut
                while ($current->lt($checkOut)) {
                    $dates[] = $current->toDateString();
                    $current->addDay();
                }

                // If checkOut time is after 08:00, ensure check-out day is included (only if not already)
                if ($checkOut->format('H:i') > '08:00' && !in_array($checkOut->toDateString(), $dates)) {
                    $dates[] = $checkOut->toDateString();
                }
            }

            // Normalize unique dates
            $dates = array_values(array_unique($dates));

            // For each occupied date, increment the corresponding bucket and attach booking details
            foreach ($dates as $date) {
                if (!isset($summary[$date])) {
                    $summary[$date] = [
                        'daycare'  => 0,
                        'boarding' => 0,
                        'bookings' => []
                    ];
                }

                $summary[$date][$b->booking_type] += 1;

                // Prepare pet names if stored in extra_pet_details, otherwise empty array
                $petNames = [];
                if (!empty($b->extra_pet_details) && is_array($b->extra_pet_details)) {
                    $petNames = array_map(fn($p) => $p['name'] ?? '', $b->extra_pet_details);
                }

                $summary[$date]['bookings'][] = [
                    'id'        => $b->id,
                    'owner'     => $b->user->name ?? '',
                    'type'      => $b->booking_type,
                    'check_in'  => $checkIn->toDateTimeString(),
                    'check_out' => $checkOut->toDateTimeString(),
                    'location'  => $b->location,
                    'price'     => $b->total_price,
                    'status'    => $b->status,
                    'num_dogs'  => $b->num_dogs,
                    'num_cats'  => $b->num_cats,
                    'total_pets'=> ($b->num_dogs ?? 0) + ($b->num_cats ?? 0),
                ];
            }
        }

        // Build FullCalendar-friendly event array (one event per date that has any bookings)
        $events = [];
        foreach ($summary as $date => $data) {
            $events[] = [
                'title' => "Daycare: {$data['daycare']} | Boarding: {$data['boarding']}",
                'start' => $date,
                'allDay' => true,
                'extendedProps' => [
                    'bookings' => $data['bookings']
                ],
                // add a class so you can style days differently (optional)
                'classNames' => [
                    ($data['boarding'] > $data['daycare'] ? 'fc-boarding-heavy' : ($data['daycare'] > $data['boarding'] ? 'fc-daycare-heavy' : 'fc-mixed'))
                ]
            ];
        }

        return response()->json($events);
    }

}
