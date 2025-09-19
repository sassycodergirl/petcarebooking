
    
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






<div class="popup-overlay" style="display:none;">
    <div class="popup-box">
        <div class="popup-header">
            <h3>Your Cart</h3>
            <button type="button" class="popup-close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="popup-content cart-items">
            <!-- Cart items will be injected dynamically -->
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




<!-- <script>
document.addEventListener('DOMContentLoaded', function () {
    const cartOverlay = document.querySelector('.popup-overlay');
    const cartItemsContainer = document.querySelector('.cart-items');
    const cartTotalEl = document.querySelector('.cart-total');
    const cartCountEl = document.querySelector('.cd-button-cart-count');
    const headerCartBtn = document.querySelector('.cd-button.cart-btn');
    const popupCloseBtn = document.querySelector('.popup-close');
    const addToBagButtons = document.querySelectorAll('.add-to-bag');

    if (!cartOverlay) return;

    // Close drawer
    const closeCart = () => {
        cartOverlay.classList.remove('active');
        setTimeout(() => cartOverlay.style.display = 'none', 300);
    };
    popupCloseBtn?.addEventListener('click', closeCart);
    cartOverlay.addEventListener('click', e => {
        if (e.target === cartOverlay) closeCart();
    });

    // Render cart items
    // function renderCartItems(cart, totalPrice) {
    //     cartItemsContainer.innerHTML = '';

    //     cart.forEach(item => {
    //         const key = item.variant_id ? item.id + '-' + item.variant_id : item.id;

    //         let variantInfo = '';
    //         if (item.size || item.color_name) {
    //             let colorSpan = '';
    //             if (item.color_hex) {
    //                 colorSpan = `<span style="background-color:${item.color_hex};display:inline-block;width:15px;height:15px;border-radius:50%;margin-left:5px;"></span>`;
    //             }
    //             variantInfo = `<p class="variant-info">` +
    //                 (item.size ? `Size: ${item.size}` : '') +
    //                 (item.size && item.color_name ? ' | ' : '') +
    //                 (item.color_name ? `Color: ${colorSpan}` : '') +
    //                 `</p>`;
    //         }

    //         const html = `
    //         <div class="product-infos mb-4" data-key="${key}">
    //             <div class="product-info w-100 mb-0 d-flex">
    //                 <a href="#" class="product-img-pop me-3">
    //                     <img src="${item.image}" alt="${item.name}" width="60">
    //                 </a>
    //                 <div class="product-details-pop flex-grow-1">
    //                     <h4>${item.name}</h4>
    //                     ${variantInfo}
    //                     <p><strong>₹${item.price}</strong></p>
    //                     <div class="pd-add-to-cart-wrap d-flex align-items-center">
    //                         <button class="qty-minus" data-key="${key}">-</button>
    //                         <input type="text" value="${item.qty}" class="qty mx-2" data-key="${key}" readonly>
    //                         <button class="qty-plus" data-key="${key}">+</button>
    //                     </div>
    //                 </div>
    //                 <div class="remove-icon ms-3">
    //                     <button class="remove-item" data-key="${key}">×</button>
    //                 </div>
    //             </div>
    //         </div>`;
    //         cartItemsContainer.insertAdjacentHTML('beforeend', html);
    //     });

    //     cartTotalEl.textContent = totalPrice.toFixed(2);
    //     attachCartItemEvents();
    // }

    function renderCartItems(cart, totalPrice) {
        cartItemsContainer.innerHTML = '';

        Object.entries(cart).forEach(([key, item]) => {
            let variantInfo = '';
            if (item.size || item.color_name) {
                let colorSpan = '';
                if (item.color_hex) {
                    colorSpan = `<span style="background-color:${item.color_hex};display:inline-block;width:15px;height:15px;border-radius:50%;margin-left:5px;"></span>`;
                }
                variantInfo = `<p class="variant-info">` +
                    (item.size ? `Size: ${item.size}` : '') +
                    (item.size && item.color_name ? ' | ' : '') +
                    (item.color_name ? `Color: ${colorSpan}` : '') +
                    `</p>`;
            }

            const html = `
            <div class="product-infos mb-4" data-key="${key}">
                <div class="product-info w-100 mb-0 d-flex">
                    <a href="#" class="product-img-pop me-3">
                        <img src="${item.image}" alt="${item.name}" width="60">
                    </a>
                    <div class="product-details-pop flex-grow-1">
                        <h4>${item.name}</h4>
                        ${variantInfo}
                        <p><strong>₹${item.price}</strong></p>
                        <div class="pd-add-to-cart-wrap d-flex align-items-center">
                            <button class="qty-minus" data-key="${key}">-</button>
                            <input type="text" value="${item.qty}" class="qty mx-2" data-key="${key}" readonly>
                            <button class="qty-plus" data-key="${key}">+</button>
                        </div>
                    </div>
                    <div class="remove-icon ms-3">
                        <button class="remove-item" data-key="${key}">×</button>
                    </div>
                </div>
            </div>`;

            cartItemsContainer.insertAdjacentHTML('beforeend', html);
        });

        cartTotalEl.textContent = totalPrice.toFixed(2);
        attachCartItemEvents();
    }


    // Attach quantity and remove buttons
    function attachCartItemEvents() {
        cartItemsContainer.querySelectorAll('.qty-plus').forEach(btn => {
            btn.onclick = () => updateQty(btn.dataset.key, 1);
        });
        cartItemsContainer.querySelectorAll('.qty-minus').forEach(btn => {
            btn.onclick = () => updateQty(btn.dataset.key, -1);
        });
        cartItemsContainer.querySelectorAll('.remove-item').forEach(btn => {
            btn.onclick = () => removeCartItem(btn.dataset.key);
        });
    }

    function updateQty(key, change) {
        const input = cartItemsContainer.querySelector(`.qty[data-key="${key}"]`);
        if (!input) return;

        let qty = parseInt(input.value) + change;
        if (qty < 1) qty = 1;

        fetch(`{{ url('/cart/update') }}/${key}`, {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ qty })
        })
        .then(res => res.json())
        .then(data => {
            cartCountEl.textContent = data.itemCount;
            renderCartItems(data.cart, data.totalPrice);
        });
    }

    function removeCartItem(key) {
        fetch(`{{ url('/cart/remove') }}/${key}`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        })
        .then(res => res.json())
        .then(data => {
            cartCountEl.textContent = data.itemCount;
            renderCartItems(data.cart, data.totalPrice);
        });
    }

    // Add to cart
    addToBagButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const productId = this.dataset.id;
            const quantity = parseInt(document.querySelector('#product-qty')?.value) || 1;
            const variantId = this.dataset.variantId || null;
            const size = this.dataset.size || null;
            const colorId = this.dataset.colorId || null;
            const colorName = this.dataset.colorName || null;
            const colorHex = this.dataset.colorHex || null;
            const image = this.dataset.image;

            fetch(`{{ url('/cart/add') }}/${productId}`, {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    quantity,
                    variant_id: variantId,
                    size,
                    color_id: colorId,
                    color_name: colorName,
                    color_hex: colorHex,
                    image
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    cartCountEl.textContent = data.itemCount;
                    renderCartItems(Object.values(data.cart), data.totalPrice); // make sure data is array
                    cartOverlay.style.display = 'block';
                    setTimeout(() => cartOverlay.classList.add('active'), 10);
                }
            }).catch(err => console.error(err));
        });
    });

    // Header cart click
    headerCartBtn?.addEventListener('click', e => {
        e.preventDefault();
        fetch(`{{ url('/cart/items') }}`)
        .then(res => res.json())
        .then(data => {
            cartCountEl.textContent = Object.values(data.cart).reduce((sum, i) => sum + i.qty, 0);
            renderCartItems(data.cart, data.totalPrice);
            cartOverlay.style.display = 'block';
            setTimeout(() => cartOverlay.classList.add('active'), 10);
        });
    });

    // Initialize cart count
    fetch(`{{ url('/cart/items') }}`)
    .then(res => res.json())
    .then(data => {
        cartCountEl.textContent = Object.values(data.cart).reduce((sum, i) => sum + i.qty, 0);
    });
});
</script> -->


