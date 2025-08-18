    <footer class="page-footer">
        <div class="container">
            <div class="footer-wrap">
                <div class="footer-top-wrap text-center">
                    <div class="footer-hd">Subscribe Our Newsletter</div>
                    <p>Join our pet-loving community for monthly updates, expert advice, and fun freebies!</p>
                    <div class="footer-form">
                        <input type="email" placeholder="Enter Your Email Address...">
                        <button type="submit" class="cmn-btn" data-content="Subscribe">Subscribe</button>
                    </div>
                </div>
                <div class="footer-btm">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-col-logo-wrap">
                                <a href="{{ route('index') }}" class="footer-col-logo-link">
                                    <img src="{{asset('images/logo.png')}}" alt="">
                                </a>
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-col footer-col-addtess">
                                <div class="footer-hd-sm">Contact us</div>
                                <ul>
                                    <li><span><i class="fa-solid fa-location-dot"></i></span> Villa 57, Al Thanya
                                        RoadUmm Suquiem 2United Arab Emirates</li>
                                    <li><span><i class="fa-solid fa-phone"></i></span> <a href="tel:001234567890">+00
                                            1234567890</a></li>
                                    <li><span><i class="fa-solid fa-envelope"></i></span> <a
                                            href="mailto:support@furryfriends@gmail.com">support@furryfriends@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-col footer-col-link footer-col-link-three">
                                <div class="footer-hd-sm">Quick Links</div>
                                <ul>
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li><a href="{{ route('login') }}">Login / Signup</a></li>
                                    <li><a href="{{ route('blog') }}">Blog</a></li>
                                    <li><a href="{{ route('contact') }}#faqs">FAQs</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="footer-col footer-col-link">
                                <div class="footer-hd-sm">Legal</div>
                                <ul>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copy-rgt">
                    <p>© <a href="/">Furry Friends & co</a> 2025 - all right and reserved.</p>
                </div>
            </div>
        </div>
        <img src="{{asset('images/prd-top-ov.png')}}" class="prd-top-ov" alt="">

        <img src="{{asset('images/footer-lft.png')}}" class="footer-lft" alt="">
        <img src="{{asset('images/footer-rgt.png')}}" class="footer-rgt" alt="">
    </footer>
    <button id="backToTopBtn" class="scroll-btn"><img src="{{asset('images/back-to-top.svg')}}" alt=""></button>

 


<div class="popup-overlay">
    <div class="popup-box">
        <div class="popup-header">
            <h3>Your Cart</h3>
            <button type="button" class="popup-close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="popup-content cart-items">
            <!-- Cart items will be injected here dynamically -->
        </div>
        <div class="popup-footer">
            <p class="m-0 total-price">₹<span class="cart-total">0</span></p>
            <a href="{{ route('checkout.index') }}" class="btn-checkout">Checkout</a>
        </div>
    </div>
</div>




   


    <!-- Jquery-->
    <script src="{{asset('js/jquery-min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/fancybox.umd.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>





