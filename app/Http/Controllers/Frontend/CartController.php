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
    // public function add(Request $request, $id)
    // {
    //     $product = Product::findOrFail($id);
    //     $cart = session()->get('cart', []);

    //     // Variant and option data
    //     $variantId = $request->variant_id ?: null; // null if not provided
    //     $size = $request->size ?? null;
    //     $colorId = $request->color_id ?? null;
    //     $colorName = $request->color_name ?? null;
    //     $colorHex = $request->color_hex ?? null;
    //     $quantity = $request->quantity ?? 1;

    //     // Create a unique key: include variant only if it exists
    //     $cartKey = $variantId ? $id . '-' . $variantId : $id;

    //     // Remove base product if adding variant (prevents duplicate base item)
    //     if ($variantId && isset($cart[$id])) {
    //         unset($cart[$id]);
    //     }

    //     // If item exists, increment quantity
    //     if (isset($cart[$cartKey])) {
    //         $cart[$cartKey]['qty'] += $quantity;
    //     } else {
    //         $cart[$cartKey] = [
    //             "product_id" => $id,
    //             "variant_id" => $variantId,
    //             "name" => $product->name,
    //             "price" => $request->price ?? $product->price,
    //             "image" => $request->image ?? asset('public/' . $product->image),
    //             "qty" => $quantity,
    //             "size" => $size,
    //             "color_id" => $colorId,
    //             "color_name" => $colorName,
    //             "color_hex" => $colorHex,
    //         ];
    //     }

    //     // Save cart back to session
    //     session()->put('cart', $cart);

    //     // Cart totals
    //     $itemCount = collect($cart)->sum(fn($item) => $item['qty']);
    //     $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

    //     return response()->json([
    //         'success' => true,
    //         'cart' => $cart,
    //         'itemCount' => $itemCount,
    //         'totalPrice' => $totalPrice,
    //     ]);
    // }

    // Add product (with optional variant) to cart
public function add(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);

    // Variant and option data
    $variantId = $request->variant_id ?: null; // null if not provided
    $size = $request->size ?? null;
    $colorId = $request->color_id ?? null;
    $colorName = $request->color_name ?? null;
    $colorHex = $request->color_hex ?? null;
    $quantity = $request->quantity ?? 1;

    // Create a unique key: include variant only if it exists
    $cartKey = $variantId ? $id . '-' . $variantId : $id;

    // Remove base product if adding variant (prevents duplicate base item)
    if ($variantId && isset($cart[$id])) {
        unset($cart[$id]);
    }

    // If item exists, increment quantity
    if (isset($cart[$cartKey])) {
        $cart[$cartKey]['qty'] += $quantity;
    } else {
        $cart[$cartKey] = [
            "product_id" => $id,
            "variant_id" => $variantId,
            "key" => $cartKey, // add key here for frontend
            "name" => $product->name,
            "price" => $request->price ?? $product->price,
            "image" => $request->image ?? asset('public/' . $product->image),
            "qty" => $quantity,
            "size" => $size,
            "color_id" => $colorId,
            "color_name" => $colorName,
            "color_hex" => $colorHex,
        ];
    }

    // Save cart back to session
    session()->put('cart', $cart);

    // Convert cart to array with key for JS
    $cartWithKeys = collect($cart)->map(function ($item) {
        return [
            'key' => $item['key'],
            'product_id' => $item['product_id'],
            'variant_id' => $item['variant_id'] ?? null,
            'name' => $item['name'],
            'price' => $item['price'],
            'qty' => $item['qty'],
            'image' => $item['image'],
            'size' => $item['size'] ?? null,
            'color_id' => $item['color_id'] ?? null,
            'color_name' => $item['color_name'] ?? null,
            'color_hex' => $item['color_hex'] ?? null,
        ];
    })->values()->toArray(); // values() ensures it is a numeric array for JS forEach

    // Cart totals
    $itemCount = collect($cart)->sum(fn($item) => $item['qty']);
    $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

    return response()->json([
        'success' => true,
        'cart' => $cartWithKeys,
        'itemCount' => $itemCount,
        'totalPrice' => $totalPrice,
    ]);
}




    // Fetch cart items
    public function items()
    {
        $cart = session()->get('cart', []);

        $cartWithVariants = collect($cart)->map(function($item) {
            return [
                'id' => $item['product_id'],
                'key' => $item['variant_id'] ? $item['product_id'].'-'.$item['variant_id'] : $item['product_id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['qty'],
                'image' => $item['image'],
                'variant_id' => $item['variant_id'] ?? null,
                'size' => $item['size'] ?? null,
                'color_id' => $item['color_id'] ?? null,
                'color_name' => $item['color_name'] ?? null,
                'color_hex' => $item['color_hex'] ?? null,
            ];
        })->toArray();

        $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

        return response()->json([
            'cart' => $cartWithVariants,
            'totalPrice' => $totalPrice,
        ]);
    }

    // Update quantity
    public function update(Request $request, $key)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$key])) {
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
        if(isset($cart[$key])) {
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
