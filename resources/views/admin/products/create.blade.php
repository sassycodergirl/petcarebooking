@include('admin.partials.dash-header')
<div class="container">
     <div class="dash-content">
        <h1>Add Product</h1>

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

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-12 col-md-6">
                      <div class="mb-3">
                            <label for="name" class="form-label">Product Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" required>
                        </div>
                </div>

                <div class="col-12 col-md-6">
                      <div class="mb-3">
                            <label for="category_id" class="form-label">Category *</label>
                            <select name="category_id" class="form-select" id="category_id" required>
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected':'' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price (₹) *</label>
                        <input type="number" step="0.01" min="0" name="price" value="{{ old('price') }}" class="form-control" id="price" required>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Stock Quantity *</label>
                        <input type="number" min="0" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" class="form-control" id="stock_quantity" required>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Product Attributes</label>
                         <select name="attributes[]" multiple class="form-select">
                            @foreach(\App\Models\Attribute::all() as $attribute)
                                <option value="{{ $attribute->id }}">
                                    {{ $attribute->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status *</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                     <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*">
                    </div>
                </div>

                <div class="col-12 col-md-12">
                    <div class="mb-3">
                        <label for="gallery" class="form-label">Product Gallery</label>
                        <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>
                        <small class="form-text text-muted">You can upload multiple images.</small>
                    </div>
                </div>

            </div>    
            
              {{-- Variants Section --}}
            <h4 class="mt-4">Product Variants</h4>
            <table id="variants-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Variant Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Image Gallery</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Initially empty, rows added with JS --}}
                </tbody>
            </table>
            <button type="button" class="btn btn-sm btn-secondary" onclick="addVariant()">+ Add Variant</button>

            <br><br>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4">{{ old('description') }}</textarea>
            </div>


           




            <button type="submit" class="btn btn-success">Save Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>  
</div>

@include('admin.partials.dash-footer')


