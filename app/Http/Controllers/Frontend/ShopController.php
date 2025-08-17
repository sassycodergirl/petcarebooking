<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Shop main page → Show only parent categories
    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('frontend.shop.index', compact('categories'));
    }

    

      // Category page (works for both parent & subcategory)
    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        // If it has children → show subcategories
        if ($category->children()->count() > 0) {
            $subcategories = $category->children()->orderBy('name')->get();
            return view('frontend.shop.category', compact('category', 'subcategories'));
        }

        // If no children → show products
        $products = Product::where('category_id', $category->id)
            ->latest()
            ->paginate(12);

        return view('frontend.shop.products', compact('category', 'products'));
    }
}
