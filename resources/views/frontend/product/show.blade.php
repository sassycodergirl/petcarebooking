@include('partials.header')

<section class="banner inner-banner">
    <div class="py-5 product-container">
        <div class="container-fluid px-md-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    @php
                        $defaultImage = $product->image;
                        $galleryImages = $product->gallery;

                        // If product gallery empty, try variant galleries
                        if ($galleryImages->isEmpty() && $product->variants->count()) {
                            foreach ($product->variants as $variant) {
                                if ($variant->gallery->count()) {
                                    $galleryImages = $variant->gallery;
                                    break;
                                }
                            }
                        }

                        // If still empty, fallback to product image
                        if ($galleryImages->isEmpty()) {
                            $galleryImages = collect([(object)['image' => $defaultImage]]);
                        }
                    @endphp

                    <div class="product-gallery row">
                        <div class="gallery-thumbs col-5 col-md-5">
                            @foreach($galleryImages as $image)
                                <div class="thumb-slide">
                                    <img class="img-fluid" src="{{ asset('public/'. $image->image) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="gallery-main col-7 col-md-7">
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

                            <button class="cd-button product-page-cart"
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
            </div>
        </div>
    </div>
</section>

@include('partials.footer')

@php
$variantsData = $product->variants->map(function($variant) {
    $color = $variant->color;
    return [
        'id' => $variant->id,
        'size' => $variant->size,
        'color_id' => $variant->color_id,
        'color_hex' => $color->hex_code ?? '#ccc',
        'color_name' => $color->name ?? '',
        'gallery' => $variant->gallery->pluck('image')->toArray() ?: [$variant->image ?? $variant->product->image],
        'price' => $variant->price,
        'image' => $variant->image ?? $variant->product->image,
    ];
})->toArray();
@endphp

<script>
$(document).ready(function(){

    const appUrl = "{{ url('') }}";
    const variantsData = @json($variantsData);

    let selectedSize = variantsData[0]?.size || null;
    let selectedColorId = variantsData.find(v => v.size === selectedSize)?.color_id || null;
    let productQty = 1;

    $('#product-qty').val(productQty);

    // Quantity buttons
    $('.qty-plus').on('click', () => { productQty++; $('#product-qty').val(productQty); });
    $('.qty-minus').on('click', () => { if(productQty>1) productQty--; $('#product-qty').val(productQty); });

    // Update colors based on selected size
    function updateColors(size){
        const availableColors = variantsData.filter(v => v.size === size).map(v => v.color_id);
        $('input[name="variant_color"]').each(function(){
            const colorId = parseInt($(this).val());
            if(availableColors.includes(colorId)){
                $(this).prop('disabled', false).closest('.selectgroup-item').css('opacity',1);
            } else {
                $(this).prop('disabled', true).closest('.selectgroup-item').css('opacity',0.3);
            }
        });
        selectedColorId = availableColors[0];
        $('input[name="variant_color"][value="'+selectedColorId+'"]').prop('checked', true);
    }

 

    function updateGallery(size, colorId) {
    let variant = variantsData.find(v => v.size === size && v.color_id === colorId)
                  || variantsData.find(v => v.size === size)
                  || { gallery: [$('.add-to-bag').data('image')] };

    const galleryMain = $('.gallery-main');
    const galleryThumbs = $('.gallery-thumbs');

    // Destroy existing carousels if they exist
    if (galleryMain.hasClass('slick-initialized')) {
        galleryMain.slick('unslick');
    }
    if (galleryThumbs.hasClass('slick-initialized')) {
        galleryThumbs.slick('unslick');
    }
    
    // Unbind the event to prevent multiple listeners from stacking up
    galleryMain.off('afterChange'); 

    // Rebuild the gallery HTML
    galleryMain.empty();
    galleryThumbs.empty();

    variant.gallery.forEach(img => {
        galleryMain.append(`<div class="main-slide"><img src="${appUrl}/public/${img}" alt="Product"></div>`);
        galleryThumbs.append(`<div class="thumb-slide"><img src="${appUrl}/public/${img}" alt="Thumb"></div>`);
    });

    // Defer the re-initialization to prevent race conditions
    setTimeout(function() {
        galleryThumbs.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.gallery-main',
            focusOnSelect: true,
            vertical: true,
            swipe: false,
            arrows: false,
            infinite: true,
            centerMode: true,
            initialSlide: 0 
        });

        galleryMain.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            infinite: false,
            initialSlide: 0 
        });

        // Manually sync the thumbnail when the main image changes
        galleryMain.on('afterChange', function(event, slick, currentSlide) {
            galleryThumbs.slick('slickGoTo', currentSlide);
        });
    }, 0); // A timeout of 0ms is all that's needed
}

    updateColors(selectedSize);
    updateGallery(selectedSize, selectedColorId);

    $('input[name="variant_size"]').on('change', function(){
        selectedSize = $(this).val();
        updateColors(selectedSize);
        updateGallery(selectedSize, selectedColorId);
    });

    $('input[name="variant_color"]').on('change', function(){
        if($(this).prop('disabled')) return;
        selectedColorId = parseInt($(this).val());
        updateGallery(selectedSize, selectedColorId);
    });

   


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


});
</script>

