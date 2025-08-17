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
        $cart = session()->get('cart', []);
        return view('frontend.cart.index', compact('cart'));
    }

    // Add product to cart
    // public function add(Request $request, $id)
    // {
    //     $product = Product::findOrFail($id);

    //     $cart = session()->get('cart', []);

    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantity'] += $request->quantity ?? 1;
    //     } else {
    //         $cart[$id] = [
    //             'id' => $product->id,
    //             'name' => $product->name,
    //             'price' => $product->price,
    //             'image' => $product->image,
    //             'quantity' => $request->quantity ?? 1,
    //         ];
    //     }

    //     session()->put('cart', $cart);

    //     // Return JSON for AJAX
    //     return response()->json([
    //         'success' => true,
    //         'cart_count' => array_sum(array_column($cart, 'quantity')),
    //         'cart' => $cart
    //     ]);
    // }

    public function add($id, Request $request)
    {
        $cart = session('cart', []);
        $quantity = $request->quantity ?? 1;

        if(isset($cart[$id])){
            $cart[$id]['quantity'] += $quantity;
        } else {
            $product = Product::findOrFail($id);
            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image, // or URL
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

    public function getItems()
    {
        $cart = session('cart', []);
        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart' => array_values($cart)
        ]);
    }



    // Update quantity
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
        ]);
    }

    // Remove product
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
        ]);
    }
}
