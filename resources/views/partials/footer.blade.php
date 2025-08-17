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
    <div class="popup-overlay">
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
    </div>  

    <!-- Jquery-->
    <script src="{{asset('js/jquery-min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/fancybox.umd.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>


<script>
document.querySelectorAll('.add-to-bag.cd-button').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const productId = this.dataset.id;
        const quantity = 1; // default 1, or get from input

        // Generate URL dynamically from Blade
        const url = '{{ route("cart.add", ":id") }}'.replace(':id', productId);

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                document.querySelector('.cd-button-cart-count').innerText = data.cart_count;
                document.querySelector('.popup-overlay').classList.add('active'); // open drawer
            } else {
                alert('Something went wrong');
            }
        })
        .catch(err => console.log(err));
    });
});
</script>



</body>

</html>