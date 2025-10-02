 @include('partials.header')




<section class="banner">
    <div class="container">
        <div class="row banner-row">
            <div class="col-lg-6">
                <div class="js-banner-cont">
                    <div class="banner-cont p-3 p-md-0">
                        <h1 class="mb-2 mb-md-3 ">Safe & Fun Stays Where Pets Feel at Home</h1>
                        <p>Daycare and boarding with care, comfort, and endless playtime.</p>
                        <div class="banner-cont-button">
                            <a href="{{ route('booking') }}" class="cmn-btn" data-content="Book a Slot"><span>Book a Slot</span></a>
                        </div>
                    </div>
                    <div class="banner-cont p-3 p-md-0">
                        <h1 class="mb-2 mb-md-3">Tasty Bites, Happy Tails, Love in Every Bite</h1>
                        <p>Healthy, delicious, and tail-wag approved—treats your pets will always love.</p>
                        <div class="banner-cont-button">
                            <a href="{{ route('shop.index') }}" class="cmn-btn" data-content="Shop Treats"><span>Shop Treats</span></a>
                        </div>
                    </div>
                    <div class="banner-cont p-3 p-md-0">
                        <h1 class="mb-2 mb-md-3">Festive Flairs & Western Wears For Your Furry Friends</h1>
                        <p>From festive traditions to everyday outings, explore premium pet clothing that blends comfort with fashion.</p>
                        <div class="banner-cont-button">
                            <a href="/booking-portal" class="cmn-btn" data-content="Shop the Collection"><span>Shop the Collection</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="js-banner-img"> <div class="banner-img">
                        <div class="banner-main">
                            <img src="{{ asset('images/banner-img.webp') }}" alt="">
                        </div>
                        <img src="{{ asset('images/food-one.webp') }}" class="food-one" alt="">
                        <img src="{{ asset('images/food-two.webp') }}" class="food-two" alt="">
                        <img src="{{ asset('images/food-three.webp') }}" class="food-three" alt="">
                    </div>

                    <div class="banner-img">
                        <div class="banner-main">
                            <img src="{{ asset('images/treats.webp') }}" alt="">
                        </div>
                        
                    </div>

                    <div class="banner-img">
                        <div class="banner-main">
                            <img src="{{ asset('images/fashion.webp') }}" class="d-none d-md-block d-lg-block lg-banner" alt="">
                            <img src="{{ asset('images/fashion-mob.webp') }}" class="d-block d-md-none d-lg-none" alt="">
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('images/banner-img-rgt.webp') }}" class="banner-img-rgt" alt="">
    <img src="{{ asset('images/banner-lft-top-ovr.webp') }}" class="banner-lft-top-ovr" alt="">
