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

        // 1. Find the specific category by its slug
        $category = Category::where('slug', 'traditional-collection-for-dogs')->first();

        // 2. If the category was found, get its products and add to our data
        if ($category) {
            $viewData['categoryProducts'] = $category->products()->latest()->take(8)->get();
        }

        // 3. Pass all data to the view
        return view('index', $viewData);
    }
}