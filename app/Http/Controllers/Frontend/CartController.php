<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart page (optional)
    public function index()
    {
        return view('frontend.cart');
    }

    // Add product to cart
    public function add(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        $product = Product::find($id);
        if(!$product){
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        $quantity = $request->quantity ?? 1;

        if(isset($cart[$id])){
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id' => $product->id,
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

        if(isset($cart[$id])){
            $newQty = ($cart[$id]['quantity'] ?? 0) + ($request->quantity ?? 0);
            if($newQty > 0){
                $cart[$id]['quantity'] = $newQty;
            } else {
                unset($cart[$id]);
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

        if(isset($cart[$id])){
            unset($cart[$id]);
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
