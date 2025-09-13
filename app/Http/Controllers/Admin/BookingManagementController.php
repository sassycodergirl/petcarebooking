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
        $bookings = Booking::where('check_in', '>=', Carbon::now())->orderBy('check_in')->paginate(20);
        return view('admin.bookings.upcoming', compact('bookings'));
    }

    // Past bookings
    public function past()
    {
        $bookings = Booking::where('check_out', '<', Carbon::now())->orderBy('check_out', 'desc')->paginate(20);
        return view('admin.bookings.past', compact('bookings'));
    }

    // Pending approvals
    public function pending()
    {
        $bookings = Booking::where('status', 'pending')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.bookings.pending', compact('bookings'));
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
            TwilioHelper::sendWhatsApp(
                $booking->user->phone,
                "Hi {$booking->user->name}, your booking #{$booking->id} has been approved. We look forward to seeing you!"
            );
        }

        return back()->with('success', 'Booking approved successfully.');
    }

    // Cancel booking
    public function cancel(Booking $booking)
    {
        $booking->update(['status' => 'cancelled']);

        // Send WhatsApp notification
        if ($booking->user && $booking->user->phone) {
            TwilioHelper::sendWhatsApp(
                $booking->user->phone,
                "Hi {$booking->user->name}, unfortunately your booking #{$booking->id} has been cancelled."
            );
        }

        return back()->with('success', 'Booking cancelled successfully.');
    }

    // Mark booking as complete
    public function complete(Booking $booking)
    {
        $booking->update(['status' => 'completed']);
        return back()->with('success', 'Booking marked as completed.');
    }
}
