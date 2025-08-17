@if($products->count())
    <div class="row">
        @foreach($products as $product)
               <div class="col-6 col-md-3 mb-4 new-product pb-0">
                                <div class="product-card-col h-100 shadow-sm p-4">
                                    @if($product->image)
                                    <a href="{{ route('product.show', $product->slug) }}" class="product-card-img p-0">
                                    <div class="product-img h-100">

                                        <img src="{{ $product->image }}" class="img-fluid h-100" alt="{{ $product->name }}">
                                    </div>
                                    </a>
                                    @endif
                                    <div class="card-body text-center">
                                        <h3><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                        <div class="">
                                            <p class="card-text">₹{{ $product->price }}</p>
                                            <button class="add-to-bag cd-button" data-id="{{ $product->id }}"  data-name="{{ $product->name }}"  data-price="{{ $product->price }}" data-image="{{ asset('public/' . $product->image) }}"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Cart</button>
                                        </div>
                                        
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
