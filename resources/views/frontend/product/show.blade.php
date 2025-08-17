@include('partials.header')
<section class="banner inner-banner">
    <div class="py-5 product-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('public/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1 class="product-title">{{ $product->name }}</h1>
                    <p class="h4">₹{{ $product->price }}</p>
                    <p>{{ $product->description ?? 'No description available.' }}</p>

              

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
    </div>
</section>
@include('partials.footer')
