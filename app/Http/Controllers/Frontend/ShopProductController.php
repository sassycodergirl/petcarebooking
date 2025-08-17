<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ShopProductController extends Controller
{
    public function show($slug)
    {
         $product = Product::with(['variants.color', 'gallery', 'category'])
                      ->where('slug', $slug)
                      ->firstOrFail();

        // If no image, set default
        if(!$product->image){
            $product->image = 'images/pd1.png';
        }

        return view('frontend.product.show', compact('product'));
    }
}
