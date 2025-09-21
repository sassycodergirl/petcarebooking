<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'cart' => 'required|array|min:1',
            'payment_method' => 'nullable|string',
            'marketing_opt_in' => 'nullable|boolean',
            'firstName' => 'required|string',
            'lasttName' => 'required|string',
            'address_line1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'phone' => 'required|string',
            // billing fields optional if same as shipping
            'billing_firstName' => 'nullable|string',
            'billing_lastName' => 'nullable|string',
            'billing_address1' => 'nullable|string',
            'billing_city' => 'nullable|string',
            'billing_state' => 'nullable|string',
            'billing_zip' => 'nullable|string',
        ]);

        $data = $request->all();

        DB::beginTransaction();

        try {
            // Create the order
            $order = Order::create([
                'user_id' => Auth::id(),
                'email' => $data['email'],
                'total_price' => collect($data['cart'])->sum(fn($item) => $item['qty'] * $item['price']),
                'payment_method' => $data['payment_method'] ?? 'razorpay',
                'payment_id' => $data['razorpay_payment_id'] ?? null,
                'status' => 'paid', // mark as paid since Razorpay is success
                'marketing_opt_in' => $data['marketing_opt_in'] ?? 0,
            ]);

            // Shipping address
            OrderAddress::create([
                'order_id' => $order->id,
                'type' => 'shipping',
                'name' => $data['firstName'] . ' ' . $data['lasttName'],
                'phone' => $data['phone'],
                'address_line1' => $data['address_line1'],
                'address_line2' => $data['address_line2'] ?? null,
                'city' => $data['city'],
                'state' => $data['state'],
                'pincode' => $data['zip'],
                'country' => $data['country'] ?? 'India',
            ]);

            // Billing address
            if ($request->input('billing_address_selector') === 'billing_different') {
                OrderAddress::create([
                    'order_id' => $order->id,
                    'type' => 'billing',
                    'name' => $data['billing_firstName'] . ' ' . $data['billing_lastName'],
                    'phone' => $data['billing_phone'] ?? $data['phone'],
                    'address_line1' => $data['billing_address1'],
                    'address_line2' => $data['billing_address2'] ?? null,
                    'city' => $data['billing_city'],
                    'state' => $data['billing_state'],
                    'pincode' => $data['billing_zip'],
                    'country' => 'India',
                ]);
            } else {
                OrderAddress::create([
                    'order_id' => $order->id,
                    'type' => 'billing',
                    'name' => $data['firstName'] . ' ' . $data['lasttName'],
                    'phone' => $data['phone'],
                    'address_line1' => $data['address_line1'],
                    'address_line2' => $data['address_line2'] ?? null,
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'pincode' => $data['zip'],
                    'country' => $data['country'] ?? 'India',
                ]);
            }

            // Order items
            foreach ($data['cart'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'variant_id' => $item['variant_id'] ?? null,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['qty'],
                    'total_price' => $item['qty'] * $item['price'],
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully',
                'order_id' => $order->id,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while placing the order.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
