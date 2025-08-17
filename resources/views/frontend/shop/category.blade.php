
@include('partials.header')
@section('content')
<div class="container">
    <h1 class="mb-4">{{ $category->name }}</h1>

    <div class="row">
        @forelse($subcategories as $subcategory)
            <div class="col-md-3 mb-4">
                <a href="{{ route('shop.subcategory', [$category->slug, $subcategory->slug]) }}" class="card h-100 text-decoration-none">
                    @if($subcategory->image)
                        <img src="{{ asset('storage/' . $subcategory->image) }}" class="card-img-top" alt="{{ $subcategory->name }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $subcategory->name }}</h5>
                    </div>
                </a>
            </div>
        @empty
            <p>No subcategories available.</p>
        @endforelse
    </div>
</div>
@endsection


@include('partials.footer')