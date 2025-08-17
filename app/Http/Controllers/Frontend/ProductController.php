<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::with(['gallery', 'category'])
            ->where('slug', $slug)->firstOrFail();

        // Optional: related products from same category
        $related = Product::where('category_id', $product->category_id)
            ->where('id', '<>', $product->id)
            ->latest()->take(8)->get();

        return view('frontend.product.show', compact('product', 'related'));
    }
}
