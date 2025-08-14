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

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

             <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                       <div class="mb-3">
                        <label for="slug" class="form-label">Slug (optional)</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id="slug">
                        <small class="form-text text-muted">If left empty, slug will be generated automatically.</small>
                    </div>
                </div>
            </div>

            

         

            <button type="submit" class="btn btn-success">Save Category</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@include('admin.partials.dash-footer')
