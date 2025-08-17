@if($products->count())
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($product->image)
                    <div class="product-img">
                        <img src="{{ asset('public/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                    </div>
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">₹{{ $product->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(!request()->ajax())
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    @endif
@else
    <p>No products found for selected attributes.</p>
@endif
