@include('admin.partials.dash-header')

<div class="container">
  <div class="dash-content">
    <h1>Edit Product</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Info -->
         <div class="row">
            <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <label for="name" class="form-label">Product Name *</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
                </div>
            </div>
             <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category *</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                 <div class="mb-3">
                    <label for="price" class="form-label">Price (₹) *</label>
                    <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <label for="stock_quantity" class="form-label">Stock Quantity *</label>
                    <input type="number" min="0" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="form-control" required>
                </div>
            </div>
          
        </div>


        <div class="row">
              <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="status" class="form-label">Status *</label>
                    <select name="status" class="form-select" required>
                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="mb-3">
                            <label>Current Image</label><br>
                            @if($product->image)
                                <img src="{{ asset('public/' . $product->image) }}" alt="{{ $product->name }}" width="100" class="mb-2">
                            @else
                                <p>No image uploaded</p>
                            @endif
                        </div>
                    </div> 

                    <div class="col-12 col-md-9">
                        <div class="mb-3">
                            <label for="image" class="form-label">Change Product Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 mb-3">
            <label for="gallery" class="form-label">Product Gallery Images</label>
            <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>
            <small class="form-text text-muted">You can upload multiple images at once.</small>
        </div>

        @if($product->gallery->count())
        <div class="col-12 mb-3">
            <label class="form-label">Current Gallery</label>
            <div class="d-flex flex-wrap">
                @foreach($product->gallery as $img)
                    <div class="position-relative m-1">
                        <img src="{{ asset($img->image) }}" width="100" height="100" class="border rounded">
                        <a href="{{ route('admin.products.gallery.delete', $img->id) }}" 
                        class="btn btn-sm btn-danger position-absolute top-0 end-0">x</a>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

    

        <!-- Variants Section -->
        <h4>Product Variants</h4>
        <table class="table" id="variants-table">
            <thead>
                <tr>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Price (₹)</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Gallery</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $variantIndex = 0; @endphp
                @foreach($product->variants as $variant)
                <tr>
                    <td>
                        <input type="hidden" name="variants[{{ $variantIndex }}][id]" value="{{ $variant->id }}">
                        <input type="text" name="variants[{{ $variantIndex }}][size]" value="{{ $variant->size }}" class="form-control">
                    </td>
                    <td>
                        <select name="variants[{{ $variantIndex }}][color_id]" class="form-select">
                            <option value="">Select Color</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" {{ $variant->color_id == $color->id ? 'selected' : '' }}>
                                    {{ $color->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" step="0.01" name="variants[{{ $variantIndex }}][price]" value="{{ $variant->price }}" class="form-control"></td>
                    <td><input type="number" name="variants[{{ $variantIndex }}][stock_quantity]" value="{{ $variant->stock_quantity }}" class="form-control"></td>
                    <td>
                        @if($variant->image)
                           
                            <img src="{{ asset($variant->image) }}" width="50" class="mb-1" alt=""><br>
                        @endif
                        <input type="file" name="variants[{{ $variantIndex }}][image]" class="form-control" accept="image/*">
                    </td>
                    <td>
                        <input type="file" name="variants[{{ $variantIndex }}][gallery][]" class="form-control mb-1" accept="image/*" multiple>
                        @if($variant->gallery->count())
                             <div class="position-relative me-2 mb-2" style="width: 70px; height: 70px;">
                                <img src="{{ asset($vimg->image) }}" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                                <form action="{{ route('admin.variants.gallery.delete', $vimg->id) }}" method="POST" class="position-absolute top-0 end-0 m-0 p-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger p-1">x</button>
                                </form>
                            </div>
                        @endif
                    </td>
                    <td><button type="button" class="btn btn-sm btn-danger" onclick="removeVariant(this)">Remove</button></td>
                </tr>
                @php $variantIndex++; @endphp
                @endforeach
            </tbody>
        </table>

        <button type="button" class="btn btn-success btn-secondary mb-3" onclick="addVariant()">+ Add Variant</button>

       


        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

       

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>

@include('admin.partials.dash-footer')