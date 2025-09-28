@include('admin.partials.dash-header')
<div class="container">
  <div class="dash-content">
    <h1>Edit Category</h1>

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

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Category Name *</label>
            <input type="text" 
                   name="name" 
                   value="{{ old('name', $category->name) }}" 
                   class="form-control" 
                   id="name" 
                   required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug (optional)</label>
            <input type="text" 
                   name="slug" 
                   value="{{ old('slug', $category->slug) }}" 
                   class="form-control" 
                   id="slug">
            <small class="form-text text-muted">If left empty, slug will be generated automatically.</small>
        </div>

        <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_food" id="is_food" {{ isset($category) && $category->is_food ? 'checked' : '' }}>
                <label class="form-check-label" for="is_food">
                    Is Food Item?
                </label>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="file" name="image" id="image" class="form-control">
            
          
            <div class="mt-2">
                <img id="image-preview" 
                    src="{{ $category->image ? asset('public/' .$category->image) : '#' }}" 
                    alt="Image Preview" 
                    style="max-width: 200px; height: auto; {{ $category->image ? 'display: block;' : 'display: none;' }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Category</label>
            <!-- <select name="parent_id" id="parent_id" class="form-select">
                <option value="">None (Top Level)</option>
                @foreach($categories as $cat)
                    @if($cat->id != $category->id) {{-- prevent self-selection --}}
                        <option value="{{ $cat->id }}" 
                            {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endif
                @endforeach
            </select> -->

            <!-- <select name="parent_id" id="parent_id" class="form-select">
                    <option value="">None (Top Level)</option>
                   @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" 
                                {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select> -->

                <select name="parent_id" id="parent_id" class="form-select">
                        <option value="">None (Top Level)</option>
                        @foreach($categories as $cat)
                            @if($cat->id != $category->id) {{-- prevent self-selection --}}
                                <option value="{{ $cat->id }}" 
                                    {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>

        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea name="description" 
                      id="description" 
                      class="form-control" 
                      rows="3">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</div>
@include('admin.partials.dash-footer')
<script>
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Update the src of the img tag and ensure it is visible
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    });
</script>