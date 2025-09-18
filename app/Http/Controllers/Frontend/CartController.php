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
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "qty" => 1
            ];
        }

        session()->put('cart', $cart);

        $itemCount = collect($cart)->sum(fn($item) => $item['qty']);
        $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

        return response()->json([
            'cart' => $cart,
            'itemCount' => $itemCount,
            'totalPrice' => $totalPrice,
        ]);
    }

    // Fetch cart items
    public function items()
    {
        $cart = session()->get('cart', []);
        $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

        return response()->json([
            'cart' => $cart,
            'totalPrice' => $totalPrice,
        ]);
    }

    // Update cart quantity
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['qty'] = $request->qty;
            session()->put('cart', $cart);
        }

        $itemCount = collect($cart)->sum(fn($item) => $item['qty']);
        $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

        return response()->json([
            'cart' => $cart,
            'itemCount' => $itemCount,
            'totalPrice' => $totalPrice,
        ]);
    }

    // Remove item from cart
    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        $itemCount = collect($cart)->sum(fn($item) => $item['qty']);
        $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

        return response()->json([
            'cart' => $cart,
            'itemCount' => $itemCount,
            'totalPrice' => $totalPrice,
        ]);
    }


    


   
}
