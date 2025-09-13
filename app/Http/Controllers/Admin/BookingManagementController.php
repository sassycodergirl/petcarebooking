<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
            $bookings = Booking::where('status', 'cancelled')
                ->orderBy('check_in', 'desc')
                ->paginate(20);

            return view('admin.bookings.cancelled', compact('bookings'));
        }

    // Calendar view
    public function calendar()
    {
        return view('admin.bookings.calendar');
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
        $booking->update(['status' => 'cancelled']);

        // Send WhatsApp notification
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
}
