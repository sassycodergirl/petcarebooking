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

    // Parent category page → Show its subcategories
    public function parentCategory(string $slug)
    {
        $category = Category::where('slug', $slug)
            ->whereNull('parent_id') // must be a parent
            ->firstOrFail();

        $subcategories = $category->children()->orderBy('name')->get();

        return view('frontend.shop.category', compact('category', 'subcategories'));
    }

    // Subcategory page → Show its products
    public function subcategory(string $parentSlug, string $slug)
    {
        $subcategory = Category::where('slug', $slug)
            ->whereHas('parent', function ($q) use ($parentSlug) {
                $q->where('slug', $parentSlug);
            })
            ->firstOrFail();

        $products = Product::where('category_id', $subcategory->id)
            ->latest()
            ->paginate(12);

        return view('frontend.shop.products', compact('subcategory', 'products'));
    }
}
