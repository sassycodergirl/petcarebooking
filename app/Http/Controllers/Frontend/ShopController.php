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
            ->with('children', 'products')
            ->get();

        return view('frontend.shop.index', compact('categories'));
    }

    public function category(Request $request, string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        // Get subcategories if any
        $subcategories = $category->children()->orderBy('name')->get();

        // Determine base query
        if ($subcategories->count() > 0) {
            // If parent, get all products under child categories
            $query = Product::whereIn('category_id', $subcategories->pluck('id'))->latest();
        } else {
            // If no children, get products in this category
            $query = Product::where('category_id', $category->id)->latest();
        }


          // Eager load variant data efficiently for price ranges.
        // This adds `variants_count`, `variants_min_price`, and `variants_max_price`
        // to each product object without extra database queries.
        $query->withCount('variants')
              ->withMin('variants', 'price')
              ->withMax('variants', 'price');
            //   ->latest(); // Apply ordering at the end

        $query->with('attributes'); 
        $query->latest();

        // AJAX filter request
        if ($request->ajax()) {
            $attributes = $request->input('attributes'); // get the input safely

            if (!empty($attributes)) {
                $attributes = is_array($attributes) ? $attributes : explode(',', $attributes);

                $query->whereHas('attributes', function($q) use ($attributes) {
                    $q->whereIn('attributes.id', $attributes);
                });
            }

            $products = $query->get();
            foreach ($products as $product) {
                $product->image = $product->image ? asset('public/' . $product->image) : asset('images/pd1.png');
             }
            return view('frontend.shop.partials.products-grid', compact('products'));
        }

        // Normal page load
        // $products = $query->paginate(12);
        $products = $query->get();
        // Ensure each product has an image
        foreach ($products as $product) {
            $product->image = $product->image ? asset('public/' . $product->image) : asset('images/pd1.png');
        }

        return view('frontend.shop.category', compact('category', 'subcategories', 'products'));
    }


}
