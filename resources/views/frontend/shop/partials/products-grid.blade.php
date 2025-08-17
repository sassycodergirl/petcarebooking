@if($products->count())
    <div class="row">
        @foreach($products as $product)
              <div class="col-md-4 mb-4 new-product pb-0">
                                <div class="product-card-col h-100 shadow-sm p-4">
                                    @if($product->image)
                                    <a href="#" class="product-card-img">
                                    <div class="product-img">

                                        <img src="{{ asset('public/' . $product->image) }}" class="img-fluid " alt="{{ $product->name }}">
                                    </div>
                                    </a>
                                    @endif
                                    <div class="card-body text-center">
                                        <h3><a href="#">{{ $product->name }}</a></h3>
                                       
                                        <p class="card-text">₹{{ $product->price }}</p>
                                        <button class="add-to-bag cd-button" data-id="{{ $product->id }}"  data-name="{{ $product->name }}"  data-price="{{ $product->price }}" data-image="{{ asset('public/' . $product->image) }}"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Cart</button>
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
