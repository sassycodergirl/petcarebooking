<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Import the Category model

class PageController extends Controller
{
    /**
     * Display the homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $viewData = [
            'categories' => Category::whereNull('parent_id')->get()
        ];

        // --- Get Products for the FIRST Slider (Traditional Collection) ---
        $traditionalCategory = Category::where('slug', 'traditional-collection-for-dogs')->first();
        if ($traditionalCategory) {
            $viewData['traditionalProducts'] = $traditionalCategory->products()
            ->withCount('variants')
            ->withMin('variants', 'price')
            ->latest()->take(8)->get();
        }

        // --- Get Products for the SECOND Slider (Treats) ---
        $treatsCategory = Category::where('slug', 'treats')->first(); // Assuming 'treats' is the slug
        if ($treatsCategory) {
            $viewData['treatsProducts'] = $treatsCategory->products()
            ->withCount('variants')
            ->withMin('variants', 'price')
            ->latest()->take(8)->get();
        }


        // --- NEW: Get Products for the THIRD Slider (Bandanas) ---
        // $bandanaCategorySlugs = ['bandana-design', 'cotton-bandana-designs'];
        // $bandanaCategories = Category::whereIn('slug', $bandanaCategorySlugs)->with('products')->get();
        // if ($bandanaCategories->isNotEmpty()) {
        //     $viewData['bandanaProducts'] = $bandanaCategories
        //         ->pluck('products')
        //         ->flatten()
        //         ->sortByDesc('created_at')
        //         ->take(8);
        // }

        // --- THIS IS THE UPDATED PART for Bandanas ---
    $bandanaCategorySlugs = ['bandana-design', 'cotton-bandana-designs'];
    $bandanaCategories = Category::whereIn('slug', $bandanaCategorySlugs)
        ->with(['products' => function ($query) {
            $query->withCount('variants')
                  ->withMin('variants', 'price')
                  ->latest(); // Order products within the relationship
        }])
        ->get();

    if ($bandanaCategories->isNotEmpty()) {
        $viewData['bandanaProducts'] = $bandanaCategories
            ->pluck('products')
            ->flatten()
            ->sortByDesc('created_at')
            ->take(8);
    }

        

        // --- Pass all data to the view ---
        return view('index', $viewData);
    }
}