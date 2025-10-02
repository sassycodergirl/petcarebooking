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
            $viewData['traditionalProducts'] = $traditionalCategory->products()->latest()->take(8)->get();
        }

        // --- Get Products for the SECOND Slider (Treats) ---
        $treatsCategory = Category::where('slug', 'treats')->first(); // Assuming 'treats' is the slug
        if ($treatsCategory) {
            $viewData['treatsProducts'] = $treatsCategory->products()->latest()->take(8)->get();
        }

        // --- Pass all data to the view ---
        return view('index', $viewData);
    }
}