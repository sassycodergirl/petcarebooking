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

    <!-- cd-popup -->
    <!-- <div class="popup-overlay">
        <div class="popup-box">
            <div class="popup-header">
                <h3>Choose options</h3>
                <button type="button" class="popup-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="popup-content">
                <div class="product-info">
                    <a href="#" class="product-img-pop">
                        <img src="{{asset('images/pd1.png')}}" alt="Dry Food">
                    </a>
                    <div class="product-details-pop">
                        <h4>Dry Food For Adult Cat</h4>
                        <p><del>₹180</del> <strong>₹120</strong></p>
                        <span>Select Pack Size</span>
                        <div class="pack-size-group">
                            <input type="radio" id="size-100" name="pack-size" value="100g" checked>
                            <label for="size-100">100g</label>
                            <input type="radio" id="size-250" name="pack-size" value="250g">
                            <label for="size-250">250g</label>
                            <input type="radio" id="size-500" name="pack-size" value="500g">
                            <label for="size-500">500g</label>
                            <input type="radio" id="size-1kg" name="pack-size" value="1kg">
                            <label for="size-1kg">1kg</label>
                        </div>
                    </div>
                </div>
                <div class="pd-accod-wrap">
                    <div class="pd-accod">
                        <button class="pd-accod-btn">Product Description</button>
                        <div class="pd-accod-cont">
                            <p>Give your adult cat the balanced diet they need with our premium dry food, specially formulated to support overall health, energy, and coat shine...more</p>
                        </div>
                    </div>
                    <div class="pd-accod">
                        <button class="pd-accod-btn">Ingredients</button>
                        <div class="pd-accod-cont">
                            <div class="pd-accod-cont-indg">
                                <span>Mutton</span><span>Mutton Organs</span><span>Pumpkin</span>
                        <span>Carrot</span><span>Sweet Potato</span><span>Turmeric</span>
                        <span>Egg Shells Powder</span><span>Bone Broth</span><span>Green Peas</span>
                        <span>Coconut Oil</span><span>Chicken Bone</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-section">
                    <h5>Available Offers</h5>
                    <ul>
                        <li>Flat 10% OFF on orders above ₹995</li>
                        <li>FREE GIFT on orders above ₹995</li>
                    </ul>
                </div>
                <div class="pd-add-to-cart">
                    <div class="pd-add-to-cart-wrap">
                        <button class="qty-minus"><i class="fa-solid fa-minus"></i></button>
                        <input type="text" value="1" class="qty" />
                        <button class="qty-plus"><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <a href="#" class="add-to-bag-sm"><span><img src="{{asset('images/bag-icon.svg')}}" alt=""></span>Checkout</a>
                </div>
            </div>
        </div>
    </div>   -->


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
            <p class="m-0">Total: <strong>₹<span class="cart-total">0</span></strong></p>
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
// Function to render cart drawer
function renderCartDrawer(cartItems) {
    const container = document.querySelector('.popup-overlay .popup-content');
    container.innerHTML = ''; // clear old items

    cartItems = Array.isArray(cartItems) ? cartItems : [];

    if(cartItems.length === 0){
        container.innerHTML = '<p class="text-center">Your cart is empty.</p>';
        return;
    }

    cartItems.forEach(item => {
        const html = `
            <div class="product-info" data-id="${item.id}">
                <a href="#" class="product-img-pop">
                    <img src="${item.image}" alt="${item.name}">
                </a>
                <div class="product-details-pop">
                    <h4>${item.name}</h4>
                    <p><strong>₹${item.price}</strong></p>
                    <div class="pd-add-to-cart-wrap">
                        <button class="qty-minus" data-id="${item.id}"><i class="fa-solid fa-minus"></i></button>
                        <input type="text" value="${item.quantity}" class="qty" data-id="${item.id}" readonly />
                        <button class="qty-plus" data-id="${item.id}"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    });

    // Quantity buttons inside drawer
    container.querySelectorAll('.qty-minus').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            updateCartItem(id, -1);
        });
    });

    container.querySelectorAll('.qty-plus').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            updateCartItem(id, 1);
        });
    });
}

// Function to update quantity in cart
function updateCartItem(productId, change) {
    const input = document.querySelector(`.qty[data-id="${productId}"]`);
    let newQty = parseInt(input.value) + change;
    if(newQty < 1) newQty = 1;

    fetch(`{{ url('/cart/update') }}/${productId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ quantity: newQty })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            input.value = newQty;
            document.querySelector('.cd-button-cart-count').innerText = data.cart_count;
            renderCartDrawer(data.cart); // refresh drawer items
        } else {
            alert('Could not update cart');
        }
    })
    .catch(err => console.error(err));
}

// Add to cart button click
document.querySelectorAll('.add-to-bag.cd-button').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const productId = this.dataset.id;
        const quantity = 1;

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
            } else {
                alert('Something went wrong');
            }
        })
        .catch(err => console.error(err));
    });
});

// Cart icon click to view drawer
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

// Close popup drawer
document.querySelector('.popup-close').addEventListener('click', function(){
    document.querySelector('.popup-overlay').classList.remove('active');
});
</script> -->

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

        const html = `
            <div class="product-info">
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
                    <div class="remove-icon">
                            <button class="remove-item" data-id="${item.id}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M9.774 5L3.758 3.94l.174-.986a.5.5 0 0 1 .58-.405L18.411 5h.088h-.087l1.855.327a.5.5 0 0 1 .406.58l-.174.984l-2.09-.368l-.8 13.594A2 2 0 0 1 15.615 22H8.386a2 2 0 0 1-1.997-1.883L5.59 6.5h12.69zH5.5zM9 9l.5 9H11l-.4-9zm4.5 0l-.5 9h1.5l.5-9zm-2.646-7.871l3.94.694a.5.5 0 0 1 .405.58l-.174.984l-4.924-.868l.174-.985a.5.5 0 0 1 .58-.405z"/></svg></button>
                    </div>
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
        const quantity = 1;

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
document.addEventListener('click', function(e){
    const target = e.target;

    if(target.classList.contains('qty-plus') || target.classList.contains('qty-minus') || target.classList.contains('remove-item')){
        const id = target.dataset.id;
        let action = 'update';
        let qtyChange = 0;

        if(target.classList.contains('qty-plus')) qtyChange = 1;
        if(target.classList.contains('qty-minus')) qtyChange = -1;
        if(target.classList.contains('remove-item')) action = 'remove';

        const url = action === 'remove' ? `{{ url('/cart/remove') }}/${id}` : `{{ url('/cart/update') }}/${id}`;

        fetch(url, {
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
});

// Close popup
document.querySelector('.popup-close').addEventListener('click', function(){
    document.querySelector('.popup-overlay').classList.remove('active');
});

</script>

</body>

</html>