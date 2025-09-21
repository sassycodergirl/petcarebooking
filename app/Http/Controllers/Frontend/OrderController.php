<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Place a new order
     */
    public function place(Request $request)
    {
        // ✅ Step 1: Validate request
        $request->validate([
            'email' => 'required|email',
            'cart' => 'required|array|min:1',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'address' => 'required|string',
            'address_line2' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|string',
            'phone' => 'required|string',
            'same_as_shipping' => 'nullable|boolean',
            'marketing_opt_in' => 'nullable|boolean', // optional
            // Billing fields optional if same as shipping
            'billing_firstName' => 'nullable|string',
            'billing_lastName' => 'nullable|string',
            'billing_address' => 'nullable|string',
            'billing_address2' => 'nullable|string',
            'billing_city' => 'nullable|string',
            'billing_state' => 'nullable|string',
            'billing_pincode' => 'nullable|string',
            'billing_phone' => 'nullable|string',
        ]);

        $data = $request->all();

        // Decode cart if sent as JSON
        if (is_string($data['cart'])) {
            $data['cart'] = json_decode($data['cart'], true);
        }

        DB::beginTransaction();

        try {
            // ✅ Step 1a: Update logged-in user
            if (Auth::check()) {
                $user = Auth::user();
                $user->update([
                    'email' => $data['email'],
                    'marketing_opt_in' => $data['marketing_opt_in'] ?? $user->marketing_opt_in,
                ]);
            }

            // ✅ Step 2: Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'email' => $data['email'],
                'total_amount' => collect($data['cart'])->sum(fn($i) => $i['qty'] * $i['price']),
                'payment_method' => 'razorpay',
                'status' => 'pending',
            ]);

            // ✅ Step 3: Save shipping address
            OrderAddress::create([
                'order_id' => $order->id,
                'type' => 'shipping',
                'name' => $data['firstName'] . ' ' . $data['lastName'],
                'phone' => $data['phone'],
                'address_line1' => $data['address'],
                'address_line2' => $data['address_line2'] ?? null,
                'city' => $data['city'],
                'state' => $data['state'],
                'pincode' => $data['pincode'],
                'country' => 'India',
            ]);

            // ✅ Step 4: Save billing address
            if (empty($data['same_as_shipping'])) {
                OrderAddress::create([
                    'order_id' => $order->id,
                    'type' => 'billing',
                    'name' => $data['billing_firstName'] . ' ' . $data['billing_lastName'],
                    'phone' => $data['billing_phone'] ?? $data['phone'],
                    'address_line1' => $data['billing_address'],
                    'address_line2' => $data['billing_address2'] ?? null,
                    'city' => $data['billing_city'],
                    'state' => $data['billing_state'],
                    'pincode' => $data['billing_pincode'],
                    'country' => 'India',
                ]);
            } else {
                // fallback: same as shipping
                OrderAddress::create([
                    'order_id' => $order->id,
                    'type' => 'billing',
                    'name' => $data['firstName'] . ' ' . $data['lastName'],
                    'phone' => $data['phone'],
                    'address_line1' => $data['address'],
                    'address_line2' => $data['address_line2'] ?? null,
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'pincode' => $data['pincode'],
                    'country' => 'India',
                ]);
            }

            // ✅ Step 5: Save order items
            $items = array_map(function ($item) use ($order) {
                return [
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'variant_id' => $item['variant_id'] ?? null,
                    'product_name' => $item['name'],
                    'product_price' => $item['price'],
                    'quantity' => $item['qty'],
                    'total_price' => $item['qty'] * $item['price'],
                    'size' => $item['size'] ?? null,
                    'color' => $item['color'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $data['cart']);

            OrderItem::insert($items); // bulk insert

            // ✅ Step 6: Create Razorpay order
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $razorpayOrder = $api->order->create([
                'receipt' => $order->id,
                'amount' => $order->total_amount * 100, // in paise
                'currency' => 'INR',
            ]);

            // Save razorpay_order_id
            $order->update(['payment_id' => $razorpayOrder['id']]);

            DB::commit();

            return response()->json([
                'success' => true,
                'order_id' => $razorpayOrder['id'],
                'amount' => $razorpayOrder['amount'],
                'razorpay_key' => env('RAZORPAY_KEY'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order Placement Failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while placing the order.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Verify Razorpay payment
     */
    public function verify(Request $request)
    {
        $request->validate([
            'razorpay_order_id' => 'required|string',
            'razorpay_payment_id' => 'required|string',
            'razorpay_signature' => 'required|string',
        ]);

        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
            ];

            // ✅ Verify signature
            $api->utility->verifyPaymentSignature($attributes);

            $order = Order::where('payment_id', $request->razorpay_order_id)->first();

            if (!$order) {
                return response()->json([
                    'success' => false,
                    'message' => 'Order not found for this payment!',
                ], 404);
            }

            // ✅ Idempotency: avoid double updating
            if ($order->status !== 'paid') {
                $order->update([
                    'status' => 'paid',
                    'payment_id' => $request->razorpay_payment_id,
                    'paid_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Payment verified successfully',
                'redirect' => route('order.success', $order->id),
            ]);
        } catch (\Exception $e) {
            Log::error('Razorpay Verification Failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed!',
                'error' => $e->getMessage(),
                'redirect' => route('order.failed', ['id' => $request->razorpay_order_id]),
            ], 500);
        }
    }

    /**
     * Payment success page
     */
    public function success($id)
    {
        return view('frontend.order.success', ['orderId' => $id]);
    }

    /**
     * Payment failed page
     */
    public function failed($id = null)
    {
        return view('frontend.order.failed', ['orderId' => $id]);
    }
}
