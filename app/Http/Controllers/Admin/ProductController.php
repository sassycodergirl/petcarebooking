<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
             // variants (optional)
            'variants' => 'array',
            'variants.*.size' => 'nullable|string|max:50',
            'variants.*.color' => 'nullable|string|max:50',
            'variants.*.price' => 'nullable|numeric|min:0',
            'variants.*.stock_quantity' => 'nullable|integer|min:0',
            'variants.*.image' => 'nullable|string|max:255', // using URL/path for simplicity
        ]);

        $data = $request->except('variants');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        // Insert variants (skip empty rows, dedupe by size+color)
    $seen = [];
    foreach ((array) $request->input('variants', []) as $variant) {
        $size  = trim($variant['size'] ?? '');
        $color = trim($variant['color'] ?? '');

        // skip rows with no size & no color
        if ($size === '' && $color === '') continue;

        $key = mb_strtoupper($size).'|'.mb_strtoupper($color);
        if (isset($seen[$key])) continue; // avoid duplicate insert from form
        $seen[$key] = true;

        $imagePath = null;
        if (isset($variant['image']) && $variant['image'] instanceof \Illuminate\Http\UploadedFile) {
            $imagePath = $variant['image']->store('product-variants', 'public');
        }

        $product->variants()->create([
            'size' => $size ?: null,
            'color' => $color ?: null,
            'price' => $variant['price'] ?? null,
            'stock_quantity' => (int) ($variant['stock_quantity'] ?? 0),
            'image' => $imagePath,
        ]);
    }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
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
   public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'variants' => 'array',
            'variants.*.size' => 'nullable|string|max:50',
            'variants.*.color' => 'nullable|string|max:50',
            'variants.*.price' => 'nullable|numeric|min:0',
            'variants.*.stock_quantity' => 'nullable|integer|min:0',
            'variants.*.image' => 'nullable|string|max:255',
        ]);

        $data = $request->except('variants');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
         $product->variants()->delete();

         $seen = [];
    foreach ((array) $request->input('variants', []) as $variant) {
        $size  = trim($variant['size'] ?? '');
        $color = trim($variant['color'] ?? '');
        if ($size === '' && $color === '') continue;

        $key = mb_strtoupper($size).'|'.mb_strtoupper($color);
        if (isset($seen[$key])) continue;
        $seen[$key] = true;

         $imagePath = null;
        if (isset($variant['image']) && $variant['image'] instanceof \Illuminate\Http\UploadedFile) {
            $imagePath = $variant['image']->store('product-variants', 'public');
        }

        $product->variants()->create([
            'size' => $size ?: null,
            'color' => $color ?: null,
            'price' => $variant['price'] ?? null,
            'stock_quantity' => (int) ($variant['stock_quantity'] ?? 0),
            'image' => $imagePath,
        ]);
    }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete image if exists
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
