<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
   public function upcoming()
    {
        $bookings = Booking::where('user_id', auth()->id())
                            ->where('check_in', '>=', now())
                            ->orderBy('check_in', 'asc')
                            ->get();

        return view('customer.bookings.upcoming', compact('bookings'));
    }

    public function past()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->where('check_in', '<', now())
            ->orderBy('check_in', 'desc')
            ->get();

        return view('customer.bookings.past', compact('bookings'));
    }
}
