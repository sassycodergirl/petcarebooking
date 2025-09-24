@include('partials.header')

<section class="banner inner-banner">
    <div class=" py-4 py-md-5 product-container">
        <div class="container-fluid px-md-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    @php
                        // This block sets the initial display before JavaScript takes over.
                        $initialGallery = $product->gallery;
                        if ($initialGallery->isEmpty()) {
                            $firstVariantWithGallery = $product->variants->firstWhere(fn($v) => $v->gallery->isNotEmpty());
                            if ($firstVariantWithGallery) {
                                $initialGallery = $firstVariantWithGallery->gallery;
                            }
                        }
                        if ($initialGallery->isEmpty()) {
                            $initialGallery = collect([(object)['image' => $product->image]]);
                        }
                    @endphp

                    <div class="product-gallery">
                        <div class="gallery-thumbs">
                            {{-- This will be populated by JavaScript --}}
                        </div>
                        <div class="gallery-main">
                            {{-- This will be populated by JavaScript --}}
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <div class="product-information content-sec p-3 p-md-5">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        
                        <p class="h4" id="product-price">₹{{ number_format($product->price) }}</p>

                        @if($product->variants->count())
                            <div class="product-variants mb-5">
                                @php
                                    $sizes = $product->variants->pluck('size')->filter()->unique();
                                    $colorVariants = $product->variants->map(fn($v) => $v->color)->filter()->unique('id');
                                @endphp
                                @if($sizes->count())
                                    <div class="mb-2">
                                        <label class="form-label">Size:</label>
                                        <div class="selectgroup selectgroup-pills">
                                            @foreach($sizes as $size)
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="variant_size" value="{{ $size }}" class="selectgroup-input">
                                                    <span class="selectgroup-button">{{ $size }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if($colorVariants->count())
                                    <div class="mb-2">
                                        <label class="form-label">Colors:</label>
                                        <div class="selectgroup selectgroup-pills color-pills">
                                            @foreach($colorVariants as $color)
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="variant_color" value="{{ $color->id }}" class="selectgroup-input variant-select">
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

                            @php
                                $totalStock = $product->variants->sum('stock_quantity') > 0 || $product->stock_quantity > 0;
                            @endphp

                            @if(!$totalStock)
                                <button class="btn btn-secondary" disabled>Out of Stock</button>
                            @else
                                <button class="cd-button product-page-cart"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-price="{{ $product->price }}"
                                        data-image="{{ asset($product->image) }}">
                                    Add to Cart
                                </button>
                            @endif
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

    <!--product meta-->
    <div class="product-info-section">
         <div class="product-meta mt-5 content-sec p-3 p-md-5">
            <div class="accordion" id="productAccordion">
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
</section>

@include('partials.footer')

@php
   
    $productGallery = $product->gallery;

    $variantsData = $product->variants->map(function($variant) use ($productGallery) {
        
        $finalGallery = $variant->gallery;
        if ($finalGallery->isEmpty() && $productGallery->isNotEmpty()) {
            $finalGallery = $productGallery;
        }

        $galleryImages = $finalGallery->pluck('image')->toArray() ?: [$variant->image ?? $variant->product->image];
        
        $color = $variant->color;
        return [
            'id' => $variant->id,
            'size' => $variant->size,
            'color_id' => $variant->color_id,
            'color_hex' => $color->hex_code ?? '#ccc',
            'color_name' => $color->name ?? '',
            'gallery' => $galleryImages,
            'price' => $variant->price,
            'image' => $variant->image ?? $variant->product->image,
            'stock_quantity' => $variant->stock_quantity,
        ];
    })->toArray();
@endphp

<script>
$(document).ready(function(){
    const appUrl = "{{ url('') }}";
    const variantsData = @json($variantsData);

    // ✅ UPDATE: Selects the first IN-STOCK variant by default
    const initialVariant = variantsData.find(v => v.stock_quantity > 0) || variantsData[0];
    let selectedSize = initialVariant?.size || null;
    let selectedColorId = initialVariant?.color_id || null;
    let productQty = 1;

    $('#product-qty').val(productQty);

    if (initialVariant) {
        $('input[name="variant_size"][value="' + selectedSize + '"]').prop('checked', true);
        $('input[name="variant_color"][value="' + selectedColorId + '"]').prop('checked', true);
    }

    $('.qty-plus').on('click', () => { productQty++; $('#product-qty').val(productQty); });
    $('.qty-minus').on('click', () => { if(productQty > 1) productQty--; $('#product-qty').val(productQty); });

    // ✅ UPDATE: Smarter function to disable out-of-stock colors for a selected size
    function updateColors(size){
        const availableColors = variantsData.filter(v => v.size === size && v.stock_quantity > 0).map(v => v.color_id);
        let firstAvailableColor = null;

        $('input[name="variant_color"]').each(function(){
            const colorId = parseInt($(this).val());
            const hasStockForThisColor = variantsData.some(v => v.size === size && v.color_id === colorId && v.stock_quantity > 0);

            if (hasStockForThisColor) {
                $(this).prop('disabled', false).closest('.selectgroup-item').removeClass('disabled out-of-stock').css('opacity', 1);
                if (!firstAvailableColor) firstAvailableColor = colorId;
            } else {
                $(this).prop('disabled', true).closest('.selectgroup-item').addClass('disabled out-of-stock').css('opacity', 0.3);
            }
        });

        if (firstAvailableColor) {
            selectedColorId = firstAvailableColor;
            $('input[name="variant_color"][value="' + selectedColorId + '"]').prop('checked', true);
        } else {
            // If no colors are available for this size, uncheck all
            $('input[name="variant_color"]:checked').prop('checked', false);
            selectedColorId = null;
        }
    }

    function updateGallery(size, colorId) {
        const scrollTop = $(window).scrollTop();
        $('body').css('overflow', 'hidden');

        let variant = variantsData.find(v => v.size === size && v.color_id === colorId) || {};

        // ✅ UPDATE: Updates the price display when a variant is selected
        const basePrice = {{ $product->price }};
        if (variant && variant.price) {
            $('#product-price').text('₹' + new Intl.NumberFormat().format(variant.price));
        } else {
            $('#product-price').text('₹' + new Intl.NumberFormat().format(basePrice));
        }

        const galleryMain = $('.gallery-main');
        const galleryThumbs = $('.gallery-thumbs');

        if (galleryMain.hasClass('slick-initialized')) galleryMain.slick('unslick');
        if (galleryThumbs.hasClass('slick-initialized')) galleryThumbs.slick('unslick');
        
        galleryMain.off('afterChange').empty();
        galleryThumbs.empty();
        
        const images = variant.gallery || [];
        images.forEach(img => {
            const fullUrl = `${appUrl}/public/${img}`;
            galleryMain.append(`<div class="main-slide"><img src="${fullUrl}" alt="{{ $product->name }}"></div>`);
            galleryThumbs.append(`<div class="thumb-slide"><img src="${fullUrl}" alt="Thumbnail"></div>`);
        });

        // ✅ UPDATE: Hides thumbnail slider if there's only one image
        if (images.length > 1) {
            galleryThumbs.show();
            setTimeout(function() {
                galleryThumbs.slick({
                    slidesToShow: 3, asNavFor: '.gallery-main', focusOnSelect: true,
                    vertical: true, swipe: false, arrows: false, infinite: true, centerMode: true,
                });
                galleryMain.slick({
                    slidesToShow: 1, arrows: true, fade: true, asNavFor: '.gallery-thumbs'
                });
                $('body').css('overflow', '');
                $(window).scrollTop(scrollTop);
            }, 0);
        } else {
            galleryThumbs.hide();
            $('body').css('overflow', '');
            $(window).scrollTop(scrollTop);
        }
    }

    // Initial page load calls
    updateColors(selectedSize);
    updateGallery(selectedSize, selectedColorId);

    // Event Handlers
    $('input[name="variant_size"]').on('change', function(){
        selectedSize = $(this).val();
        updateColors(selectedSize);
        updateGallery(selectedSize, selectedColorId);
    });

    $('input[name="variant_color"]').on('change', function(){
        if($(this).is(':disabled')) return;
        selectedColorId = parseInt($(this).val());
        updateGallery(selectedSize, selectedColorId);
    });
    
    // Add to cart logic ...
    // $('.product-page-cart').on('click', function(e) { /* your existing fetch call */ });
        // Add to cart – fixed
    $('.product-page-cart').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();

        const productId = $(this).data('id');
        const quantity = parseInt($('#product-qty').val()) || 1;

        // Find the selected variant from your variantsData array
        let variant = variantsData.find(v => v.size === selectedSize && v.color_id === selectedColorId)
                || variantsData.find(v => v.size === selectedSize)
                || variantsData.find(v => v.color_id === selectedColorId)
                || {}; // fallback empty object if no match

        // Prepare payload from variant (fallback to defaults)
        let payload = {
            qty: quantity,
            variant_id: variant?.id || null,
            size: variant?.size || null,
            color_id: variant?.color_id || null,
            color_name: variant?.color_name || null,
            color_hex: variant?.color_hex || null,
            price: variant?.price || $(this).data('price'),
            image: variant?.image || $(this).data('image')
        };

        console.log('Add to Cart Payload:', payload);

        fetch(`{{ url('/cart/add') }}/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                $('.cd-button-cart-count').text(data.itemCount);
                // if(typeof renderCartItems === 'function'){
                //     renderCartItems(data.cart, data.totalPrice);
                // }
                window.renderCartItems(data.cart, data.totalPrice);
                $('.popup-overlay').css('display', 'block');
                setTimeout(() => $('.popup-overlay').addClass('active'), 10);
            } else {
                alert(data.message || 'Something went wrong!');
            }
        })
        .catch(err => console.error(err));
    });

    // Out of stock alert
    $('input[name="variant_size"], input[name="variant_color"]').on('change', function(){
        let variant = variantsData.find(v => v.size === selectedSize && v.color_id === selectedColorId);
        if (variant && variant.stock_quantity <= 0) {
            alert('This combination is out of stock!');
        }
    });
});
</script>