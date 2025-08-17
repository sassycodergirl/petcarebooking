<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ShopProductController extends Controller
{
    public function show($slug)
    {
        // Fetch product by slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // If no image, set default
        if(!$product->image){
            $product->image = 'images/default-product.png';
        }

        return view('frontend.product.show', compact('product'));
    }
}
