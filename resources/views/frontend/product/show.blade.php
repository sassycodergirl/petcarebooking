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
                                    <img class="img-fluid" src="{{ asset($image->image) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>

                        <!-- Main Slider (Right) -->
                        <div class="gallery-main col-md-7">
                            @foreach($galleryImages as $image)
                                <div class="main-slide">
                                    <img class="img-fluid" src="{{ asset($image->image) }}" alt="{{ $product->name }}">
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
                            <div class="pd-add-to-cart-wrap">
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

<!-- Pass all variant data to JS -->
<script>
const variantsData = @json($product->variants->map(function($variant){
    return [
        'id' => $variant->id,
        'size' => $variant->size,
        'color_id' => $variant->color_id,
        'color' => $variant->color ? [
            'id' => $variant->color->id,
            'hex_code' => $variant->color->hex_code ?? '#ccc',
            'name' => $variant->color->name ?? '',
        ] : null,
        'gallery' => $variant->gallery->pluck('image')->toArray(),
        'price' => $variant->price,
        'image' => $variant->image,
    ];
})->toArray());
</script>

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

<script>
$(document).ready(function(){
    const appUrl = "{{ url('') }}"; // Base URL

    // Default selection
    let selectedSize = variantsData[0]?.size || null;
    let selectedColorId = variantsData.find(v => v.size === selectedSize)?.color_id || null;

    function updateGallery(selectedSize, selectedColorId){
        const variant = variantsData.find(v => v.size === selectedSize && v.color_id === selectedColorId)
                     || variantsData.find(v => v.size === selectedSize);

        if(!variant) return;

        const galleryMain = $('.gallery-main');
        const galleryThumbs = $('.gallery-thumbs');

        galleryMain.slick('unslick');
        galleryThumbs.slick('unslick');
        galleryMain.html('');
        galleryThumbs.html('');

        variant.gallery.forEach(img => {
            galleryMain.append(`<div class="main-slide"><img src="${appUrl}/${img}" alt="Product"></div>`);
            galleryThumbs.append(`<div class="thumb-slide"><img src="${appUrl}/${img}" alt="Thumb"></div>`);
        });

        // Re-init slick
        galleryThumbs.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.gallery-main',
            focusOnSelect: true,
            vertical: true,
            verticalSwiping: true,
            arrows: true,
            infinite: true
        });

        galleryMain.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.gallery-thumbs',
            arrows: true,
            fade: true,
            infinite: false
        });
    }

    // Size selection
    $('input[name="variant_size"]').on('change', function(){
        selectedSize = $(this).val();

        const availableColors = variantsData.filter(v => v.size === selectedSize).map(v => v.color_id);

        $('.variant-select').each(function(){
            const colorId = parseInt($(this).val());
            if(availableColors.includes(colorId)){
                $(this).prop('disabled', false).closest('.selectgroup-item').css('opacity',1);
            }else{
                $(this).prop('disabled', true).closest('.selectgroup-item').css('opacity',0.3);
            }
        });

        const firstColor = availableColors[0];
        selectedColorId = firstColor;
        $('input[name="variant_color"][value="'+firstColor+'"]').prop('checked', true);

        updateGallery(selectedSize, selectedColorId);
    });

    // Color selection
    $('input[name="variant_color"]').on('change', function(){
        if($(this).prop('disabled')) return;
        selectedColorId = parseInt($(this).val());
        updateGallery(selectedSize, selectedColorId);
    });

    // Initialize gallery on load
    updateGallery(selectedSize, selectedColorId);
});
</script>
