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

           <!-- Colors Form -->
    <form action="{{ route('admin.products.settings.colors.update') }}" method="POST">
        @csrf
        <div id="color-list">
            @foreach($colors as $color)
                <div class="input-group mb-2 color-item">
                    <input type="hidden" name="ids[]" value="{{ $color->id }}">
                    <input type="text" name="colors[]" value="{{ $color->name }}" class="form-control" placeholder="Color Name">
                    <input type="color" name="hex_codes[]" value="{{ $color->hex_code ?? '#ffffff' }}" class="form-control form-control-color">
                    <button type="button" class="btn btn-danger remove-color">×</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-primary mb-3" id="add-color">Add Color</button>
       
        <button type="submit" class="btn btn-success">Save Colors</button>
    </form>
</div>
</div>
@include('admin.partials.dash-footer')