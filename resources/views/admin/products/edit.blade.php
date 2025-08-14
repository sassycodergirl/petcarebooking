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

        <div class="mb-3">
            <label for="name" class="form-label">Product Name *</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category *</label>
            <select name="category_id" class="form-select" id="category_id" required>
                <option value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (₹) *</label>
            <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price) }}" class="form-control" id="price" required>
        </div>

        <div class="mb-3">
            <label for="stock_quantity" class="form-label">Stock Quantity *</label>
            <input type="number" min="0" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="form-control" id="stock_quantity" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status *</label>
            <select name="status" id="status" class="form-select" required>
                <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100" class="mb-2">
            @else
                <p>No image uploaded</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Change Product Image</label>
            <input type="file" name="image" class="form-control" id="image" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</div>
@include('admin.partials.dash-footer')