<script>
document.addEventListener('DOMContentLoaded', function () {
    const cartOverlay = document.querySelector('.popup-overlay');
    const cartItemsContainer = document.querySelector('.cart-items');
    const cartTotalEl = document.querySelector('.cart-total');
    const cartCountEl = document.querySelector('.cd-button-cart-count');
    const headerCartBtn = document.querySelector('.cd-button.cart-btn');
    const popupCloseBtn = document.querySelector('.popup-close');
    const addToBagButtons = document.querySelectorAll('.add-to-bag');

    if (!cartOverlay) return;

    // Close drawer
    popupCloseBtn?.addEventListener('click', () => {
        cartOverlay.classList.remove('active');
        setTimeout(() => cartOverlay.style.display = 'none', 300);
    });
    cartOverlay.addEventListener('click', e => {
        if (e.target === cartOverlay) {
            cartOverlay.classList.remove('active');
            setTimeout(() => cartOverlay.style.display = 'none', 300);
        }
    });

    // Render cart items
    function renderCartItems(cart, totalPrice) {
        cartItemsContainer.innerHTML = '';

        if (!Array.isArray(cart)) cart = Object.values(cart);

        cart.forEach(item => {
            let variantInfo = '';
            if (item.size || item.color_name) {
                let colorSpan = '';
                if (item.color_hex) {
                    colorSpan = `<span style="background-color:${item.color_hex};display:inline-block;width:15px;height:15px;border-radius:50%;margin-left:5px;"></span>`;
                }
                variantInfo = `<p class="variant-info">` +
                    (item.size ? `Size: ${item.size}` : '') +
                    (item.size && item.color_name ? ' | ' : '') +
                    (item.color_name ? `Color: ${colorSpan}` : '') +
                    `</p>`;
            }

            const html = `
            <div class="product-infos mb-4" data-key="${item.key}">
                <div class="product-info w-100 mb-0 d-flex">
                    <a href="#" class="product-img-pop me-3">
                        <img src="${item.image}" alt="${item.name}" width="60">
                    </a>
                    <div class="product-details-pop flex-grow-1">
                        <h4>${item.name}</h4>
                        ${variantInfo}
                        <p><strong>₹${item.price}</strong></p>
                        <div class="pd-add-to-cart-wrap d-flex align-items-center">
                            <button class="qty-minus" data-key="${item.key}">-</button>
                            <input type="text" value="${item.qty}" class="qty mx-2" data-key="${item.key}" readonly>
                            <button class="qty-plus" data-key="${item.key}">+</button>
                        </div>
                    </div>
                    <div class="remove-icon ms-3">
                        <button class="remove-item" data-key="${item.key}">×</button>
                    </div>
                </div>
            </div>`;
            cartItemsContainer.insertAdjacentHTML('beforeend', html);
        });

        cartTotalEl.textContent = totalPrice.toFixed(2);
        attachCartItemEvents();
    }

    // Attach events
    function attachCartItemEvents() {
        cartItemsContainer.querySelectorAll('.qty-plus').forEach(btn => btn.onclick = () => updateQty(btn.dataset.key, 1));
        cartItemsContainer.querySelectorAll('.qty-minus').forEach(btn => btn.onclick = () => updateQty(btn.dataset.key, -1));
        cartItemsContainer.querySelectorAll('.remove-item').forEach(btn => btn.onclick = () => removeCartItem(btn.dataset.key));
    }

    function updateQty(key, change) {
        const input = cartItemsContainer.querySelector(`.qty[data-key="${key}"]`);
        if (!input) return;

        let qty = parseInt(input.value) + change;
        if (qty < 1) qty = 1;

        fetch(`{{ url('/cart/update') }}/${key}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json','X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ qty })
        }).then(res => res.json())
          .then(data => {
              cartCountEl.textContent = data.itemCount;
              renderCartItems(data.cart, data.totalPrice);
          });
    }

    function removeCartItem(key) {
        fetch(`{{ url('/cart/remove') }}/${key}`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        }).then(res => res.json())
          .then(data => {
              cartCountEl.textContent = data.itemCount;
              renderCartItems(data.cart, data.totalPrice);
          });
    }

    // Add to cart
    addToBagButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const productId = this.dataset.id;
            const quantity = parseInt(document.querySelector('#product-qty')?.value) || 1;
            const variantId = this.dataset.variantId || null;
            const size = this.dataset.size || null;
            const colorId = this.dataset.colorId || null;
            const colorName = this.dataset.colorName || null;
            const colorHex = this.dataset.colorHex || null;
            const image = this.dataset.image;

            fetch(`{{ url('/cart/add') }}/${productId}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json','X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({
                    quantity,
                    variant_id: variantId,
                    size,
                    color_id: colorId,
                    color_name: colorName,
                    color_hex: colorHex,
                    image
                })
            }).then(res => res.json())
              .then(data => {
                  if (data.success) {
                      cartCountEl.textContent = data.itemCount;
                      renderCartItems(data.cart, data.totalPrice);
                      cartOverlay.style.display = 'block';
                      setTimeout(() => cartOverlay.classList.add('active'), 10);
                  }
              }).catch(err => console.error(err));
        });
    });


    // Header cart click
    headerCartBtn?.addEventListener('click', e => {
        e.preventDefault();
        fetch(`{{ url('/cart/items') }}`)
        .then(res => res.json())
        .then(data => {
            cartCountEl.textContent = Object.values(data.cart).reduce((sum, i) => sum + i.qty, 0);
            renderCartItems(data.cart, data.totalPrice);
            cartOverlay.style.display = 'block';
            setTimeout(() => cartOverlay.classList.add('active'), 10);
        });
    });

    // Initialize cart count
    fetch(`{{ url('/cart/items') }}`)
    .then(res => res.json())
    .then(data => {
        cartCountEl.textContent = Object.values(data.cart).reduce((sum, i) => sum + i.qty, 0);
    });
});
</script>