</section>

    <section class="about">
        <div class="container">
            <div class="about-wrap">
                <div class="row about-row">
                    <div class="col-lg-6">
                        <div class="about-cont-img">
                            <img src="{{asset('images/about-img.webp')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-cont text-center">
                            <img src="{{ asset('images/abt-logo.png') }}" class="abt-logo" alt="">
                            <h2>Care Beyond Routine, Love Beyond Words</h2>
                            <p>At Furry Friends and Co., we believe that pets are family. Our mission is to create a
                                welcoming and vibrant space where pet parents can find everything they need to care for
                                their furry companions while feeling understood and supported by a passionate community
                                that shares their love and devotion.</p>
                            <a href="{{ route('about') }}" class="cmn-btn" data-content="Read More"><span>Read More</span></a>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('images/abt-center-img.png') }}" class="abt-center-img" alt="">
            </div>
        </div>
        <img src="{{ asset('images/abt-lft-top.png') }}" class="abt-lft-top" alt="">
        <img src="{{ asset('images/abt-rgt-btm.png') }}" class="abt-lft-bottom" alt="">
    </section>


    <section class="locate-sec py-2 py-md-5">
        <div class="container">
            <div class="locate-wrap">
                <div class="locate-heading">
                    <h2>Step Into Furry Friends & Co Store</h2>
                    <p>Furry Friends & Co is more than just a pet store—it’s a destination of love, care, and quality. Explore our range of premium products, enjoy professional grooming services, and let your pets experience the comfort and joy they truly deserve.</p>
                    <!-- <div class="locate-filter">
                        <div class="row">
                            <div class="col-md-4">
                                <select>
                                    <option selected disabled>Search your State</option>
                                    <option>State 1</option>
                                    <option>State 2</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select>
                                    <option selected disabled>Search your City</option>
                                    <option>State 1</option>
                                    <option>State 2</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="locate-search">
                                    <input type="text" placeholder="Search Store">
                                    <button type="button" class="btn-search"><img src="{{ asset('images/search.svg') }}"
                                            alt=""></button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="locate-cd-wrap">
                    <div class="row store-card p-2 p-md-4 m-0">
                        <div class="col-6 col-md-3">
                             <div class="store-image">
                                    
                                        <img src="{{ asset('images/store1.webp') }}" alt="Heads Up For Tails Store">
                                       
                                    
                                </div>
                        </div>

                        <div class="col-6 col-md-3">
                             <div class="store-image">
                                    
                                      
                                        <img src="{{ asset('images/store2.webp') }}" alt="Heads Up For Tails Store">
                                    
                                </div>
                        </div>

                        <div class="col-md-6">
                            <div class="store-details">
                                    <div class="store-title">
                                        <a href="#">Furry Friends & Co | Kharghar</a>
                                    </div>
                                    <hr>
                                    <div class="store-address">
                                        Furry friends & Co, Shop No. 31, Om Harmony, Dog Walking Street, Anushaktinagar, Sector 10, Kharghar, Navi Mumbai, Maharashtra 410210
                                    </div>
                                    <div class="store-distance">090761 20593</div>
                                    <div class="store-timings">Open Everyday : <span class="timing-hours">8:00am to
                                            10:00pm</span></div>
                                    <div class="store-rating">
                                        <span class="reviews-number">4.7</span>
                                        <ul>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                        <span class="reviews-txt">225 Reviews</span>
                                    </div>
                                    <div class="store-actions justify-content-center justify-content-md-start">
                                        <a href="{{ route('booking') }}" class="btn-book">Book Slot</a>
                                        <a href="tel:09076120593" class="btn-call"><img src="{{ asset('images/coll-icon.svg') }}" alt=""></a>
                                        <a href="https://maps.app.goo.gl/nygEasieLDHnhQcV6" class="btn-location"><img src="{{ asset('images/send-icon.svg') }}" alt=""></a>
                                      
                                    </div>
                                </div>
                        </div>

                      
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top-categories pb-5">
        <div class="container">
            <div class="product-hd">
                <h2>Top Categories</h2>
                <p>Everything your pet needs, in a few clicks!</p>
            </div>
            <div class="row">
                <div class="col-6 col-md-4 mt-2 mt-md-4 px-1 px-md-2">
                    <div>
                        <a>
                            <img class="img-fluid" src="{{ asset('images/traditional-cats.webp') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 mt-2 mt-md-4 px-1 px-md-2">
                    <div>
                        <a>
                            <img class="img-fluid" src="{{ asset('images/treats-cat.webp') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 mt-2 mt-md-4 px-1 px-md-2">
                    <div>
                        <a>
                            <img class="img-fluid" src="{{ asset('images/bows-cat.webp') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-6 mt-2 mt-md-4 px-1 px-md-2">
                    <div>
                        <a>
                            <img class="img-fluid d-none d-md-block d-lg-block" src="{{ asset('images/bandana-cat.webp') }}" alt="">
                            <img class="img-fluid d-block d-md-none d-lg-none" src="{{ asset('images/bandana-mob.webp') }}" alt="">
                            
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2 mt-md-4 px-1 px-md-2">
                    <div>
                        <a>
                            <img class="img-fluid" src="{{ asset('images/access-cat.webp') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-wrap ">
        <div class="container">
            <img class="img-fluid w-100" src="{{ asset('images/t-shirt-cat.webp') }}">
        </div>
    </section>

    <section class="product-sec d-none">
        <div class="container">
            <div class="product-hd">
                <h2>Top Categories</h2>
                <p>Everything your pet needs, in a few clicks!</p>

                <ul class="product-tabs nav justify-content-center" id="productTabs">
                    <!-- <li class="nav-item">
                        <button class="tab-btn nav-link active" data-filter="all">All</button>
                    </li> -->
                    <!-- <li class="nav-item">
                        <button class="tab-btn nav-link" data-filter="dog-food">Dog Food</button>
                    </li>
                    <li class="nav-item">
                        <button class="tab-btn nav-link" data-filter="cat-food">Cat Food</button>
                    </li>
                    <li class="nav-item">
                        <button class="tab-btn nav-link" data-filter="dog-treat">Dog Treat</button>
                    </li>
                    <li class="nav-item">
                        <button class="tab-btn nav-link" data-filter="toys">Toys</button>
                    </li>
                    <li class="nav-item">
                        <button class="tab-btn nav-link" data-filter="bone-broth">Bone Broth Dog</button>
                    </li> -->
                </ul>
            </div>
            <div class="category-slider-section tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="all">
                   <div class="product-slider"> 
                        @if($categories->isNotEmpty())
                            @foreach($categories as $category)
                                <div class="category-card">
                                    {{-- The entire card is a link to the category page --}}
                                    <a href="{{ route('shop.category', $category->slug) }}" class="category-card-link">
                                        <div class="category-card-col">
                                            {{-- Category Image --}}
                                            <div class="category-card-img">
                                                @if($category->image)
                                                    <img src="{{ asset('public/' . $category->image) }}" alt="{{ $category->name }}">
                                                @else
                                                    <img src="{{ asset('images/default-category.png') }}" alt="Default category image">
                                                @endif
                                            </div>

                                            {{-- Category Name --}}
                                            <h3 class="mt-3">{{ $category->name }}</h3>

                                            {{-- Note: Price has been removed as it doesn't apply to categories --}}
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <p>No categories found.</p>
                            </div>
                        @endif
                    </div>
                    </div>
                <!-- <div class="tab-pane fade" id="dog-food">
                    <div class="product-slider">

                        <div class="product-card">
                            <div class="product-card-col">
                                <div class="product-card-img">
                                    <img src="{{ asset('images/pd3.png') }}" alt="">
                                </div>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd2.png') }}" alt="">
                                </a>
                                <h3><a href="#">Chicken Gravy</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <div class="product-card-img">
                                    <img src="{{ asset('images/pd3.png') }}" alt="">
                                </div>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="cat-food">
                    <div class="product-slider">
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd1.png') }}" alt="">
                                </a>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>

                        <div class="product-card">
                            <div class="product-card-col">
                                <div class="product-card-img">
                                    <img src="{{ asset('images/pd3.png') }}" alt="">
                                </div>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="dog-treat">
                    <div class="product-slider">
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd1.png') }}" alt="">
                                </a>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>

                        <div class="product-card">
                            <div class="product-card-col">
                                <div class="product-card-img">
                                    <img src="{{ asset('images/pd3.png') }}" alt="">
                                </div>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd2.png') }}" alt="">
                                </a>
                                <h3><a href="#">Chicken Gravy</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <div class="product-card-img">
                                    <img src="{{ asset('images/pd3.png') }}" alt="">
                                </div>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="toys">
                    <div class="product-slider">


                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd4.png') }}" alt="">
                                </a>
                                <h3><a href="#">Spikey Sprinter Chew</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <div class="product-card-img">
                                    <img src="{{ asset('images/pd3.png') }}" alt="">
                                </div>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd2.png') }}" alt="">
                                </a>
                                <h3><a href="#">Chicken Gravy</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <div class="product-card-img">
                                    <img src="{{ asset('images/pd3.png') }}" alt="">
                                </div>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="bone-broth">
                    <div class="product-slider">
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd1.png') }}" alt="">
                                </a>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd2.png') }}" alt="">
                                </a>
                                <h3><a href="#">Chicken Gravy</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd3.png') }}" alt="">
                                </a>
                                <h3><a href="#">Dry Food For Adult Cat</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd1.png') }}" alt="">
                                </a>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>

                        <div class="product-card">
                            <div class="product-card-col">
                                <div class="product-card-img">
                                    <img src="{{ asset('images/pd3.png') }}" alt="">
                                </div>
                                <h3><a href="#">Grain-Free Chicken</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card-col">
                                <a href="#" class="product-card-img">
                                    <img src="{{ asset('images/pd2.png') }}" alt="">
                                </a>
                                <h3><a href="#">Chicken Gravy</a></h3>
                                <p><del>₹180</del> ₹120</p>
                                <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="text-center btm-wrapp">
                <a href="#" class="cmn-btn" data-content="View All Products"><span>View All Products</span></a>
            </div>
        </div>
        <img src="{{ asset('images/prd-top-ov.png') }}" class="prd-top-ov" alt="">
        <img src="{{ asset('images/prd-bot-ov.png') }}" class="prd-bottom-ov" alt="">
        <img src="{{ asset('images/dog-stp-lf-img.png') }}" class="dog-stp-lf-img" alt="">
        <img src="{{ asset('images/dog-stp-rgt-img.png') }}" class="dog-stp-rgt-img" alt="">
    </section>


     <section class="product-sec py-5">
        <div class="container">
            <div class="product-hd">
                <h2>Trending Festive Collection</h2>
                <p>Hurry, before they're gone</p>
            </div>
        </div>


            <div class="category-slider-section tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="all">
                    <div class="product-slider">
                   @if(isset($traditionalProducts) && $traditionalProducts->isNotEmpty())
                        @foreach($traditionalProducts as $product)
                            <div class="product-card">
                                <div class="product-card-col featured-card p-0">
                                    <a href="{{ route('product.show', $product->slug) }}" class="product-card-img">
                                        <div class="hw_sales_label">
                                           <p class="sales_label_card" style="">Trending</p>                  
                                        </div>
                                        @if($product->image)
                                            <img src="{{ asset('public/' . $product->image) }}" alt="{{ $product->name }}">
                                        @else
                                            <img src="{{ asset('images/default-product.png') }}" alt="Default product image">
                                        @endif
                                    </a>
                                    <h2 class="brand-name mt-2">Furry Friends & Co</h2>
                                    <h3><a class="feat-product-name" href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                    <hr>
                                    <div class="product-meta">
                                        <div class="feat-product-price">
                                            @if($product->sale_price && $product->sale_price < $product->regular_price)
                                                <del>₹{{ number_format($product->regular_price, 2) }}</del>
                                                <strong>₹{{ number_format($product->sale_price, 2) }}</strong>
                                            @else
                                                <strong>₹{{ number_format($product->price, 2) }}</strong>
                                            @endif
                                        </div>

                                        <a href="{{ route('product.show', $product->slug) }}" class="view-btn">
                                            View
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        {{-- This message will show if the category is not found or has no products --}}
                        <div class="col-12 text-center">
                            <p>No products found in this collection yet.</p>
                        </div>
                    @endif
            </div>
           
       
       
    </section>


    <section class="dog-treats">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="img-div">
                        <img class="img-fluid w-100" src="{{ asset('images/dog-treats-banner.webp') }}">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-hd">
                        <h2>Deals Like Never Before</h2>
                        <p>Hurry, before they're gone</p>
                    </div>
                     <div class="category-slider-section tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="all">
                            <div class="treats-slider">
                            @if(isset($treatsProducts) && $treatsProducts->isNotEmpty())
                                @foreach($treatsProducts as $product)
                                    <div class="product-card">
                                        <div class="product-card-col featured-card p-0">
                                            <a href="{{ route('product.show', $product->slug) }}" class="product-card-img position-relative">
                                                <div class="hw_sales_label">
                                                    <p class="sales_label_card" style="">Steal the Deal</p>
                                                </div>
                                                @if($product->image)
                                                    <img src="{{ asset('public/' . $product->image) }}" alt="{{ $product->name }}">
                                                @else
                                                    <img src="{{ asset('images/default-product.png') }}" alt="Default product image">
                                                @endif

                                                {{-- ADD THIS BLOCK for Veg/Non-Veg Icon --}}
                                                <div class="food-type-wrapper">
                                                    @if($product->category->is_food)
                                                        @if($product->attributes->contains('slug', 'veg'))
                                                            <img src="{{ asset('images/veg.webp') }}" alt="Veg" title="Vegetarian" class="food-type-icon">
                                                        @else
                                                            <img src="{{ asset('images/non_veg.webp') }}" alt="Non-Veg" title="Non-Vegetarian" class="food-type-icon">
                                                        @endif
                                                    @endif
                                                </div>
                                            </a>
                                            
                                            

                                            <h2 class="brand-name mt-2">Furry Friends & Co</h2>
                                            <h3><a class="feat-product-name" href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                            <hr>
                                            <div class="product-meta">
                                                <div class="feat-product-price">
                                                    @if($product->sale_price && $product->sale_price < $product->regular_price)
                                                        <del>₹{{ number_format($product->regular_price, 2) }}</del>
                                                        <strong>₹{{ number_format($product->sale_price, 2) }}</strong>
                                                    @else
                                                        <strong>₹{{ number_format($product->price, 2) }}</strong>
                                                    @endif
                                                </div>
                                                <a href="{{ route('product.show', $product->slug) }}" class="view-btn">
                                                    View
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @else
                                {{-- This message will show if the category is not found or has no products --}}
                                <div class="col-12 text-center">
                                    <p>No products found in this collection yet.</p>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter-section">
        <div class="container">
            <div class="row counter-row">
                <div class="col-md-4 counter-item">
                    <div class="counter-box">
                        <div class="counter-content">
                            <h3 class="counter-number">10542+</h3>
                            <p class="counter-label">Happy Parents</p>
                        </div>
                        <div class="counter-icon">
                            <img src="{{ asset('images/counter-img1.png') }}" alt="Happy Parents">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 counter-item">
                    <div class="counter-box">
                        <div class="counter-content">
                            <h3 class="counter-number">705042+</h3>
                            <p class="counter-label">Meals Sold</p>
                        </div>
                        <div class="counter-icon">
                            <img src="{{ asset('images/counter-img2.png') }}" alt="Meals Sold">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 counter-item">
                    <div class="counter-box">
                        <div class="counter-content">
                            <h3 class="counter-number">95%</h3>
                            <p class="counter-label">Repeat Customers</p>
                        </div>
                        <div class="counter-icon">
                            <img src="{{ asset('images/counter-img3.png') }}" alt="Repeat Customers">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-section">
        <div class="container">
            <div class="why-choose-wrapper">
                <div class="row">
                    <div class="col-md-6">
                        <div class="why-choose-content">
                            <span class="why-subtitle">Why Choose Us?</span>
                            <h2>Trusted by Parents,<br> Loved by Pets</h2>
                            <p>At Furry Friends, we combine professional expertise with genuine love for animals. Pet
                                parents trust us because we go the extra mile to ensure their companions feel safe,
                                happy, and cared for. And pets? They love coming back—tails wagging, hearts full.</p>
                            <a href="{{ route('shop.index') }}" class="cmn-btn" data-content="Book Day Care"><span>Book Day Care</span></a>
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="why-choose-image-wrap">
                            <div class="why-choose-image">
                                <img src="{{ asset('images/dog-cat.png') }}" alt="Dog and Cat">
                            </div>
                            <img src="{{ asset('images/dog-cat-ov.png') }}" class="dog-cat-ov" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/dog-lft-ovr.png') }}" class="dog-lft-ovr" alt="">
    </section>


    <section class="community-section">
        <div class="container">
            <div class="cmn-heading text-center">
                <h2>Join Our Community</h2>
                <p>Join our growing community of passionate pet lovers through local clubs, fun events, and shared
                    experiences. Whether you're here for support, socializing, or just showing off your furry friend,
                    you’ll always have a place with us.</p>
            </div>
            <div class="community-cards">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="community-card">
                            <div class="community-logo">
                                <img src="{{ asset('images/community-logo1.png') }}" alt="Sunday Pet Walks">
                            </div>
                            <h3 class="club-title">Sunday Pet Walks</h3>
                            <p>Weekly dog walks and social time for pets and parents at Central Park.</p>
                            <div class="club-meta">
                                <p><span><img src="{{ asset('images/two-user.svg') }}" alt=""></span> <strong> 50 Active
                                        Members</strong></p>
                                <p><span><img src="{{ asset('images/pin.svg') }}" alt=""></span> Central Park, Salt Lake</p>
                            </div>
                            <a href="#" class="add-to-bag"><img src="{{ asset('images/plus.svg') }}" alt=""> Join Community</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="community-card active">
                            <div class="community-logo">
                                <img src="{{ asset('images/community-logo2.png') }}" alt="Sunday Pet Walks">
                            </div>
                            <h3 class="club-title">Parkside Pup Club</h3>
                            <p>Weekly dog walks and social time for pets and parents at Central Park.</p>
                            <div class="club-meta">
                                <p><span><img src="{{ asset('images/two-user.svg') }}" alt=""></span> <strong> 250 Active
                                        Members</strong></p>
                                <p><span><img src="{{ asset('images/pin.svg') }}" alt=""></span> Central Park, Salt Lake</p>
                            </div>
                            <a href="#" class="add-to-bag"><img src="{{ asset('images/plus.svg') }}" alt=""> Join Community</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="community-card">
                            <div class="community-logo">
                                <img src="{{ asset('images/community-logo3.png') }}" alt="Sunday Pet Walks">
                            </div>
                            <h3 class="club-title">Pet Friends Club</h3>
                            <p>Weekly dog walks and social time for pets and parents at Central Park.</p>
                            <div class="club-meta">
                                <p><span><img src="{{ asset('images/two-user.svg') }}" alt=""></span> <strong> 126 Active
                                        Members</strong></p>
                                <p><span><img src="{{ asset('images/pin.svg') }}" alt=""></span> Central Park, Salt Lake</p>
                            </div>
                            <a href="#" class="add-to-bag"><img src="{{ asset('images/plus.svg') }}" alt=""> Join Community</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center btm-wrapp">
                <a href="{{ route('community') }}" class="cmn-btn" data-content="Explore Community"><span>Explore Community</span></a>
            </div>
        </div>
        <img src="{{ asset('images/community-card-ov.png') }}" class="community-card-ov" alt="">
    </section>


    <section class="testimonial-gallery">
        <div class="container">
            <div class="cmn-heading text-center">
                <h2>Love From Our Pet Parents</h2>
            </div>
            <div class="js-testimonial-gallery">
                <div class="gallery-col">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" data-fancybox="gallery"
                        class="testimonial-card">
                        <img src="{{ asset('images/tstimg-1.jpg') }}" class="tstimg-ov" alt="">
                        <span class="play-button"><img src="{{ asset('images/play-btn.svg') }}" alt=""></span>
                    </a>
                </div>
                <div class="gallery-col">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" data-fancybox="gallery"
                        class="testimonial-card">
                        <img src="{{ asset('images/tstimg-2.jpg') }}" class="tstimg-ov" alt="">
                        <span class="play-button"><img src="{{ asset('images/play-btn.svg') }}" alt=""></span>
                    </a>
                </div>
                <div class="gallery-col">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" data-fancybox="gallery"
                        class="testimonial-card">
                        <img src="{{ asset('images/tstimg-3.jpg') }}" class="tstimg-ov" alt="">
                        <span class="play-button"><img src="{{ asset('images/play-btn.svg') }}" alt=""></span>
                    </a>
                </div>
                <div class="gallery-col">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" data-fancybox="gallery"
                        class="testimonial-card">
                        <img src="{{ asset('images/tstimg-4.png') }}" class="tstimg-ov" alt="">
                        <span class="play-button"><img src="{{ asset('images/play-btn.svg') }}" alt=""></span>
                    </a>
                </div>
            </div>
            <div class="review-card-wrap">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="review-card">
                            <img src="{{ asset('images/rev-1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="review-card">
                            <img src="{{ asset('images/rev-2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="review-card">
                            <img src="{{ asset('images/rev-3.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/prd-top-ov.png') }}" class="prd-top-ov" alt="">
        <img src="{{ asset('images/prd-bot-ov.png') }}" class="prd-bottom-ov" alt="">
        <img src="{{ asset('images/tst-lft-ov.png') }}" class="dog-stp-lf-img" alt="">
        <img src="{{ asset('images/tst-rgt-top.png') }}" class="tst-rgt-top" alt="">
        <img src="{{ asset('images/tst-rgt-bottom.png') }}" class="tst-rgt-bottom" alt="">
    </section>

    <section class="events-section">
        <div class="container">
            <div class="cmn-heading text-center">
                <h2>Our Upcoming Events</h2>
                <p>Join our latest workshops and fun pet-friendly events to bond, learn, and grow together with your
                    furry friends!</p>
            </div>
            <div class="events-grid">
                <div class="row events-row">
                    <div class="col-lg-6">
                        <div class="store-card-2">
                            <div class="store-image">
                                <a href="#">
                                    <img src="{{ asset('images/event-img1.jpg') }}" alt="Heads Up For Tails Store">
                                </a>
                            </div>
                            <div class="store-details">
                                <div class="store-title">
                                    <a href="#">Paw-sitive Parenting: New Pet Owner Workshop</a>
                                </div>
                                <div class="store-date">25th July 2026</div>
                                <div class="store-timings">11:30 AM - 2:30PM</div>
                                <div class="store-address">SDF More, Central Park, Salt Lake</div>

                                <div class="store-actions">
                                    <a href="#" class="btn-book">Join Now</a>
                                    <a href="#" class="btn-view-dtl">View Details <span><img
                                                src="{{ asset('images/slid-arrow-rgt.svg') }}" alt=""></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="store-card-2">
                            <div class="store-image">
                                <a href="#">
                                    <img src="{{ asset('images/event-img2.png') }}" alt="Heads Up For Tails Store">
                                </a>
                            </div>
                            <div class="store-details">
                                <div class="store-title">
                                    <a href="#">Paw-sitive Parenting: New Pet Owner Workshop</a>
                                </div>
                                <div class="store-date">25th July 2026</div>
                                <div class="store-timings">11:30 AM - 2:30PM</div>
                                <div class="store-address">SDF More, Central Park, Salt Lake</div>

                                <div class="store-actions">
                                    <a href="#" class="btn-book">Join Now</a>
                                    <a href="#" class="btn-view-dtl">View Details <span><img
                                                src="{{ asset('images/slid-arrow-rgt.svg') }}" alt=""></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="store-card-2">
                            <div class="store-image">
                                <a href="#">
                                    <img src="{{ asset('images/event-img3.jpg') }}" alt="Heads Up For Tails Store">
                                </a>
                            </div>
                            <div class="store-details">
                                <div class="store-title">
                                    <a href="#">Paw-sitive Parenting: New Pet Owner Workshop</a>
                                </div>
                                <div class="store-date">25th July 2026</div>
                                <div class="store-timings">11:30 AM - 2:30PM</div>
                                <div class="store-address">SDF More, Central Park, Salt Lake</div>

                                <div class="store-actions">
                                    <a href="#" class="btn-book">Join Now</a>
                                    <a href="#" class="btn-view-dtl">View Details <span><img
                                                src="{{ asset('images/slid-arrow-rgt.svg') }}" alt=""></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="store-card-2">
                            <div class="store-image">
                                <a href="#">
                                    <img src="{{ asset('images/event-img4.jpg') }}" alt="Heads Up For Tails Store">
                                </a>
                            </div>
                            <div class="store-details">
                                <div class="store-title">
                                    <a href="#">Paw-sitive Parenting: New Pet Owner Workshop</a>
                                </div>
                                <div class="store-date">25th July 2026</div>
                                <div class="store-timings">11:30 AM - 2:30PM</div>
                                <div class="store-address">SDF More, Central Park, Salt Lake</div>

                                <div class="store-actions">
                                    <a href="#" class="btn-book">Join Now</a>
                                    <a href="#" class="btn-view-dtl">View Details <span><img
                                                src="{{ asset('images/slid-arrow-rgt.svg') }}" alt=""></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center btm-wrapp">
                <a href="{{ route('events') }}" class="cmn-btn" data-content="Explore Events"><span>Explore Events</span></a>
            </div>
        </div>
        <img src="{{ asset('images/event-ov-lft.png') }}" class="event-ov-lft" alt="">
        <img src="{{ asset('images/event-ov-rgt.png') }}" class="event-ov-rgt" alt="">
    </section>


    <section class="trial-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="trial-img">
                        <div class="trial-img-main">
                            <img src="{{ asset('images/trial-img.png') }}" alt="">
                        </div>
                        <div class="trial-img-overlay"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="trial-col-left">
                        <span class="why-subtitle">Why Choose Us?</span>
                        <h2>Trial Pack</h2>
                        <p>Try each of our meat-based meal to find out which ones your dog likes the best!</p>
                        <div class="prd-list">
                            <ul>
                                <li>1 Wholesome Chicken Chow 250g</li>
                                <li>1 Grain-Free Chicken Chow 200g</li>
                                <li>1 Wholesome Mutton Nom Nom 250g</li>
                                <li>1 Wholesome Mutton Nom Nom 250g</li>
                                <li>1 Wholesome Mutton Nom Nom 250g</li>
                            </ul>
                        </div>
                        <div class="trial-pack-btm">
                            <div class="trial-pack-pricing">
                                <span><s>₹750</s></span>
                                <span>₹420</span>
                            </div>
                            <div class="trial-pack-button">
                                <a href="#" class="add-to-bag-sm"><span><img src="{{ asset('images/bag-icon.svg') }}" alt=""></span>
                                    Add to Bag</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/prd-top-ov.png') }}" class="prd-top-ov" alt="">
        <img src="{{ asset('images/prd-bot-ov.png') }}" class="prd-bottom-ov" alt="">
        <img src="{{ asset('images/pd-lft-img.png') }}" class="pd-lft-img" alt="">
        <img src="{{ asset('images/pd-rgt-img.png') }}" class="pd-rgt-img" alt="">
    </section>

    <section class="new-product product-sec">
        <div class="container">
            <div class="product-hd text-center">
                <h2>New Arrival Products</h2>
            </div>
            <div class="js-product-slider">
                <div class="product-card">
                    <div class="product-card-col">
                        <a href="#" class="product-card-img">
                            <img src="{{ asset('images/pd1.png') }}" alt="">
                        </a>
                        <h3><a href="#">Grain-Free Chicken</a></h3>
                        <p><del>₹180</del> ₹120</p>
                        <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-card-col">
                        <a href="#" class="product-card-img">
                            <img src="{{ asset('images/pd2.png') }}" alt="">
                        </a>
                        <h3><a href="#">Chicken Gravy</a></h3>
                        <p><del>₹180</del> ₹120</p>
                        <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-card-col">
                        <a href="#" class="product-card-img">
                            <img src="{{ asset('images/pd3.png') }}" alt="">
                        </a>
                        <h3><a href="#">Dry Food For Adult Cat</a></h3>
                        <p><del>₹180</del> ₹120</p>
                        <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-card-col">
                        <a href="#" class="product-card-img">
                            <img src="{{ asset('images/pd4.png') }}" alt="">
                        </a>
                        <h3><a href="#">Spikey Sprinter Chew</a></h3>
                        <p><del>₹180</del> ₹120</p>
                        <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-card-col">
                        <div class="product-card-img">
                            <img src="{{ asset('images/pd3.png') }}" alt="">
                        </div>
                        <h3><a href="#">Grain-Free Chicken</a></h3>
                        <p><del>₹180</del> ₹120</p>
                        <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-card-col">
                        <a href="#" class="product-card-img">
                            <img src="{{ asset('images/pd2.png') }}" alt="">
                        </a>
                        <h3><a href="#">Chicken Gravy</a></h3>
                        <p><del>₹180</del> ₹120</p>
                        <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-card-col">
                        <div class="product-card-img">
                            <img src="{{ asset('images/pd3.png') }}" alt="">
                        </div>
                        <h3><a href="#">Grain-Free Chicken</a></h3>
                        <p><del>₹180</del> ₹120</p>
                        <button class="add-to-bag"><img src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Bag</button>
                    </div>
                </div>
            </div>
            <div class="text-center btm-wrapp">
                <a href="#" class="cmn-btn" data-content="View All Products"><span>View All Products</span></a>
            </div>
        </div>
        <img src="{{ asset('images/prd-top-ov.png') }}" class="prd-top-ov" alt="">
        <img src="{{ asset('images/new-pd-left-img.png') }}" class="new-pd-left-img" alt="">
    </section>

    <section class="blog-sec">
        <div class="container">
            <div class="cmn-heading text-center">
                <h2>Beginner’s Guide to Pet Parenting</h2>
                <p>Everything You Need to Know to Welcome Your New Pet with Confidence</p>
            </div>
            <div class="blog-cd-wrap">
                <div class="row blog-cd-row">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-cd">
                            <div class="blog-img">
                                <a href="#" class="blog-img-link">
                                    <img src="{{ asset('images/blog-img1.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="blog-cont">
                                <span>Athletic Dogs Nutrition</span>
                                <h3><a href="#">Nutrition Tips For Athletic Dogs: Boost Energy And Performance</a></h3>
                                <p>Discover the best nutrition strategies for keeping your active dog in peak condition.
                                    Fuel their athleticism with the right diet for optimal performance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-cd">
                            <div class="blog-img">
                                <a href="#" class="blog-img-link">
                                    <img src="{{ asset('images/blog-img2.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="blog-cont">
                                <span>Fresh Nutrition for Pet Weight Management</span>
                                <h3><a href="#">The Ultimate Guide to Fresh Nutrition and Pet Weight Control</a></h3>
                                <p>Explore the importance of fresh nutrition in managing your pet's weight effectively
                                    for a healthier and happier life</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-cd">
                            <div class="blog-img">
                                <a href="#" class="blog-img-link">
                                    <img src="{{ asset('images/blog-img3.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="blog-cont">
                                <span>creative meal ideas</span>
                                <h3><a href="#">How To Feed A Picky Eater: Fresh & Healthy Meal Tips</a></h3>
                                <p>Discover effective nutrition tips to entice picky eaters with fresh food. Make
                                    mealtime a delight for your furry friend with these irresistible strategies</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center btm-wrapp">
                <a href="{{ route('blog') }}" class="cmn-btn" data-content="View All Blogs"><span>View All Blogs</span></a>
            </div>
        </div>
        <img src="{{ asset('images/blog-rgt-ovr.png') }}" class="blog-rgt-ovr" alt="">
    </section>

    <section class="media-sec">
        <div class="container-fluid">
            <div class="media-wrap">
                <div class="media-row">
                    <div class="media-col">
                        <div class="media-col-box">
                            <img src="{{ asset('images/media1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="media-col">
                        <div class="media-col-box">
                            <img src="{{ asset('images/media2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="media-col">
                        <div class="media-col-box">
                            <img src="{{ asset('images/media3.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="media-col">
                        <div class="media-col-box">
                            <img src="{{ asset('images/media4.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="media-col">
                        <div class="media-col-box">
                            <img src="{{ asset('images/media5.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="media-col">
                        <div class="media-col-box">
                            <img src="{{ asset('images/media6.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <a href="#" class="follow-wap">
                    <img src="{{ asset('images/Instagram.svg') }}" alt="">
                    <p>Follow us on Instagram</p>
                    <span><i class="fa-solid fa-plus"></i> Follow</span>
                </a>
            </div>
        </div>
        <img src="{{ asset('images/media-ovr.png') }}" class="media-ovr" alt="">
    </section>

 @include('partials.footer')