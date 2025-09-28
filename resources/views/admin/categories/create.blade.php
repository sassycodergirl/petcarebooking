@include('admin.partials.dash-header')
<div class="container">
    <div class="dash-content">
        <h1>Add Product Category</h1>

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

        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name *</label>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               class="form-control" 
                               id="name" 
                               required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (optional)</label>
                        <input type="text" 
                               name="slug" 
                               value="{{ old('slug') }}" 
                               class="form-control" 
                               id="slug">
                        <small class="form-text text-muted">
                            If left empty, the slug will be generated automatically.
                        </small>
                    </div>
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_food" id="is_food" {{ isset($category) && $category->is_food ? 'checked' : '' }}>
                <label class="form-check-label" for="is_food">
                    Is Food Item?
                </label>
            </div>

           <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">

            <div class="mt-2">
                <img id="image-preview" src="#" alt="Image Preview" 
                    style="display: none; max-width: 200px; height: auto;">
            </div>
        </div>

            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent Category</label>
                <select name="parent_id" id="parent_id" class="form-select">
                    <option value="">None (Top Level)</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" 
                                {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description (optional)</label>
                <textarea name="description" 
                          id="description" 
                          class="form-control" 
                          rows="3">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Save Category</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@include('admin.partials.dash-footer')
<script>
    // Get the elements
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');

    // Listen for the 'change' event on the file input
    imageInput.addEventListener('change', function(event) {
        // Get the selected file
        const file = event.target.files[0];

        // Check if a file is selected
        if (file) {
            // Create a new FileReader object
            const reader = new FileReader();

            // Set the function to run when the file is loaded
            reader.onload = function(e) {
                // Update the 'src' of the <img> tag and make it visible
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            // Read the file as a Data URL
            reader.readAsDataURL(file);
        } else {
            // Hide the preview if no file is selected
            imagePreview.style.display = 'none';
            imagePreview.src = '#';
        }
    });
</script>