<!--OTP Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4">
         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        <div class="row">
          <div class="col-md-7">
                    <div class="text-center">
                             <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" alt></a>
                     </div>
                     <div class="text-center mt-4">
                        <h3 class="text-white mb-1 login-head">Welcome to Furry & Friends </h3>
                        <h4 class="text-white login-subhead">Register to avail the best deals!</h4>
                     </div>
                     <div class="row d-none d-md-flex d-lg-flex mt-4">
                        <div class="col-md-4">
                            <div class="usp-card">
                                <div class="icon-div">
                                    <img class="img-fluid" src="{{asset('images/petcare.png')}}" alt="Trusted Daycare & Boarding">
                                </div>
                                <div class="usp-para">
                                    <h4 class="usp-heading">Trusted Daycare & Boarding</h4>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="usp-card">
                                <div class="icon-div">
                                    <img class="img-fluid" src="{{asset('images/booking.png')}}" alt="Trusted Daycare & Boarding">
                                </div>
                                <div class="usp-para">
                                    <h4 class="usp-heading">Easy Online Booking</h4>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="usp-card">
                                <div class="icon-div">
                                    <img class="img-fluid" src="{{asset('images/pet-event.png')}}" alt="Trusted Daycare & Boarding">
                                </div>
                                <div class="usp-para">
                                    <h4 class="usp-heading">Pet Community & Events</h4>
                                   
                                </div>
                            </div>
                        </div>
                     </div>
              </div>
               <div class="col-md-5">
                <div class="login-signup-form bg-white p-4">
                    <h4 class="text-center mb-3">Login / Signup</h4>

                    <!-- Phone Input -->
                    <div id="phoneSection" class="text-center">
                      <label class="form-label">Enter Mobile Number</label>
                      <!-- <input type="text" id="phone" class="form-control mb-3" placeholder="+9198XXXXXXXX"> -->
                      <div class="input-group mb-3">
                        <span class="input-group-text">
                           <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 36 36"><path fill="#138808" d="M0 27a4 4 0 0 0 4 4h28a4 4 0 0 0 4-4v-5H0z"/><path fill="#f93" d="M36 14V9a4 4 0 0 0-4-4H4a4 4 0 0 0-4 4v5z"/><path fill="#f7f7f7" d="M0 13.667h36v8.667H0z"/><circle cx="18" cy="18" r="4" fill="#000080"/><circle cx="18" cy="18" r="3.375" fill="#f7f7f7"/><path fill="#6666b3" d="m18.1 16.75l-.1.65l-.1-.65l.1-1.95zm-.928-1.841l.408 1.909l.265.602l-.072-.653zm-.772.32l.888 1.738l.412.513l-.238-.613zm-.663.508l1.308 1.45l.531.389l-.389-.531zm-.508.663l1.638 1.062l.613.238l-.513-.412zm-.32.772l1.858.601l.653.072l-.602-.265zM14.8 18l1.95.1l.65-.1l-.65-.1zm.109.828l1.909-.408l.602-.265l-.653.072zm.32.772l1.738-.888l.513-.412l-.613.238zm.508.663l1.45-1.308l.389-.531l-.531.389zm.663.508l1.062-1.638l.238-.613l-.412.513zm.772.32l.601-1.858l.072-.653l-.265.602zM18 21.2l.1-1.95l-.1-.65l-.1.65zm.828-.109l-.408-1.909l-.265-.602l.072.653zm.772-.32l-.888-1.738l-.412-.513l.238.613zm.663-.508l-1.308-1.45l-.531-.389l.389.531zm.508-.663l-1.638-1.062l-.613-.238l.513.412zm.32-.772l-1.858-.601l-.653-.072l.602.265zM21.2 18l-1.95-.1l-.65.1l.65.1zm-.109-.828l-1.909.408l-.602.265l.653-.072zm-.32-.772l-1.738.888l-.513.412l.613-.238zm-.508-.663l-1.45 1.308l-.389.531l.531-.389zm-.663-.508l-1.062 1.638l-.238.613l.412-.513zm-.772-.32l-.601 1.858l-.072.653l.265-.602z"/><g fill="#000080"><circle cx="17.56" cy="14.659" r=".2"/><circle cx="16.71" cy="14.887" r=".2"/><circle cx="15.948" cy="15.326" r=".2"/><circle cx="15.326" cy="15.948" r=".2"/><circle cx="14.887" cy="16.71" r=".2"/><circle cx="14.659" cy="17.56" r=".2"/><circle cx="14.659" cy="18.44" r=".2"/><circle cx="14.887" cy="19.29" r=".2"/><circle cx="15.326" cy="20.052" r=".2"/><circle cx="15.948" cy="20.674" r=".2"/><circle cx="16.71" cy="21.113" r=".2"/><circle cx="17.56" cy="21.341" r=".2"/><circle cx="18.44" cy="21.341" r=".2"/><circle cx="19.29" cy="21.113" r=".2"/><circle cx="20.052" cy="20.674" r=".2"/><circle cx="20.674" cy="20.052" r=".2"/><circle cx="21.113" cy="19.29" r=".2"/><circle cx="21.341" cy="18.44" r=".2"/><circle cx="21.341" cy="17.56" r=".2"/><circle cx="21.113" cy="16.71" r=".2"/><circle cx="20.674" cy="15.948" r=".2"/><circle cx="20.052" cy="15.326" r=".2"/><circle cx="19.29" cy="14.887" r=".2"/><circle cx="18.44" cy="14.659" r=".2"/><circle cx="18" cy="18" r=".9"/></g></svg> +91
                        </span>
                        <input type="text" id="phone" class="form-control" placeholder="Enter phone number" maxlength="10">
                    </div>

                      <button id="sendOtpBtn" class="btn btn-primary w-100">Send OTP</button>
                    </div>

                    <!-- OTP Input (hidden initially) -->
                    <div id="otpSection" class="d-none">
                      <label class="form-label">Enter OTP</label>
                      <input type="text" id="otp" class="form-control mb-3" placeholder="Enter OTP">
                      <button id="verifyOtpBtn" class="btn btn-success w-100">Verify & Login</button>
                    </div>

                    <div id="loginError" class="text-success text-center my-3"></div>
                     <div class="text-center terms-para mt-5">
                            <p>I accept that I have read & understood Furry & Friends <a href="#">Privacy Policy</a> and <a href="#">T&Cs.</a></p>
                            <a href="{{ route('login') }}">Other Ways to Login</a>
                     </div>
                  </div>
              </div>
        </div>
    </div>
  </div>
