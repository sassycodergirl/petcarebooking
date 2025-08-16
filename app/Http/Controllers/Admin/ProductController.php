<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProductVariant;
use App\Models\Color;

class ProductController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::with('category')->paginate(10);
        $products = Product::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $colors = Color::all(); 
         return view('admin.products.create', compact('categories', 'colors'));
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
            'variants.*.color_id' => 'nullable|exists:colors,id',
            'variants.*.price' => 'nullable|numeric|min:0',
            'variants.*.stock_quantity' => 'nullable|integer|min:0',
            'variants.*.image' => 'nullable|image|max:2048', // using URL/path for simplicity
        ]);

        $data = $request->except('variants');
        $data['slug'] = Str::slug($request->name);

        // if ($request->hasFile('image')) {
        //     $data['image'] = $request->file('image')->store('products', 'public');
        // }
        // Product image
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('products'), $fileName);
            $data['image'] = 'products/' . $fileName;
        }


        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $fileName = $file->hashName();
                $file->move(public_path('product-gallery'), $fileName);
                $product->gallery()->create([
                    'image' => 'product-gallery/' . $fileName
                ]);
            }
        }

        $product = Product::create($data);


        

    //     // Insert variants (skip empty rows, dedupe by size+color)
    // $seen = [];
    // foreach ((array) $request->input('variants', []) as $variant) {
    //     $size  = trim($variant['size'] ?? '');
    //     $color = $variant['color_id'] ?? null;

    //     // skip rows with no size & no color
    //     if ($size === '' && $color === '') continue;

    //     $key = mb_strtoupper($size).'|'.mb_strtoupper($color);
    //     if (isset($seen[$key])) continue; // avoid duplicate insert from form
    //     $seen[$key] = true;

    //     // $imagePath = null;
    //     // if (isset($variant['image']) && $variant['image'] instanceof \Illuminate\Http\UploadedFile) {
    //     //     $imagePath = $variant['image']->store('product-variants', 'public');
    //     // }

    //     $imagePath = null;
    //         if (isset($variant['image']) && $variant['image'] instanceof \Illuminate\Http\UploadedFile) {
    //             $fileName = $variant['image']->hashName();
    //             $variant['image']->move(public_path('product-variants'), $fileName);
    //             $imagePath = 'product-variants/' . $fileName;
    //         }

    //     $product->variants()->create([
    //         'size' => $size ?: null,
    //         'color_id' => $color ?: null,
    //         'price' => $variant['price'] ?? null,
    //         'stock_quantity' => (int) ($variant['stock_quantity'] ?? 0),
    //         'image' => $imagePath,
    //     ]);
    // }

     // Handle variants
    $variantsInput = $request->input('variants', []);
    $variantsFiles = $request->file('variants', []);

    $seen = [];
    foreach ($variantsInput as $index => $variant) {
        $size  = trim($variant['size'] ?? '');
        $color = $variant['color_id'] ?? null;

        if ($size === '' && $color === '') continue;

        $key = mb_strtoupper($size).'|'.mb_strtoupper($color);
        if (isset($seen[$key])) continue;
        $seen[$key] = true;

        // Handle image
        $imagePath = null;
        if (isset($variantsFiles[$index]['image']) && $variantsFiles[$index]['image'] instanceof \Illuminate\Http\UploadedFile) {
            $file = $variantsFiles[$index]['image'];
            $fileName = $file->hashName();
            $file->move(public_path('product-variants'), $fileName);
            $imagePath = 'product-variants/' . $fileName;
        }

        $product->variants()->create([
            'size' => $size ?: null,
            'color_id' => $color ?: null,
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
        $colors = Color::all();
         return view('admin.products.edit', compact('product', 'categories', 'colors'));
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
        'variants.*.id' => 'nullable|exists:product_variants,id',
        'variants.*.size' => 'nullable|string|max:50',
        'variants.*.color_id' => 'nullable|exists:colors,id',
        'variants.*.price' => 'nullable|numeric|min:0',
        'variants.*.stock_quantity' => 'nullable|integer|min:0',
        'variants.*.image' => 'nullable|image|max:2048',
    ]);

    // Update main product
    $data = $request->except('variants');
    $data['slug'] = Str::slug($request->name);

    if ($request->hasFile('image')) {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        $fileName = $request->file('image')->hashName();
        $request->file('image')->move(public_path('products'), $fileName);
        $data['image'] = 'products/' . $fileName;
    }


    if ($request->hasFile('gallery')) {
        foreach ($request->file('gallery') as $file) {
            $fileName = $file->hashName();
            $file->move(public_path('product-gallery'), $fileName);
            $product->gallery()->create([
                'image' => 'product-gallery/' . $fileName
            ]);
        }
    }

    $product->update($data);

    // Handle variants
    $variantsInput = $request->input('variants', []);
    $variantsFiles = $request->file('variants', []);
    $submittedIds = [];

    foreach ($variantsInput as $index => $variantInput) {
        $variantId = $variantInput['id'] ?? null;
        $size = trim($variantInput['size'] ?? '');
        $color = $variantInput['color_id'] ?? null;

        if ($size === '' && $color === '') continue;

        $imagePath = null;
        if (isset($variantsFiles[$index]['image']) && $variantsFiles[$index]['image'] instanceof \Illuminate\Http\UploadedFile) {
            $file = $variantsFiles[$index]['image'];
            $fileName = $file->hashName();
            $file->move(public_path('product-variants'), $fileName);
            $imagePath = 'product-variants/' . $fileName;
        }

        if ($variantId) {
            // Update existing variant
            $variant = $product->variants()->find($variantId);
            if ($variant) {
                if ($imagePath && $variant->image && file_exists(public_path($variant->image))) {
                    unlink(public_path($variant->image));
                }
                $variant->update([
                    'size' => $size ?: null,
                    'color_id' => $color ?: null,
                    'price' => $variantInput['price'] ?? null,
                    'stock_quantity' => (int) ($variantInput['stock_quantity'] ?? 0),
                    'image' => $imagePath ?? $variant->image,
                ]);
                $submittedIds[] = $variantId;
            }
        } else {
            // Create new variant
            $newVariant = $product->variants()->create([
                'size' => $size ?: null,
                'color_id' => $color ?: null,
                'price' => $variantInput['price'] ?? null,
                'stock_quantity' => (int) ($variantInput['stock_quantity'] ?? 0),
                'image' => $imagePath,
            ]);
            $submittedIds[] = $newVariant->id;
        }
    }

    // Delete removed variants
    $product->variants()->whereNotIn('id', $submittedIds)->each(function($variant) {
        if ($variant->image && file_exists(public_path($variant->image))) {
            unlink(public_path($variant->image));
        }
        $variant->delete();
    });

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        foreach ($product->variants as $variant) {
            if ($variant->image && file_exists(public_path($variant->image))) {
                unlink(public_path($variant->image));
            }
        }
        $product->variants()->delete();
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
