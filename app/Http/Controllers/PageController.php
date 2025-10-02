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
        return view('index', compact('categories'));
    }
}