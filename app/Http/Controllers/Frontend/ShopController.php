<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Shop page → Show only parent categories
     */
    public function index()
    {
        $categories = Category::with('children') // eager load children
            ->whereNull('parent_id') // only parent categories
            ->orderBy('name')
            ->get();

        return view('frontend.shop.index', compact('categories'));
    }

    /**
     * Category page → Show child categories or products
     */
    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)
            ->with('children') // eager load children for check
            ->firstOrFail();

        if ($category->children->isNotEmpty()) {
            // Parent category → show its child categories
            return view('frontend.shop.category', [
                'category' => $category,
                'subcategories' => $category->children
            ]);
        }

        // Child category → show products
        $products = Product::where('category_id', $category->id)
            ->latest()
            ->paginate(12);

        return view('frontend.shop.products', compact('category', 'products'));
    }
}
