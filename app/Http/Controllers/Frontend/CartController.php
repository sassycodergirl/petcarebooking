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

    // Fetch cart items
    // public function items()
    // {
    //     $cart = session()->get('cart', []);

    //     $cartWithVariants = collect($cart)
    //         ->filter(function ($item) {
    //             $product = \App\Models\Product::find($item['product_id']);
    //             if ($product && $product->variants()->exists() && empty($item['variant_id'])) {
    //                 return false;
    //             }
    //             return true;
    //         })
    //         ->map(function ($item) {
    //             return [
    //                 'key'        => $item['variant_id'] ? $item['product_id'].'-'.$item['variant_id'] : $item['product_id'],
    //                 'product_id' => $item['product_id'],
    //                 'variant_id' => $item['variant_id'] ?? null,
    //                 'name'       => $item['name'],
    //                 'price'      => $item['price'],
    //                 'qty'        => $item['qty'], // ✅ always qty
    //                 'image'      => $item['image'],
    //                 'size'       => $item['size'] ?? null,
    //                 'color_id'   => $item['color_id'] ?? null,
    //                 'color_name' => $item['color_name'] ?? null,
    //                 'color_hex'  => $item['color_hex'] ?? null,
    //             ];
    //         })
    //         ->values()
    //         ->toArray();

    //     // Clean rogue items
    //     $cleanedCart = [];
    //     foreach ($cartWithVariants as $item) {
    //         $cleanedCart[$item['key']] = $item;
    //     }
    //     session()->put('cart', $cleanedCart);

    //     $totalPrice = collect($cleanedCart)->reduce(
    //         fn($sum, $item) => $sum + ($item['price'] * $item['qty']),
    //         0
    //     );

    //     return response()->json([
    //         'cart'       => $cartWithVariants,
    //         'totalPrice' => $totalPrice,
    //     ]);
    // }

    public function items()
    {
        $cart = session()->get('cart', []);

        $cartWithVariants = collect($cart)
            ->filter(function ($item) {
                $product = \App\Models\Product::find($item['product_id']);
                // If product has variants but no variant selected, skip it
                if ($product && $product->variants()->exists() && empty($item['variant_id'])) {
                    return false;
                }
                return true;
            })
            ->map(function ($item) {
                $product = \App\Models\Product::find($item['product_id']);
                $image = $item['image']; // default

                // If item has a variant, try to get first image from variant gallery
                if (!empty($item['variant_id']) && $product && $product->variants()->exists()) {
                    $variant = $product->variants()->find($item['variant_id']);
                    // if ($variant) {
                    //     $firstGalleryImage = $variant->gallery->first()?->image ?? null;
                    //     $image = $firstGalleryImage 
                    //         ? asset('public/variant-gallery/' . $firstGalleryImage)
                    //         : ($variant->image ? asset('public/' . $variant->image) : asset('public/' . $product->image));
                    // }
                     if ($variant) {
                        $firstGalleryImage = $variant->gallery->first()?->image ?? null;

                        if ($firstGalleryImage) {
                            // Avoid double 'variant-gallery/'
                            if (str_contains($firstGalleryImage, 'variant-gallery/')) {
                                $image = asset('public/' . $firstGalleryImage);
                            } else {
                                $image = asset('public/variant-gallery/' . $firstGalleryImage);
                            }
                        } elseif ($variant->image) {
                            $image = asset('public/' . $variant->image);
                        } else {
                            $image = asset('public/' . $product->image);
                        }
                    }
                } elseif ($product) {
                    // fallback to product image
                    $image = asset('public/' . $product->image);
                }

                return [
                    'key'        => $item['variant_id'] ? $item['product_id'].'-'.$item['variant_id'] : $item['product_id'],
                    'product_id' => $item['product_id'],
                    'variant_id' => $item['variant_id'] ?? null,
                    'name'       => $item['name'],
                    'price'      => $item['price'],
                    'qty'        => $item['qty'],
                    'image'      => $image,
                    'size'       => $item['size'] ?? null,
                    'color_id'   => $item['color_id'] ?? null,
                    'color_name' => $item['color_name'] ?? null,
                    'color_hex'  => $item['color_hex'] ?? null,
                ];
            })
            ->values()
            ->toArray();

        // Clean rogue items
        $cleanedCart = [];
        foreach ($cartWithVariants as $item) {
            $cleanedCart[$item['key']] = $item;
        }
        session()->put('cart', $cleanedCart);

        $totalPrice = collect($cleanedCart)->reduce(
            fn($sum, $item) => $sum + ($item['price'] * $item['qty']),
            0
        );

        return response()->json([
            'cart'       => $cartWithVariants,
            'totalPrice' => $totalPrice,
        ]);
    }


    // Add to cart
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $variantId = $request->variant_id ?: null;
        $size      = $request->size ?? null;
        $colorId   = $request->color_id ?? null;
        $colorName = $request->color_name ?? null;
        $colorHex  = $request->color_hex ?? null;
        $quantity  = $request->input('qty') ?? 1; // ✅ always qty

        if ($product->variants()->exists() && !$variantId) {
            return response()->json([
                'success' => false,
                'message' => 'Please select a variant before adding to cart.'
            ], 400);
        }

        $cartKey = $variantId ? $id.'-'.$variantId : $id;

        if ($variantId && isset($cart[$id])) {
            unset($cart[$id]);
        }

        // Get image for variant or fallback to product image
        $image = $product->image; // fallback
        if ($variantId) {
            $variant = $product->variants()->find($variantId);
            if ($variant) {
                $firstGalleryImage = $variant->gallery->first()?->image ?? null;
                $image = $firstGalleryImage 
                    ? asset('public/variant-gallery/' . $firstGalleryImage)
                    : ($variant->image ? asset('public/' . $variant->image) : asset('public/' . $product->image));
            }
        } else {
            $image = $request->image ?? asset('public/' . $product->image);
        }

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['qty'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'product_id' => $id,
                'variant_id' => $variantId,
                'key'        => $cartKey,
                'name'       => $product->name,
                'price'      => $request->price ?? $product->price,
                'image'      => $image,
                'qty'        => $quantity, // ✅ fixed
                'size'       => $size,
                'color_id'   => $colorId,
                'color_name' => $colorName,
                'color_hex'  => $colorHex,
            ];
        }

        session()->put('cart', $cart);

        $cartWithKeys = collect($cart)->map(function ($item) {
            return [
                'key'        => $item['key'],
                'product_id' => $item['product_id'],
                'variant_id' => $item['variant_id'] ?? null,
                'name'       => $item['name'],
                'price'      => $item['price'],
                'qty'        => $item['qty'], // ✅ consistent
                'image'      => $item['image'],
                'size'       => $item['size'] ?? null,
                'color_id'   => $item['color_id'] ?? null,
                'color_name' => $item['color_name'] ?? null,
                'color_hex'  => $item['color_hex'] ?? null,
            ];
        })->values()->toArray();

        $itemCount  = collect($cart)->sum(fn($item) => $item['qty']);
        $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

        return response()->json([
            'success'    => true,
            'cart'       => $cartWithKeys,
            'itemCount'  => $itemCount,
            'totalPrice' => $totalPrice,
        ]);
    }

    // Update quantity
    public function update(Request $request, $key)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$key])) {
            $cart[$key]['qty'] = max(1, intval($request->qty)); // ✅ only qty
            session()->put('cart', $cart);
        }

        $itemCount = collect($cart)->sum(fn($item) => $item['qty']);
        $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

        return response()->json([
            'cart' => array_values($cart),
            'itemCount' => $itemCount,
            'totalPrice' => $totalPrice,
        ]);
    }

    // Remove item
    public function remove(Request $request, $key)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        $itemCount = collect($cart)->sum(fn($item) => $item['qty']);
        $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);

        return response()->json([
            'cart' => array_values($cart),
            'itemCount' => $itemCount,
            'totalPrice' => $totalPrice,
        ]);
    }
}
