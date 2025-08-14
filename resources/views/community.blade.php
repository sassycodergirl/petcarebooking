   
@include('partials.header')   
   <section class="banner inner-banner inner-banner-all">
        <div class="container">
            <div class="inner-bn-all">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Community</li>
                </ul>
                <h1>Join Our Furry Friends Community</h1>
            </div>
        </div>
        <img src="{{ asset('images/dog-banner-img.png') }}" class="dog-banner-img" alt="">
        <img src="{{ asset('images/events-img-ovr.png') }}" class="events-img-ovr" alt="">
        <img src="{{ asset('images/community-banner.png') }}" class="events-banner-img community-banner" alt="">
    </section>

    <section class="community-sec">
        <div class="container social-container">
    <div class="row">
      <!-- Left Panel -->
      <div class="col-lg-6">
        <div class="community-lft-col">
            <div class="community-lft-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Furry Friends Logo">
            </div>
            <div class="stats-wrap">
                <div class="stats">10k+<span>On Facebook</span></div>
                <div class="stats">28k+<span>On Instagram</span></div>
                <div class="stats">2.5k+<span>On YouTube</span></div>
            </div>
            <img src="{{ asset('images/community-img.png') }}" alt="Happy Dog" class="dog-image">
        </div>
      </div>
      <div class= "col-lg-6">
        <div class="community-rgt-col">
            <div class="tagline">PETS ARE FAMILY</div>
            <h2>Let’s See Our Social Appearances</h2>
            <p>At Furry Friends, our journey doesn’t end at the daycare door—it continues online, where we celebrate the beautiful bond between pets and their people every day. Our social media platforms are more than just places to scroll. They’re vibrant spaces full of heartwarming stories, helpful pet care tips, event highlights, and real moments from our loving community.</p>
            <div class="follow-txt">Follow Us On</div>
            <div class="socials-icons">
            <ul>
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
    </section>

    <section class="facilities-section">
        <div class="container">
            <div class="cmn-hd text-center">
                <h2>Facilities You Will Get From Us</h2>
                <p>From cozy daycare spaces to expert grooming and quality pet essentials, we offer everything your pet needs under one roof. Our facilities are designed to ensure comfort, safety, and joy—for both pets and their parents.</p>
            
                <div class="facilities-features">
                    <ul>
                        <li>live camera access</li>
                        <li>Food based on habits</li>
                        <li>Unlimited walking time</li>
                        <li>All time Ac service</li>
                        <li>Unlimited play time in play area</li>
                        <li>No restriction to staying inside kennel</li>
                        <li>Pampering session</li>
                        <li>Socialising session</li>
                        <li>Anxiety relief therapy</li>
                        <li>Any time video call service</li>
                        <li>Plenty of videos & pictures to capture memories</li>
                        <li>Second Home like atmosphere</li>
                    </ul>
                </div>

                <div class="facilities-features-btn">
                    <a href="#" class="cmn-btn" data-content="Book Day Care"><span>Book Day Care</span></a>
                </div>

            </div>
        </div>
    </section>

    <section class="join-cm-sec">
        <div class="container">
             <div class="cmn-heading text-center">
                <h2>Join Our Community</h2>
                <p>Join our growing community of passionate pet lovers through local clubs, fun events, and shared experiences. Whether you're here for support, socializing, or just showing off your furry friend, you’ll always have a place with us.</p>
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
                        <div class="community-card">
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
                    <div class="col-lg-4 col-md-6">
                        <div class="community-card">
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
                </div>
            </div>
            <div class="text-center btm-wrapp">
                <button id="loadMoreBtn" class="cmn-btn" data-content="Load More"><span>Load More</span></button>
            </div>
        </div>
        <img src="{{ asset('images/prd-top-ov.png') }}" class="prd-top-ov" alt="">
        <img src="{{ asset('images/prd-bot-ov.png') }}" class="prd-bottom-ov" alt="">
        <img src="{{ asset('images/cm-lft-img.png') }}" class="cm-lft-img" alt="">
        <img src="{{ asset('images/cm-rgt-img.png') }}" class="cm-rgt-img" alt="">
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
                <a href="#" class="cmn-btn" data-content="View All Blogs"><span>View All Blogs</span></a>
            </div>
        </div>
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