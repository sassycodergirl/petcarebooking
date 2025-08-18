@include('partials.header')

<section class="banner inner-banner">
    <div class="py-5 product-container">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <!-- Product Gallery Slider -->
                    @php
                        // Default gallery images
                        $galleryImages = $product->gallery;

                        if ($galleryImages->isEmpty() && $product->variants->count()) {
                            foreach ($product->variants as $variant) {
                                if ($variant->gallery->count()) {
                                    $galleryImages = $variant->gallery;
                                    break;
                                }
                            }
                        }

                        if ($galleryImages->isEmpty()) {
                            $galleryImages = collect([(object)['image' => $product->image]]);
                        }
                    @endphp

                    <div class="product-gallery row">
                        <!-- Thumbnails (Left) -->
                        <div class="gallery-thumbs col-md-5">
                            @foreach($galleryImages as $image)
                                <div class="thumb-slide">
                                    <img class="img-fluid" src="{{ asset('public/'. $image->image) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>

                        <!-- Main Slider (Right) -->
                        <div class="gallery-main col-md-7">
                            @foreach($galleryImages as $image)
                                <div class="main-slide">
                                    <img class="img-fluid" src="{{ asset('public/'.$image->image) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="product-information content-sec p-3 p-md-5">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <p class="h4">₹{{ $product->price }}</p>

                        @if($product->variants->count())
                            <div class="product-variants mb-3">

                                @php
                                    $sizes = $product->variants->pluck('size')->filter()->unique();
                                @endphp

                                <!-- Sizes -->
                                @if($sizes->count())
                                    <div class="mb-2">
                                        <label class="form-label">Size:</label>
                                        <div class="selectgroup selectgroup-pills">
                                            @foreach($sizes as $size)
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="variant_size" value="{{ $size }}" class="selectgroup-input" {{ $loop->first ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">{{ $size }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Colors -->
                                @if($product->variants->pluck('color')->filter()->count())
                                    <div class="mb-2">
                                        <label class="form-label">Colors:</label>
                                        <div class="selectgroup selectgroup-pills color-pills">
                                            @foreach($product->variants->pluck('color')->filter()->unique('id') as $color)
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="variant_color" value="{{ $color->id }}" class="selectgroup-input variant-select" {{ $loop->first ? 'checked' : '' }}>
                                                    <span class="selectgroup-button" style="background-color: {{ $color->hex_code ?? '#ccc' }}; color: #fff;"></span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div class="d-flex gap-3 align-items-center">
                            <div class="pd-add-to-cart-wrap product-page">
                                <button class="qty-minus" data-id="{{ $product->id }}">-</button>
                                <input type="text" value="1" id="product-qty" readonly>
                                <button class="qty-plus" data-id="{{ $product->id }}">+</button>
                            </div>

                            <button class="add-to-bag cd-button product-page-btn"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-image="{{ asset($product->image) }}">
                                Add to Cart
                            </button>
                        </div>
                    </div>

                    <div class="product-meta mt-5 content-sec p-3 p-md-5">
                        <div class="accordion" id="productAccordion">
                            <!-- Description -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingDescription">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDescription" aria-expanded="true" aria-controls="collapseDescription">
                                        Product Description
                                    </button>
                                </h2>
                                <div id="collapseDescription" class="accordion-collapse collapse" aria-labelledby="headingDescription" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        {!! $product->description ?? 'No description available.' !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Ingredients (if food) -->
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




<!-- <script>
let productQty = 1;

document.querySelector('.qty-plus').addEventListener('click', () => {
    productQty++;
    document.getElementById('product-qty').value = productQty;
});

document.querySelector('.qty-minus').addEventListener('click', () => {
    if(productQty > 1) productQty--;
    document.getElementById('product-qty').value = productQty;
});
</script> -->



