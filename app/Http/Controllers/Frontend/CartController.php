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

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'image' => asset('public/' . $product->image),
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart' => array_values($cart), // send cart items as array
        ]);
    }

    public function getItems()
    {
        $cart = session('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'cart' => $cart,
            'cart_count' => $cartCount,
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
