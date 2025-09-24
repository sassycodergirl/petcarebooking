<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ShopProductController extends Controller
{
    // public function show($slug)
    // {
    //      $product = Product::with(['variants.color', 'gallery', 'category'])
    //                   ->where('slug', $slug)
    //                   ->firstOrFail();

    //     // If no image, set default
    //     if(!$product->image){
    //         $product->image = 'images/pd1.png';
    //     }

    //     return view('frontend.product.show', compact('product'));
    // }

    public function show($slug)
    {
        $product = Product::with([
            'variants.color', 
            'category',
            // Sort the main product gallery by ID (oldest first)
            'gallery' => function ($query) {
                $query->orderBy('id', 'desc');
            },
            // Load and sort the gallery for EACH variant by ID
            'variants.gallery' => function ($query) {
                $query->orderBy('id', 'desc');
            }
        ])
        ->where('slug', $slug)
        ->firstOrFail();

        // If no image, set default
        if (!$product->image) {
            $product->image = 'images/pd1.png';
        }

        return view('frontend.product.show', compact('product'));
    }
}
