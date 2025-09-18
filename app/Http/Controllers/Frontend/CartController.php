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


     // Add product (with optional variant) to cart
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $variantId = $request->variant_id ?? null;
        $size = $request->size ?? null;
        $colorId = $request->color_id ?? null;
        $colorName = $request->color_name ?? null;
        $colorHex = $request->color_hex ?? null;
        $quantity = $request->quantity ?? 1;

        // Create a unique key for variant products
        $key = $variantId ? $id . '-' . $variantId : $id;

        // If item exists, increment quantity
        if (isset($cart[$key])) {
            $cart[$key]['qty'] += $quantity;
        } else {
            $cart[$key] = [
                'product_id' => $id,
                'variant_id' => $variantId,
                'name' => $product->name,
                'price' => $request->price ?? $product->price,
                'image' => $request->image ?? asset('public/' . $product->image),
                'qty' => $quantity,
                'size' => $size,
                'color_id' => $colorId,
                'color_name' => $colorName,
                'color_hex' => $colorHex,
            ];
        }

        session()->put('cart', $cart);

        $itemCount = collect($cart)->sum(fn($item) => $item['qty']);
        $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

        return response()->json([
            'success' => true,
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

    // Update quantity
    public function update(Request $request, $key)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$key])){
            $cart[$key]['qty'] = max(1, intval($request->qty));
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

    // Remove item
    public function remove(Request $request, $key)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$key])){
            unset($cart[$key]);
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
