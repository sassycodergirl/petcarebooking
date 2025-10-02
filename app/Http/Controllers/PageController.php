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
        // Fetch the categories from the database
        $categories = Category::whereNull('parent_id')->get();

        // Return the index view and pass the categories to it
         // --- NEW LOGIC TO GET TRADITIONAL COLLECTION PRODUCTS ---

        $traditionalProducts = new Collection(); // Initialize an empty collection

        // 1. Find the specific category by its slug
        $traditionalCategory = Category::where('slug', 'traditional-collection-for-dogs')->first();

        // 2. If the category exists, get its products (e.g., the 8 most recent)
        if ($traditionalCategory) {
            $traditionalProducts = $traditionalCategory->products()->latest()->take(8)->get();
        }

        // --- END NEW LOGIC ---


        // 3. Pass all variables to the view
        return view('index', [
            'categories' => $categories,
            'traditionalProducts' => $traditionalProducts
        ]);
    }
}