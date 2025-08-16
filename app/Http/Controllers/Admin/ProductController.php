<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProductVariant;
use App\Models\Color;
use App\Models\ProductImage;
use App\Models\ProductVariantImage;

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
            'gallery.*' => 'nullable|image|max:2048', // Product gallery
             // variants (optional)
            'variants' => 'array',
            'variants.*.size' => 'nullable|string|max:50',
            'variants.*.color_id' => 'nullable|exists:colors,id',
            'variants.*.price' => 'nullable|numeric|min:0',
            'variants.*.stock_quantity' => 'nullable|integer|min:0',
            'variants.*.image' => 'nullable|image|max:2048', // using URL/path for simplicity
             'variants.*.gallery.*' => 'nullable|image|max:2048', // Variant gallery
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

        $product = Product::create($data);

        // Product gallery
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $fileName = $file->hashName();
                $file->move(public_path('products'), $fileName);
                $product->gallery()->create([
                    'image' => 'products/' . $fileName
                ]);
            }
        }

        

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

        $createdVariant = $product->variants()->create([
            'size' => $size ?: null,
            'color_id' => $color ?: null,
            'price' => $variant['price'] ?? null,
            'stock_quantity' => (int) ($variant['stock_quantity'] ?? 0),
            'image' => $imagePath,
        ]);


        // Variant gallery
        if (isset($variantsFiles[$index]['gallery'])) {
            foreach ($variantsFiles[$index]['gallery'] as $vfile) {
                $fileName = $vfile->hashName();
                $vfile->move(public_path('variant-gallery'), $fileName);
                $createdVariant->gallery()->create([
                    'image' => 'variant-gallery/' . $fileName
                ]);
            }
        }
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
        'gallery.*' => 'nullable|image|max:2048', 
        'variants' => 'array',
        'variants.*.id' => 'nullable|exists:product_variants,id',
        'variants.*.size' => 'nullable|string|max:50',
        'variants.*.color_id' => 'nullable|exists:colors,id',
        'variants.*.price' => 'nullable|numeric|min:0',
        'variants.*.stock_quantity' => 'nullable|integer|min:0',
        'variants.*.image' => 'nullable|image|max:2048',
        'variants.*.gallery.*' => 'nullable|image|max:2048',
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

    // Product gallery
    if ($request->hasFile('gallery')) {
        foreach ($request->file('gallery') as $file) {
            $fileName = $file->hashName();
            $file->move(public_path('products'), $fileName);
            $product->gallery()->create([
                'image' => 'products/' . $fileName
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

        // Skip empty variants
        if ($size === '' && $color === '') continue;

        // Handle main image
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

                // Update variant gallery
                if (isset($variantsFiles[$index]['gallery'])) {
                    foreach ($variantsFiles[$index]['gallery'] as $vfile) {
                        $fileName = $vfile->hashName();
                        $vfile->move(public_path('variant-gallery'), $fileName);
                        $variant->gallery()->create([
                            'image' => 'variant-gallery/' . $fileName
                        ]);
                    }
                }
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

            // Variant gallery for new variant
            if (isset($variantsFiles[$index]['gallery'])) {
                foreach ($variantsFiles[$index]['gallery'] as $vfile) {
                    $fileName = $vfile->hashName();
                    $vfile->move(public_path('variant-gallery'), $fileName);
                    $newVariant->gallery()->create([
                        'image' => 'variant-gallery/' . $fileName
                    ]);
                }
            }
        }
    }

    // Only delete variants that are **actually removed in the edit form**
    $product->variants()->whereNotIn('id', $submittedIds)->get()->each(function($variant) {
        // Delete main image
        if ($variant->image && file_exists(public_path($variant->image))) {
            unlink(public_path($variant->image));
        }

        // Delete variant gallery
        foreach ($variant->gallery as $g) {
            if ($g->image && file_exists(public_path($g->image))) {
                unlink(public_path($g->image));
            }
            $g->delete();
        }

        // Delete variant
        $variant->delete();
    });

    return redirect()->route('admin.products.edit', $product->id)->with('success', 'Product updated successfully.');
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


    public function deleteMainImage($id)
        {
            $product = Product::findOrFail($id);

            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $product->image = null;
            $product->save();

            return response()->json(['success' => true]);
        }


           // Delete a gallery image
       public function deleteGalleryImage($id)
        {
             \Log::info('Request method: ' . request()->method());
            \Log::info('Request data: ', request()->all());
            $gallery = ProductImage::find($id);
            if (!$gallery) {
                return response()->json(['success' => false, 'message' => 'Image not found'], 404);
            }

            if ($gallery->image && file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }

            $gallery->delete();

            return response()->json(['success' => true]);
        }

        //global color setting
        public function settings()
        {
            $colors = Color::all(); // fetch all global colors
            return view('admin.products.settings', compact('colors'));
        }

      public function updateColors(Request $request)
        {
            // Delete removed colors
            if ($request->deleted_ids && is_array($request->deleted_ids)) {
                Color::whereIn('id', $request->deleted_ids)->delete();
            }

            // Validate
            $request->validate([
                'colors' => 'required|array',
                'colors.*' => 'string|max:50',
                'hex_codes.*' => 'nullable|string|max:7',
            ]);

            // Update or create colors
            foreach ($request->colors as $index => $name) {
                Color::updateOrCreate(
                    ['id' => $request->ids[$index] ?? null],
                    ['name' => $name, 'hex_code' => $request->hex_codes[$index] ?? null]
                );
            }

            return redirect()->back()->with('success', 'Colors updated successfully!');
        }



           

}
