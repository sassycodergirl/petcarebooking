@include('partials.header')
<section class="banner inner-banner">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('public/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p class="h4">₹{{ $product->price }}</p>
                <p>{{ $product->description ?? 'No description available.' }}</p>

                <div class="pd-add-to-cart-wrap mb-3">
                    <button class="qty-minus" data-id="{{ $product->id }}">-</button>
                    <input type="text" value="1" id="product-qty" readonly>
                    <button class="qty-plus" data-id="{{ $product->id }}">+</button>
                </div>

                <button class="add-to-bag cd-button" 
                        data-id="{{ $product->id }}" 
                        data-name="{{ $product->name }}" 
                        data-price="{{ $product->price }}" 
                        data-image="{{ asset('public/' . $product->image) }}">
                    <img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Cart
                </button>
            </div>
        </div>
    </div>
</section>
@include('partials.footer')
