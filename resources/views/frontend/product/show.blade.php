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

                            <button class="add-to-bag cd-button product-page-cart"
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
@php
$variantsData = $product->variants->map(function($variant) {
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
})->toArray();
@endphp

<script>
const ProductPage = {
    variantsData: @json($variantsData),
    appUrl: "{{ url('') }}",
    selectedSize: null,
    selectedColorId: null,
    
    init: function() {
        this.selectedSize = this.variantsData[0]?.size || null;
        this.selectedColorId = this.variantsData.find(v => v.size === this.selectedSize)?.color_id || null;

        this.initQuantity();
        this.initSizeColorChange();
        this.updateColors(this.selectedSize);
        this.updateGallery(this.selectedSize, this.selectedColorId);
        this.addToCartListener();
    },

    initQuantity: function() {
        let productQty = 1;
        $('#product-qty').val(productQty);

        $('.qty-plus').on('click', () => {
            productQty++;
            $('#product-qty').val(productQty);
        });
        $('.qty-minus').on('click', () => {
            if(productQty > 1) productQty--;
            $('#product-qty').val(productQty);
        });
    },

    initSizeColorChange: function() {
        const self = this;

        $('input[name="variant_size"]').on('change', function(){
            self.selectedSize = $(this).val();
            self.updateColors(self.selectedSize);
            self.updateGallery(self.selectedSize, self.selectedColorId);
        });

        $('input[name="variant_color"]').on('change', function(){
            if($(this).prop('disabled')) return;
            self.selectedColorId = parseInt($(this).val());
            self.updateGallery(self.selectedSize, self.selectedColorId);
        });
    },

    updateColors: function(size){
        if(this.variantsData.length === 0) return;

        const availableColors = this.variantsData
            .filter(v => v.size === size)
            .map(v => v.color_id);

        $('input[name="variant_color"]').each(function(){
            const colorId = parseInt($(this).val());
            if(availableColors.includes(colorId)){
                $(this).prop('disabled', false).closest('.selectgroup-item').css('opacity',1);
            } else {
                $(this).prop('disabled', true).closest('.selectgroup-item').css('opacity',0.3);
            }
        });

        const firstColor = availableColors[0];
        this.selectedColorId = firstColor;
        $('input[name="variant_color"][value="'+firstColor+'"]').prop('checked', true);
    },

    updateGallery: function(size, colorId){
        let variant = null;
        if(this.variantsData.length > 0){
            variant = this.variantsData.find(v => v.size === size && v.color_id === colorId)
                   || this.variantsData.find(v => v.size === size);
            if(!variant) return;
        } else {
            variant = {
                gallery: [$('.add-to-bag').data('image')],
                image: $('.add-to-bag').data('image')
            };
        }

        const galleryMain = $('.gallery-main');
        const galleryThumbs = $('.gallery-thumbs');

        if(galleryMain.hasClass('slick-initialized')) galleryMain.slick('unslick');
        if(galleryThumbs.hasClass('slick-initialized')) galleryThumbs.slick('unslick');

        galleryMain.empty();
        galleryThumbs.empty();

        variant.gallery.forEach(img => {
            galleryMain.append(`<div class="main-slide"><img src="${this.appUrl}/public/${img}" alt="Product"></div>`);
            galleryThumbs.append(`<div class="thumb-slide"><img src="${this.appUrl}/public/${img}" alt="Thumb"></div>`);
        });

        galleryThumbs.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.gallery-main',
            focusOnSelect: true,
            vertical: true,
            verticalSwiping: false,
            swipe: false,
            arrows: true,
            infinite: false
        });

        galleryMain.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.gallery-thumbs',
            arrows: true,
            fade: true,
            infinite: false
        });

        galleryMain.slick('slickGoTo', 0, true);
        galleryThumbs.slick('slickGoTo', 0, true);
    },

    addToCartListener: function() {
        const self = this;
        $('.product-page-cart').on('click', function(e){
            e.preventDefault();

            const productId = $(this).data('id');
            const quantity = parseInt($('#product-qty').val()) || 1;
            let variantId = null;
            let size = null;
            let colorId = null;

            if(self.variantsData.length > 0){
                size = self.selectedSize;
                colorId = self.selectedColorId;

                const variant = self.variantsData.find(v => v.size === size && v.color_id === colorId)
                             || self.variantsData.find(v => v.size === size);

                if(!variant){
                    alert('Please select a valid variant.');
                    return;
                }
                variantId = variant.id;
            }

            fetch(`{{ url('/cart/add') }}/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    quantity: quantity,
                    variant_id: variantId,
                    size: size,
                    color_id: colorId
                })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success){
                    $('.cd-button-cart-count').text(data.cart_count);
                    // ✅ call the old function
                    renderCartDrawer(data.cart);
                    $('.popup-overlay').addClass('active');
                } else {
                    alert('Something went wrong: ' + (data.message || ''));
                }
            })
            .catch(err => console.error(err));
        });
    }
};

$(document).ready(() => ProductPage.init());
</script>