</div>
<!--OTP Modal -->


<!--otp based login/register-->


<script>
    document.addEventListener("DOMContentLoaded", function () {
    const sendOtpBtn = document.getElementById("sendOtpBtn");
    const verifyOtpBtn = document.getElementById("verifyOtpBtn");
    const phoneInput = document.getElementById("phone");
    const otpInput = document.getElementById("otp");
    const phoneSection = document.getElementById("phoneSection");
    const otpSection = document.getElementById("otpSection");
    const errorBox = document.getElementById("loginError");

    // Send OTP
    sendOtpBtn.addEventListener("click", function () {
        const fullPhone = "+91" + phoneInput.value.trim();

        fetch("{{ route('phone.login.send') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ phone: fullPhone })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                errorBox.innerText = data.message;
                phoneSection.classList.add("d-none");
                otpSection.classList.remove("d-none");
            } else {
                errorBox.innerText = data.message;
            }
        });
    });

    // Verify OTP
    verifyOtpBtn.addEventListener("click", function () {
        const fullPhone = "+91" + phoneInput.value.trim();

        fetch("{{ route('phone.login.verify') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ phone: fullPhone, otp: otpInput.value })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                errorBox.innerText = "✅ " + data.message;
                setTimeout(() => {
                    let modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                    modal.hide();
                    location.reload();
                }, 1000);
            } else {
                errorBox.innerText = data.message;
            }
        });
    });
});

</script>

<!--otp based login/register-->

</body>

</html>