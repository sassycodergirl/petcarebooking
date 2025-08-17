@include('partials.header')
<section class="banner inner-banner">
    <div class="py-5 product-container">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="{{ asset('public/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-12 col-md-6">
                    <div class="product-information">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <p class="h4">₹{{ $product->price }}</p>
                    
                         <div class="d-flex gap-3">
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
                    <div class="product-meta">
                        <div class="accordion" id="productAccordion">

                            <!-- Description -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingDescription">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDescription" aria-expanded="true" aria-controls="collapseDescription">
                                        Product Description
                                    </button>
                                </h2>
                                <div id="collapseDescription" class="accordion-collapse collapse show" aria-labelledby="headingDescription" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        {!! $product->description ?? 'No description available.' !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Ingredients (only for is_food category) -->
                            @if($product->category->is_food && $product->ingredients)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingIngredients">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIngredients" aria-expanded="false" aria-controls="collapseIngredients">
                                            Ingredients
                                        </button>
                                    </h2>
                                    <div id="collapseIngredients" class="accordion-collapse collapse" aria-labelledby="headingIngredients" data-bs-parent="#productAccordion">
                                        <div class="accordion-body">
                                            {!! $product->ingredients !!}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.footer')

<script>
let productQty = 1;

document.querySelector('.qty-plus').addEventListener('click', () => {
    productQty++;
    document.getElementById('product-qty').value = productQty;
});

document.querySelector('.qty-minus').addEventListener('click', () => {
    if(productQty > 1) productQty--;
    document.getElementById('product-qty').value = productQty;
});

</script>  
