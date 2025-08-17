<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Only parent categories (no parent_id)
        $categories = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        $products = Product::latest()->paginate(12);

        return view('frontend.shop.index', compact('categories', 'products'));
    }

    public function category(string $slug)
    {
        // Only parent categories
        $categories = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        $category   = Category::where('slug', $slug)->firstOrFail();
        $products   = Product::where('category_id', $category->id)->latest()->paginate(12);

        return view('frontend.shop.index', compact('categories', 'products', 'category'));
    }
}
