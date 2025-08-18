<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart page
    public function index()
    {
        return view('frontend.cart');
    }

    // Add product to cart
    public function add(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        $product = Product::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        $quantity = $request->quantity ?? 1;
        $variantId = $request->variant_id ?? null;
        $size = $request->size ?? null;
        $colorId = $request->color_id ?? null;
        $colorHex = $request->color_hex ?? '#ccc';

        // Use unique key for product variant
        $key = $id . '-' . ($variantId ?? '0');

        if (isset($cart[$key])) {
            // If already in cart, just increase quantity
            $cart[$key]['quantity'] += $quantity;
        } else {
            $cart[$key] = [
                'id' => $product->id,
                'variant_id' => $variantId,
                'size' => $size,
                'color_id' => $colorId,
                'color_hex' => $colorHex,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image ? asset('public/' . $product->image) : asset('images/pd1.png'),
                'quantity' => $quantity
            ];
        }

        session(['cart' => $cart]);

        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart' => array_values($cart)
        ]);
    }

    // Update quantity (+/-)
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $variantId = $request->variant_id ?? '0';
        $key = $id . '-' . $variantId;

        if (isset($cart[$key])) {
            $newQty = ($cart[$key]['quantity'] ?? 0) + ($request->quantity ?? 0);
            if ($newQty > 0) {
                $cart[$key]['quantity'] = $newQty;
            } else {
                unset($cart[$key]);
            }
        }

        session(['cart' => $cart]);

        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart' => array_values($cart)
        ]);
    }

    // Remove product from cart
    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $variantId = $request->variant_id ?? '0';
        $key = $id . '-' . $variantId;

        if (isset($cart[$key])) {
            unset($cart[$key]);
        }

        session(['cart' => $cart]);

        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart' => array_values($cart)
        ]);
    }

    // Get current cart items (for cart icon / drawer)
    public function items()
    {
        $cart = session()->get('cart', []);

        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart' => array_values($cart)
        ]);
    }
}
