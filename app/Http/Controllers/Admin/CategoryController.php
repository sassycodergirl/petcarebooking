<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        $categories = Category::all(); // all categories for parent dropdown
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
  

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:categories',
            'slug'        => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'parent_id'   => 'nullable|exists:categories,id',
            'is_food'     => 'sometimes',
            'image'       => 'nullable|image|max:2048',
        ]);

        // Prepare all data in an array
        $data = [
            'name'        => $request->name,
            'slug'        => $request->slug ? Str::slug($request->slug) : Str::slug($request->name),
            'description' => $request->description,
            'parent_id'   => $request->parent_id,
            'is_food'     => $request->has('is_food'),
        ];

        // Handle the file upload with hashName() and new path
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->hashName(); // Use hashName for a unique, random name
            $file->move(public_path('product-category'), $fileName); // Use the new path
            $data['image'] = 'product-category/' . $fileName;
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //   public function edit(Category $category)
    // {
    //     // Exclude current category and its direct children to avoid loops
    //     $categories = Category::where('id', '!=', $category->id)
    //         ->where('parent_id', '!=', $category->id)
    //         ->get();

    //     return view('admin.categories.edit', compact('category', 'categories'));
    // }

    public function edit(Category $category)
{
    $categories = Category::all(); // show all categories for parent selection
    return view('admin.categories.edit', compact('category', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
   

    public function update(Request $request, Category $category)
{
    $request->validate([
        'name'        => 'required|string|max:255|unique:categories,name,' . $category->id,
        'slug'        => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
        'description' => 'nullable|string',
        'parent_id'   => 'nullable|exists:categories,id',
        'is_food'     => 'sometimes',
        'image'       => 'nullable|image|max:2048',
    ]);

    // Prepare the data to be updated
    $data = [
        'name'        => $request->name,
        'slug'        => $request->slug ? Str::slug($request->slug) : Str::slug($request->name),
        'description' => $request->description,
        'parent_id'   => $request->parent_id,
        'is_food'     => $request->has('is_food'),
    ];

    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($category->image && File::exists(public_path($category->image))) {
            File::delete(public_path($category->image));
        }

        $file = $request->file('image');
        $fileName = $file->hashName(); // Use hashName for a unique, random name
        $file->move(public_path('product-category'), $fileName); // Use the new path
        $data['image'] = 'product-category/' . $fileName;
    }

    $category->update($data);

    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Category $category)
    {
        // Delete the image file from the public path if it exists
        if ($category->image && File::exists(public_path($category->image))) {
            File::delete(public_path($category->image));
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