<script>
    // Render cart drawer
    function renderCartDrawer(cartItems) {
        const container = document.querySelector('.popup-overlay .cart-items');
        const totalEl = document.querySelector('.cart-total');
        container.innerHTML = ''; // clear old items

        if(!cartItems || cartItems.length === 0){
            container.innerHTML = '<p class="text-center">Your cart is empty.</p>';
            totalEl.innerText = '0';
            return;
        }

        let total = 0;

        cartItems.forEach(item => {
            total += item.price * item.quantity;
            //  const productUrl = productUrlTemplate.replace(':slug', item.slug);

            const html = `
                <div class="product-infos mb-4">
                    <div class="product-info mb-0">
                        <a href="#" class="product-img-pop">
                            <img src="${item.image}" alt="${item.name}">
                        </a>
                        <div class="product-details-pop">
                            <h4>${item.name}</h4>
                            <p><strong>₹${item.price}</strong></p>
                            <div class="pd-add-to-cart-wrap">
                                <button class="qty-minus" data-id="${item.id}">-</button>
                                <input type="text" value="${item.quantity}" class="qty" data-id="${item.id}" readonly />
                                <button class="qty-plus" data-id="${item.id}">+</button>
                                
                            </div>
                        </div>
                    </div>
                    <div class="remove-icon">
                                <button class="remove-item" data-id="${item.id}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M9.774 5L3.758 3.94l.174-.986a.5.5 0 0 1 .58-.405L18.411 5h.088h-.087l1.855.327a.5.5 0 0 1 .406.58l-.174.984l-2.09-.368l-.8 13.594A2 2 0 0 1 15.615 22H8.386a2 2 0 0 1-1.997-1.883L5.59 6.5h12.69zH5.5zM9 9l.5 9H11l-.4-9zm4.5 0l-.5 9h1.5l.5-9zm-2.646-7.871l3.94.694a.5.5 0 0 1 .405.58l-.174.984l-4.924-.868l.174-.985a.5.5 0 0 1 .58-.405z"/></svg></button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        });

        totalEl.innerText = total.toFixed(2);
    }

    // Add to cart click
    document.querySelectorAll('.add-to-bag.cd-button').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.dataset.id;
            // const quantity = 1;
            const quantityEl = document.getElementById('product-qty');
            const quantity = quantityEl && parseInt(quantityEl.value) > 0 ? parseInt(quantityEl.value) : 1;

            fetch(`{{ url('/cart/add') }}/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ quantity })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    document.querySelector('.cd-button-cart-count').innerText = data.cart_count;
                    renderCartDrawer(data.cart);
                    document.querySelector('.popup-overlay').classList.add('active');
                } else alert('Something went wrong');
            })
            .catch(err => console.log(err));
        });
    });

    // Cart icon click
    document.querySelector('.cart-btn').addEventListener('click', function(e){
        e.preventDefault();

        fetch('{{ route("cart.items") }}')
        .then(res => res.json())
        .then(data => {
            if(data.success){
                document.querySelector('.cd-button-cart-count').innerText = data.cart_count;
                renderCartDrawer(data.cart);
                document.querySelector('.popup-overlay').classList.add('active');
            }
        })
        .catch(err => console.error(err));
    });

    // Drawer quantity change & remove
    // document.addEventListener('click', function(e){
    //     const target = e.target;

    //     if(target.classList.contains('qty-plus') || target.classList.contains('qty-minus') || target.classList.contains('remove-item')){
    //         const id = target.dataset.id;
    //         let action = 'update';
    //         let qtyChange = 0;

    //         if(target.classList.contains('qty-plus')) qtyChange = 1;
    //         if(target.classList.contains('qty-minus')) qtyChange = -1;
    //         if(target.classList.contains('remove-item')) action = 'remove';

    //         const url = action === 'remove' ? `{{ url('/cart/remove') }}/${id}` : `{{ url('/cart/update') }}/${id}`;

    //         fetch(url, {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             },
    //             body: JSON.stringify({ quantity: qtyChange })
    //         })
    //         .then(res => res.json())
    //         .then(data => {
    //             if(data.success){
    //                 document.querySelector('.cd-button-cart-count').innerText = data.cart_count;
    //                 renderCartDrawer(data.cart);
    //             }
    //         });
    //     }
    // });

    document.addEventListener('click', function(e){
    // Handle plus/minus buttons normally
    if(e.target.classList.contains('qty-plus') || e.target.classList.contains('qty-minus')){
        const id = e.target.dataset.id;
        const qtyChange = e.target.classList.contains('qty-plus') ? 1 : -1;

        fetch(`{{ url('/cart/update') }}/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ quantity: qtyChange })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                document.querySelector('.cd-button-cart-count').innerText = data.cart_count;
                renderCartDrawer(data.cart);
            }
        });
    }

    // Handle remove button using closest(), so clicks on SVG work
    const removeBtn = e.target.closest('.remove-item');
    if(removeBtn){
        const id = removeBtn.dataset.id;

        fetch(`{{ url('/cart/remove') }}/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                document.querySelector('.cd-button-cart-count').innerText = data.cart_count;
                renderCartDrawer(data.cart);
            }
        });
    }
});


    // Close popup
    document.querySelector('.popup-close').addEventListener('click', function(){
        document.querySelector('.popup-overlay').classList.remove('active');
    });

</script>




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
    const variantsData = @json($variantsData);
</script>

<script>
$(document).ready(function(){
    const appUrl = "{{ url('') }}"; // Base URL

    // Variant data passed from Blade
    const variantsData = @json($variantsData);

    // Default selections
    let selectedSize = variantsData[0]?.size || null;
    let selectedColorId = variantsData.find(v => v.size === selectedSize)?.color_id || null;

    // Initialize quantity
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

    // Function to update gallery
    function updateGallery(size, colorId){
        const variant = variantsData.find(v => v.size === size && v.color_id === colorId)
                     || variantsData.find(v => v.size === size);

        if(!variant) return;

        const galleryMain = $('.gallery-main');
        const galleryThumbs = $('.gallery-thumbs');

        // Destroy slick if initialized
        if(galleryMain.hasClass('slick-initialized')) galleryMain.slick('unslick');
        if(galleryThumbs.hasClass('slick-initialized')) galleryThumbs.slick('unslick');

        // Remove old slides
        galleryMain.children().remove();
        galleryThumbs.children().remove();

        // Append new slides
        variant.gallery.forEach(img => {
            galleryMain.append(`<div class="main-slide"><img src="${appUrl}/public/${img}" alt="Product"></div>`);
            galleryThumbs.append(`<div class="thumb-slide"><img src="${appUrl}/public/${img}" alt="Thumb"></div>`);
        });

        // Force browser reflow
        galleryMain[0].offsetHeight;
        galleryThumbs[0].offsetHeight;

        // Initialize Slick
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

        // Ensure first slide is active
        galleryMain.slick('slickGoTo', 0, true);
        galleryThumbs.slick('slickGoTo', 0, true);
    }

    // Update available colors based on selected size
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

        // Auto-select first available color
        const firstColor = availableColors[0];
        selectedColorId = firstColor;
        $('input[name="variant_color"][value="'+firstColor+'"]').prop('checked', true);
    }

    // Size change handler
    $('input[name="variant_size"]').on('change', function(){
        selectedSize = $(this).val();
        updateColors(selectedSize);
        updateGallery(selectedSize, selectedColorId);
    });

    // Color change handler
    $('input[name="variant_color"]').on('change', function(){
        if($(this).prop('disabled')) return;
        selectedColorId = parseInt($(this).val());
        updateGallery(selectedSize, selectedColorId);
    });

    // Initialize on page load
    updateColors(selectedSize);
    updateGallery(selectedSize, selectedColorId);
});
</script>

</body>

</html>