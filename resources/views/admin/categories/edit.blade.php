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

    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Category Name *</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug (optional)</label>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="form-control" id="slug">
            <small class="form-text text-muted">If left empty, slug will be generated automatically.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</div>
@include('admin.partials.dash-footer')
