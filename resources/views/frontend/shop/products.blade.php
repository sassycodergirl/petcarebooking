@include('partials.header')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $subcategory->name }}</h1>

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">₹{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No products available in this category.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection


@include('partials.footer')