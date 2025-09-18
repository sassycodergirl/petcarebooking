
    
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
            <!-- <a href="{{ route('checkout.index') }}" class="btn-checkout">Checkout</a> -->
              @if(Auth::check())
                <a href="{{ route('checkout.index') }}" class="btn-checkout">Checkout</a>
            @else
                <a href="javascript:void(0)" 
                   class="btn-checkout" 
                   data-bs-toggle="modal" 
                   data-bs-target="#loginModal">
                   Checkout
                </a>
            @endif
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
    // function renderCartDrawer(cartItems,variantsData = []) {
    //     const container = document.querySelector('.popup-overlay .cart-items');
    //     const totalEl = document.querySelector('.cart-total');
    //     container.innerHTML = ''; // clear old items

    //     if(!cartItems || cartItems.length === 0){
    //         container.innerHTML = '<p class="text-center">Your cart is empty.</p>';
    //         totalEl.innerText = '0';
    //         return;
    //     }

    //     let total = 0;

    //     cartItems.forEach(item => {
    //         total += item.price * item.quantity;
    //         //  const productUrl = productUrlTemplate.replace(':slug', item.slug);

    //         // --- Size HTML ---
    //     const sizeHtml = item.size ? `<p>Size: ${item.size}</p>` : '';

    //     // --- Color HTML ---
    //     const colorHtml = item.color_hex ? `<p>Color: 
    //         <span class="color-swatch" style="background-color: ${item.color_hex};"></span>
    //     </p>` : '';

       

    //         const html = `
    //             <div class="product-infos mb-4">
    //                 <div class="product-info mb-0">
    //                     <a href="#" class="product-img-pop">
    //                         <img src="${item.image}" alt="${item.name}">
    //                     </a>
    //                     <div class="product-details-pop">
    //                         <h4>${item.name}</h4>
    //                         <div class="variant-data d-flex">
    //                             ${sizeHtml}
    //                             ${colorHtml}
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
    //                             <button class="remove-item" data-id="${item.id}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M9.774 5L3.758 3.94l.174-.986a.5.5 0 0 1 .58-.405L18.411 5h.088h-.087l1.855.327a.5.5 0 0 1 .406.58l-.174.984l-2.09-.368l-.8 13.594A2 2 0 0 1 15.615 22H8.386a2 2 0 0 1-1.997-1.883L5.59 6.5h12.69zH5.5zM9 9l.5 9H11l-.4-9zm4.5 0l-.5 9h1.5l.5-9zm-2.646-7.871l3.94.694a.5.5 0 0 1 .405.58l-.174.984l-4.924-.868l.174-.985a.5.5 0 0 1 .58-.405z"/></svg></button>
    //                 </div>
    //             </div>
    //         `;
    //         container.insertAdjacentHTML('beforeend', html);
    //         console.log('Cart drawer updated:', cartItems);
    //     });

    //     totalEl.innerText = total.toFixed(2);
    // }

// function renderCartDrawer(cartItems = [],variantsData = []) {
//     const container = document.querySelector('.popup-overlay .cart-items');
//     const totalEl = document.querySelector('.cart-total');
//     container.innerHTML = '';

//     if(!cartItems || cartItems.length === 0){
//         container.innerHTML = '<p class="text-center">Your cart is empty.</p>';
//         totalEl.innerText = '0';
//         return;
//     }

//     let total = 0;

//     cartItems.forEach(item => {
//         total += item.price * item.quantity;
//         const variantId = item.variant_id ?? '0';

//         const sizeHtml = item.size ? `<p>Size: ${item.size}</p>` : '';
//         const colorHtml = item.color_hex ? `
//             <p style="display:flex;align-items:center;">Color:
//                 <span style="display:inline-block;width:16px;height:16px;border-radius:50%;margin-left:5px;background-color:${item.color_hex};"></span>
//             </p>` : '';

//         const html = `
//             <div class="product-infos mb-4">
//                 <div class="product-info mb-0">
//                     <a href="#" class="product-img-pop">
//                         <img src="${item.image}" alt="${item.name}">
//                     </a>
//                     <div class="product-details-pop">
//                         <h4>${item.name}</h4>
//                         <div class="variant-data d-flex align-items-center">
//                             ${sizeHtml}${colorHtml}
//                         </div>
//                         <p><strong>₹${item.price}</strong></p>
//                         <div class="pd-add-to-cart-wrap">
//                             <button class="qty-minus" data-id="${item.id}" data-variant="${item.variant_id}">-</button>
//                             <input type="text" value="${item.quantity}" class="qty" data-id="${item.id}" data-variant="${item.variant_id}" readonly />
//                             <button class="qty-plus" data-id="${item.id}" data-variant="${item.variant_id}">+</button>
//                         </div>
//                     </div>
//                 </div>
//                 <div class="remove-icon">
//                     <button class="remove-item" data-id="${item.id}" data-variant="${item.variant_id}">
//                         Remove
//                     </button>
//                 </div>
//             </div>
//         `;
//         container.insertAdjacentHTML('beforeend', html);
//     });

