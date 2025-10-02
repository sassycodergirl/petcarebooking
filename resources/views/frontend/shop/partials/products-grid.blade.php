<!-- @if($products->count())
    <div class="row">
        @foreach($products as $product)
               <div class="col-6 col-md-3 mb-4 new-product pb-0">
                                <div class="product-card-col h-100 shadow-sm p-2 p-md-4">
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
                                            <button class="add-to-bag cd-button" data-id="{{ $product->id }}"  data-name="{{ $product->name }}"  data-price="{{ $product->price }}" data-image="{{ asset('public/' . $product->image) }}"><img class="d-none d-md-block" src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Cart</button>
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
@endif -->


@if($products->count())
    <div class="row">
        @foreach($products as $product)
            <div class="col-6 col-md-3 mb-4 new-product pb-0">
                <div class="product-card-col p-0 shadow-sm h-100">
                    <a href="{{ route('product.show', $product->slug) }}" class="product-card-img p-0 position-relative">
                        <div class="product-img">
                            <img src="{{ asset('public/' . $product->image) }}" class="img-fluid h-100" alt="{{ $product->name }}">
                        </div>
                        
                        <div class="food-type-wrapper">
                            @if($product->category->is_food)
                                @if($product->attributes->contains('slug', 'veg'))
                                    <img src="{{ asset('images/veg.webp') }}" alt="Veg" title="Vegetarian" class="food-type-icon">
                                @else
                                    <img src="{{ asset('images/non_veg.webp') }}" alt="Non-Veg" title="Non-Vegetarian" class="food-type-icon">
                                @endif
                            @endif
                        </div>
                    </a>
                    <div class="card-body text-center">
                        <h2 class="brand-name mt-2">Furry Friends & Co</h2>
                        <h3><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                        <p class="card-text">
                            @if ($product->variants_count > 0 && $product->variants_min_price !== null)
                                From ₹{{ number_format($product->variants_min_price) }}
                            @else
                                ₹{{ number_format($product->price) }}
                            @endif
                        </p>
                        @if($product->stock_quantity <= 0 || !$product->status)
                                                        <button class="btn btn-secondary" disabled>Out of Stock</button>
                                                    @elseif($product->has_variants)
                                                        <a href="{{ route('product.show', $product->slug) }}" class="choose-option">
                                                            Choose Option
                                                        </a>
                                                    @else
                                                        <button class="add-to-bag cd-button"
                                                                data-id="{{ $product->id }}"
                                                                data-name="{{ $product->name }}"
                                                                data-price="{{ $product->price }}"
                                                                data-image="{{ asset('public/' . $product->image) }}">
                                                            <img class="d-none d-md-block" src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Cart
                                                        </button>
                                                    @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(!request()->ajax())
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
    @endif
@else
    <p>No products found for the selected filters.</p>
@endif