<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = collect($cart)->reduce(fn($c, $i) => $c + ($i['price'] * $i['qty']), 0);
        $shipping = 0;
        $total    = $subtotal + $shipping;

         $user = auth()->user();

        // Get default address for logged-in user
        $address = $user?->addresses()
            ->where('is_default', 1)
            ->first();


        // Fallback: if no default address, get latest
        if (!$address) {
            $address = $user?->addresses()->latest()->first();
        }
        // Remove '+91' from phone if present
         $phone = $user?->phone ? str_replace('+91', '', $user->phone) : null;

         // Split name into first_name and last_name
        $first_name = $last_name = '';
        if ($user?->name) {
            $nameParts = explode(' ', $user->name, 2); // Split into max 2 parts
            $first_name = $nameParts[0];
            $last_name  = $nameParts[1] ?? ''; // If only one word, last_name stays empty
        }

        return view('frontend.checkout.index', compact('cart', 'subtotal', 'shipping', 'total', 'user', 'address', 'phone','first_name', 'last_name'));
    }

   
}