//     totalEl.innerText = total.toFixed(2);
// }

       function renderCartDrawer(cartItems = [], variantsData = []) {
    const container = document.querySelector('.popup-overlay .cart-items');
    const totalEl = document.querySelector('.cart-total');
    container.innerHTML = '';

    if (!cartItems || cartItems.length === 0) {
        container.innerHTML = '<p class="text-center">Your cart is empty.</p>';
        totalEl.innerText = '0';
        return;
    }

    let total = 0;

    cartItems.forEach(item => {
        total += item.price * item.quantity;

        // Look up variant details from variantsData if item.variant_id exists
        let variant = variantsData.find(v => v.id == item.variant_id);
        let sizeHtml = '';
        let colorHtml = '';

        if (variant) {
            sizeHtml = variant.size ? `<p>Size: ${variant.size}</p>` : '';
            colorHtml = variant.color_hex ? `
                <p style="display:flex;align-items:center;">Color:
                    <span style="display:inline-block;width:16px;height:16px;border-radius:50%;margin-left:5px;background-color:${variant.color_hex};"></span>
                </p>` : '';
        }

        const variantId = item.variant_id ?? '0';

        const html = `
            <div class="product-infos mb-4">
                <div class="product-info mb-0">
                    <a href="#" class="product-img-pop">
                        <img src="${item.image}" alt="${item.name}">
                    </a>
                    <div class="product-details-pop">
                        <h4>${item.name}</h4>
                        <div class="variant-data d-flex align-items-center">
                            ${sizeHtml}${colorHtml}
                        </div>
                        <p><strong>₹${item.price}</strong></p>
                        <div class="pd-add-to-cart-wrap">
                            <button class="qty-minus" data-id="${item.id}" data-variant="${variantId}" data-size="${item.size}" data-color="${item.color_id}">-</button>
                            <input type="text" value="${item.quantity}" class="qty" data-id="${item.id}" data-variant="${variantId}" data-size="${item.size}" data-color="${item.color_id}" readonly />
                            <button class="qty-plus" data-id="${item.id}" data-variant="${variantId}" data-size="${item.size}" data-color="${item.color_id}">+</button>
                        </div>
                    </div>
                </div>
                <div class="remove-icon">
                    <button class="remove-item" data-id="${item.id}" data-variant="${variantId}" data-size="${item.size}" data-color="${item.color_id}">Remove</button>
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

 
document.addEventListener('click', function(e) {
    const target = e.target;
    const removeBtn = target.closest('.remove-item');

    // --- Quantity change (+/-) ---
    if(target.classList.contains('qty-plus') || target.classList.contains('qty-minus')) {
        const id = target.dataset.id;
        const variantId = target.dataset.variant;
        const size = target.dataset.size;
        const colorId = target.dataset.color;
        const qtyChange = target.classList.contains('qty-plus') ? 1 : -1;

        fetch(`{{ url('/cart/update') }}/${id}`, {
            method:'POST',
            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            },
            body: JSON.stringify({ quantity: qtyChange, variant_id: variantId, size, color_id: colorId })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                document.querySelector('.cd-button-cart-count').innerText = data.cart_count;
                renderCartDrawer(data.cart, variantsData);
            }
        });
    }

    // --- Remove item ---
    if(removeBtn) {
        const id = removeBtn.dataset.id;
        const variantId = removeBtn.dataset.variant;
        const size = removeBtn.dataset.size;
        const colorId = removeBtn.dataset.color;

        fetch(`{{ url('/cart/remove') }}/${id}`, {
            method:'POST',
            headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
            body: JSON.stringify({ variant_id: variantId, size, color_id: colorId })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                document.querySelector('.cd-button-cart-count').innerText = data.cart_count;
                renderCartDrawer(data.cart, variantsData);
            }
        });
    }
});




    // Close popup
    document.querySelector('.popup-close').addEventListener('click', function(){
        document.querySelector('.popup-overlay').classList.remove('active');
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