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
    // public function category(string $slug)
    // {
    //     $category = Category::where('slug', $slug)->firstOrFail();

    //     // If it has children → show subcategories
    //     if ($category->children()->count() > 0) {
    //         $subcategories = $category->children()->orderBy('name')->get();
    //         return view('frontend.shop.category', compact('category', 'subcategories'));
    //     }

    //     // If no children → show products
    //     $products = Product::where('category_id', $category->id)
    //         ->latest()
    //         ->paginate(12);

    //     return view('frontend.shop.products', compact('category', 'products'));
    // }

        public function category(Request $request, string $slug)
        {
            $category = Category::where('slug', $slug)->firstOrFail();

            // If it has children → show subcategories
            if ($category->children()->count() > 0) {
                $subcategories = $category->children()->orderBy('name')->get();
                return view('frontend.shop.category', compact('category', 'subcategories'));
            }

            // Base query
            $query = Product::where('category_id', $category->id)->latest();

            // AJAX filter request
            if ($request->ajax()) {
                $attributes = $request->input('attributes'); // get the input safely

                $query = Product::where('category_id', $category->id)->latest();

                if (!empty($attributes)) {
                    // If attributes exist, filter by them
                    $attributes = is_array($attributes) ? $attributes : explode(',', $attributes);

                    $query->whereHas('attributes', function($q) use ($attributes) {
                        $q->whereIn('attributes.id', $attributes);
                    });
                }

                $products = $query->get();

                return view('frontend.shop.partials.products-grid', compact('products'));
            }

            // Normal page load
            $products = $query->paginate(12);
            return view('frontend.shop.products', compact('category', 'products'));
        }




}
