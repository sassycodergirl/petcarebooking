<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ShopProductController extends Controller
{
    public function show($slug)
    {
        // Fetch product by slug
        // $product = Product::where('slug', $slug)->firstOrFail();
        // $product = Product::where('slug', $slug)
        //         ->with(['colors', 'variants', 'gallery', 'category'])
        //         ->firstOrFail();

        $product = Product::with(['variants.color'])->findOrFail($id);

        // If product has no variants, we can still use the main product price/image etc.
        $variants = $product->variants ?? collect(); // empty collection if no variants

        // If no image, set default
        if(!$product->image){
            $product->image = 'images/pd1.png';
        }

        return view('frontend.product.show', compact('product'));
    }
}
