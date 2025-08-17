
@include('partials.header')
@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar with subcategories -->
        <div class="col-md-3">
            <h4 class="mb-3">{{ $category->name }}</h4>
            <ul class="list-group">
                @foreach($subcategories as $subcategory)
                    <li class="list-group-item">
                        <a href="{{ route('shop.category', $subcategory->slug) }}">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Main content area -->
        <div class="col-md-9">
            <h2>Explore {{ $category->name }}</h2>
            <p>Select a subcategory from the left.</p>
        </div>
    </div>
</div>
@endsection


@include('partials.footer')