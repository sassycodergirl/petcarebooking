@include('partials.header')
<section class="banner inner-banner inner-banner-all ">
        <div class="container">
            <div class="inner-bn-all">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Blog</li>
                </ul>
                <h1>Articles on Furry Friends</h1>
            </div>
        </div>
        <img src="{{ asset('images/dog-banner-img.png') }}" class="dog-banner-img" alt="">
        <img src="{{ asset('images/events-img-ovr.png') }}" class="events-img-ovr" alt="">
        <img src="{{ asset('images/about-banner.png') }}" class="events-banner-img about-banner" alt="">
    </section>



     <section class="blog-sec py-5">
        <div class="container py-md-5">
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