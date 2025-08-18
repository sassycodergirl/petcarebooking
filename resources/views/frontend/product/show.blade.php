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
$(document).ready(function(){

    const appUrl = "{{ url('') }}"; // Base URL

    // --- Variant data passed from backend ---
    const variantsData = @json($variantsData);
    let selectedSize = variantsData[0]?.size || null;
    let selectedColorId = variantsData.find(v => v.size === selectedSize)?.color_id || null;

    console.log('Initial variantsData:', variantsData);
    console.log('Initial selectedSize:', selectedSize, 'selectedColorId:', selectedColorId);

    // --- Quantity controls ---
    let productQty = 1;
    $('#product-qty').val(productQty);

    $('.qty-plus').on('click', () => {
        productQty++;
        $('#product-qty').val(productQty);
        console.log('Quantity increased:', productQty);
    });

    $('.qty-minus').on('click', () => {
        if(productQty > 1) productQty--;
        $('#product-qty').val(productQty);
        console.log('Quantity decreased:', productQty);
    });

    // --- Update color options based on size ---
    function updateColors(size){
        if(variantsData.length === 0) return;

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
        console.log('Updated colors for size', size, 'selectedColorId:', selectedColorId);
    }

    // --- Update gallery based on variant ---
    function updateGallery(size, colorId){
        let variant = null;

        if(variantsData.length > 0){
            variant = variantsData.find(v => v.size === size && v.color_id === colorId)
                   || variantsData.find(v => v.size === size);
            
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
            galleryMain.append(`<div class="main-slide"><img src="${appUrl}/public/${img}" alt="Product"></div>`);
            galleryThumbs.append(`<div class="thumb-slide"><img src="${appUrl}/public/${img}" alt="Thumb"></div>`);
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

        console.log('Gallery updated for size:', size, 'colorId:', colorId);
    }

    // --- Initialize variant options ---
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

    // --- Product page dedicated render function ---
//     function renderCartDrawerProductPage(cartItems) {
//     const container = document.querySelector('.popup-overlay .cart-items');
//     const totalEl = document.querySelector('.cart-total');
//     container.innerHTML = '';

//     if (!cartItems || cartItems.length === 0) {
//         container.innerHTML = '<p class="text-center">Your cart is empty.</p>';
//         totalEl.innerText = '0';
//         console.log('Cart is empty');
//         return;
//     }

//     let total = 0;

//     cartItems.forEach(item => {
//         total += item.price * item.quantity;

//         // Get variant info to show color swatch
//         let colorHtml = '';
//         if (item.color_id) {
//             const variant = variantsData.find(v => v.id === item.variant_id);
//             if (variant) {
//                 colorHtml = `<p>Color: 
//                     <span class="selectgroup-button" 
//                           style="background-color: ${variant.color_hex ?? '#ccc'}; 
//                                  display:inline-block; width:16px; height:16px; 
//                                  border-radius:50%; margin-left:5px;">
//                     </span>
//                 </p>`;
//             }
//         }
     
//         const sizeHtml = item.size ? `<p>Size: ${item.size}</p>` : '';

//         const html = `
//         99999999999999999999999999999
//             <div class="product-infos mb-4">
//                 <div class="product-info mb-0">
//                     <a href="#" class="product-img-pop">
//                         <img src="${item.image}" alt="${item.name}">
//                     </a>
//                     <div class="product-details-pop">
//                         <h4>${item.name}</h4>
//                         <div class="variant-data d-flex">
//                          ${sizeHtml}
//                         ${colorHtml}
//                         </div>
                       
//                         <p><strong>₹${item.price}</strong></p>
//                         <div class="pd-add-to-cart-wrap">
//                             <button class="qty-minus" data-id="${item.id}">-</button>
//                             <input type="text" value="${item.quantity}" class="qty" data-id="${item.id}" readonly />
//                             <button class="qty-plus" data-id="${item.id}">+</button>
//                         </div>
//                     </div>
//                 </div>
//                 <div class="remove-icon">
//                     <button class="remove-item" data-id="${item.id}">
//                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
//                             <path fill="currentColor" fill-rule="evenodd" d="M9.774 5L3.758 3.94l.174-.986a.5.5 0 0 1 .58-.405L18.411 5h.088h-.087l1.855.327a.5.5 0 0 1 .406.58l-.174.984l-2.09-.368l-.8 13.594A2 2 0 0 1 15.615 22H8.386a2 2 0 0 1-1.997-1.883L5.59 6.5h12.69zH5.5zM9 9l.5 9H11l-.4-9zm4.5 0l-.5 9h1.5l.5-9zm-2.646-7.871l3.94.694a.5.5 0 0 1 .405.58l-.174.984l-4.924-.868l.174-.985a.5.5 0 0 1 .58-.405z"/>
//                         </svg>
//                     </button>
//                 </div>
//             </div>
//         `;

//         container.insertAdjacentHTML('beforeend', html);
//     });

//     totalEl.innerText = total.toFixed(2);
//     console.log('Cart drawer updated:', cartItems);
// }


    // --- Product page add to cart click ---
    $('.product-page-cart').on('click', function(e){
        e.preventDefault();

        const productId = $(this).data('id');
        const quantity = parseInt($('#product-qty').val()) || 1;
        let variantId = null;
        let size = null;
        let colorId = null;

        if(variantsData.length > 0){
            size = selectedSize;
            colorId = selectedColorId;

            const variant = variantsData.find(v => v.size === size && v.color_id === colorId)
                         || variantsData.find(v => v.size === size);
            const colorHex = variant?.color_hex ?? '#ccc';

            if(!variant){
                alert('Please select a valid variant.');
                console.log('Variant not found!');
                return;
            }
            variantId = variant.id;
        }

        console.log('Adding to cart:', {productId, quantity, variantId, size, colorId,colorHex});

        fetch(`{{ url('/cart/add') }}/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({quantity, variant_id: variantId, size, color_id: colorId,colorHex})
        })
        .then(res => res.json())
        .then(data => {
            console.log('Cart add response:', data);
            if(data.success){
                $('.cd-button-cart-count').text(data.cart_count);
                renderCartDrawer(data.cart, variantsData);
                $('.popup-overlay').addClass('active');
            } else {
                alert('Something went wrong: ' + (data.message || ''));
            }
        })
        .catch(err => console.error('Cart add error:', err));
    });

    // --- Quantity change & remove item ---
    $(document).on('click', '.qty-plus, .qty-minus', function(){
        const id = $(this).data('id');
        const qtyChange = $(this).hasClass('qty-plus') ? 1 : -1;
        console.log('Updating quantity:', {id, qtyChange});

        fetch(`${appUrl}/cart/update/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({quantity: qtyChange})
        })
        .then(res => res.json())
        .then(data => {
            console.log('Cart update response:', data);
            if(data.success){
                $('.cd-button-cart-count').text(data.cart_count);
                renderCartDrawerProductPage(data.cart);
            }
        });
    });

    $(document).on('click', '.remove-item', function(){
        const id = $(this).data('id');
        console.log('Removing item:', id);

        fetch(`${appUrl}/cart/remove/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => {
            console.log('Cart remove response:', data);
            if(data.success){
                $('.cd-button-cart-count').text(data.cart_count);
                renderCartDrawerProductPage(data.cart);
            }
        });
    });

    // --- Close popup ---
    $('.popup-close').on('click', function(){
        $('.popup-overlay').removeClass('active');
        console.log('Cart popup closed');
    });

});
</script>





