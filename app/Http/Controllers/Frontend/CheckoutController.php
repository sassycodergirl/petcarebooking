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

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:120',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:40',
            'address' => 'required|string|max:255',
            'city'    => 'required|string|max:120',
            'zip'     => 'required|string|max:20',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty.');
        }

        DB::beginTransaction();
        try {
            $subtotal = collect($cart)->reduce(fn($c, $i) => $c + ($i['price'] * $i['qty']), 0);
            $shipping = 0;
            $total    = $subtotal + $shipping;

            $order = Order::create([
                'user_id'         => auth()->id(),
                'name'            => $request->name,
                'email'           => $request->email,
                'phone'           => $request->phone,
                'address'         => $request->address,
                'city'            => $request->city,
                'zip'             => $request->zip,
                'subtotal'        => $subtotal,
                'shipping_amount' => $shipping,
                'total'           => $total,
                'status'          => 'pending',
                'payment_status'  => 'unpaid',
            ]);

            foreach ($cart as $line) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $line['id'],
                    'name'       => $line['name'],
                    'price'      => $line['price'],
                    'qty'        => $line['qty'],
                ]);

                // Optional: reduce stock
                Product::where('id', $line['id'])->decrement('stock_quantity', $line['qty']);
            }

            DB::commit();
            session()->forget('cart');

            return redirect()->route('order.success', $order->id);
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: '.$e->getMessage());
        }
    }
}
