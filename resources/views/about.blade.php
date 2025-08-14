@include('partials.header')
<section class="banner inner-banner inner-banner-all">
        <div class="container">
            <div class="inner-bn-all">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>About Us</li>
                </ul>
                <h1>About Furry Friends</h1>
            </div>
        </div>
        <img src="{{ asset('images/dog-banner-img.png') }}" class="dog-banner-img" alt="">
        <img src="{{ asset('images/events-img-ovr.png') }}" class="events-img-ovr" alt="">
        <img src="{{ asset('images/about-banner.png') }}" class="events-banner-img about-banner" alt="">
    </section>

    <section class="community-sec">
        <div class="container social-container">
             <div class="abt-wrapp">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="abt-lft-col">
                                <div class="abt-lft-col-img-1">
                                    <img src="{{ asset('images/abt-one.jpg') }}" alt="">
                                </div>
                                <div class="abt-lft-col-img-2">
                                    <img src="{{ asset('images/abt-two.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class= "col-lg-6">
                            <div class="community-rgt-col">
                                <div class="tagline">Our Mission & Vision</div>
                                <h2>Care Beyond Routine, Love Beyond Words</h2>
                                <p>At Furry Friends and Co., we believe that pets are family. Our mission is to create a welcoming and vibrant space where pet parents can find everything they need to care for their furry companions while feeling understood and supported by a passionate community that shares their love and devotion.</p>
                                <p>To be the go-to destination for pet parents, where their bond with their pets is celebrated and nurtured, and to foster a community that views pets as integral members of the family.</p>
                                <a href="#" class="cmn-btn" data-content="Book Day Care" tabindex="-1"><span>Book Day Care</span></a>
                            </div>
                        </div>
                        </div>
                        <img src="{{ asset('images/abt-img-ovr.png') }}" class="abt-img-ovr" alt="">
             </div>       
        </div>
    </section>

    <section class="join-cm-sec">
        <div class="container">
             <div class="cmn-heading text-center">
                <h2>Our Values</h2>
            </div>
            <div class="community-cards">
                <div class="row our-values-row">
                    <div class="col-lg-4 col-md-6">
                        <div class="our-values-col">
                            <div class="our-values-img">
                                <img src="{{ asset('images/value1.svg') }}" alt="">
                            </div>
                            <h3>Community</h3>
                            <p>We strive to build a supportive network for pet parents, creating a space where they can connect, share experiences, and feel a sense of belonging.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="our-values-col">
                            <div class="our-values-img">
                                <img src="{{ asset('images/value2.svg') }}" alt="">
                            </div>
                            <h3>Quality</h3>
                            <p>We are committed to providing top-notch products and services that meet the highest standards of quality and safety for pets.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="our-values-col">
                            <div class="our-values-img">
                                <img src="{{ asset('images/value3.svg') }}" alt="">
                            </div>
                            <h3>Empathy</h3>
                            <p>We understand the deep bond between pets and their owners, and we aim to offer personalized care and advice that reflect this understanding.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="our-values-col">
                            <div class="our-values-img">
                                <img src="{{ asset('images/value4.svg') }}" alt="">
                            </div>
                            <h3>Fun</h3>
                            <p>Our shop is designed to be a joyful and engaging environment where shopping for pet needs is an enjoyable experience for both pets and their parents.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="our-values-col">
                            <div class="our-values-img">
                                <img src="{{ asset('images/value5.svg') }}" alt="">
                            </div>
                            <h3>Education</h3>
                            <p>We believe in empowering pet parents with knowledge about pet care, nutrition, and wellness to ensure their pets lead healthy and happy lives.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-cont-button">
                <a href="#" class="cmn-btn" data-content="Book Day Care" tabindex="-1"><span>Book Day Care</span></a>
                <a href="#" class="cmn-btn-border" data-content="Join The Community" tabindex="-1"><span>Join The Community</span></a>
            </div>
        </div>
        <img src="{{ asset('images/prd-top-ov.png') }}" class="prd-top-ov" alt="">
        <img src="{{ asset('images/prd-bot-ov.png') }}" class="prd-bottom-ov" alt="">
        <img src="{{ asset('images/value-lft-img.png') }}" class="value-lft-img" alt="">
        <img src="{{ asset('images/value-rgt-img.png') }}" class="value-rgt-img" alt="">
    </section>

    <section class="team-sec">
        <div class="container">
            <div class="cmn-heading text-center">
                <h2>Our Team</h2>
                <p>Lets see meet our experienced Team</p>
            </div>
            <div class="team-wrap">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-col">
                            <div class="team-col-top">
                                <div class="team-col-img">
                                    <img src="{{ asset('images/team1.jpg') }}" alt="">
                                </div>
                                <div class="plus-menu">
                                    <button class="plus-btn-ani"><i class="fa-solid fa-plus"></i></button>
                                    <div class="social-icons">
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-col-cont">
                                <h3>Esther Howard</h3>
                                <p>Founder</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-col">
                            <div class="team-col-top">
                                <div class="team-col-img">
                                    <img src="{{ asset('images/team2.jpg') }}" alt="">
                                </div>
                                <div class="plus-menu">
                                    <button class="plus-btn-ani"><i class="fa-solid fa-plus"></i></button>
                                    <div class="social-icons">
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-col-cont">
                                <h3>Guy Hawkins</h3>
                                <p>CEO</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-col">
                            <div class="team-col-top">
                                <div class="team-col-img">
                                    <img src="{{ asset('images/team3.jpg') }}" alt="">
                                </div>
                                <div class="plus-menu">
                                    <button class="plus-btn-ani"><i class="fa-solid fa-plus"></i></button>
                                    <div class="social-icons">
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-col-cont">
                                <h3>Darrell Steward</h3>
                                <p>Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-col">
                            <div class="team-col-top">
                                <div class="team-col-img">
                                    <img src="{{ asset('images/team4.jpg') }}" alt="">
                                </div>
                                <div class="plus-menu">
                                    <button class="plus-btn-ani"><i class="fa-solid fa-plus"></i></button>
                                    <div class="social-icons">
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-col-cont">
                                <h3>Bessie Cooper</h3>
                                <p>Executive assistant</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-col">
                            <div class="team-col-top">
                                <div class="team-col-img">
                                    <img src="{{ asset('images/team3.jpg') }}" alt="">
                                </div>
                                <div class="plus-menu">
                                    <button class="plus-btn-ani"><i class="fa-solid fa-plus"></i></button>
                                    <div class="social-icons">
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-col-cont">
                                <h3>Darrell Steward</h3>
                                <p>Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-col">
                            <div class="team-col-top">
                                <div class="team-col-img">
                                    <img src="{{ asset('images/team4.jpg') }}" alt="">
                                </div>
                                <div class="plus-menu">
                                    <button class="plus-btn-ani"><i class="fa-solid fa-plus"></i></button>
                                    <div class="social-icons">
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-col-cont">
                                <h3>Bessie Cooper</h3>
                                <p>Executive assistant</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center btm-wrapp">
                <button id="teamMoreBtn" class="cmn-btn" data-content="Load More"><span>Load More</span></button>
            </div>
            </div>
        </div>
        <img src="{{ asset('images/team-img-ovr.png') }}" class="team-img-ovr" alt="">
    </section>

    <section class="daycare-card">
        <div class="container">
            <div class="daycare-card-wrap">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="daycare-card-cont">
                            <h2>Book Our Daycare - A Safe, Loving Space for Your Pet</h2>
                            <p>Leave your furry friend in trusted hands. Our daycare offers comfort, play, and
                                personalized care while you're away—because they deserve the best, even when you're
                                busy.</p>
                            <div class="banner-cont-button">
                                <a href="#" class="cmn-btn" data-content="Book Day Care"><span>Book Day Care</span></a>
                                <a href="#" class="cmn-btn-border" data-content="Join The Community"><span>Join The
                                        Community</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="daycare-card-img">
                            <div class="daycare-card-img-main">
                                <img src="{{ asset('images/daycare-dg-ct.png') }}" alt="Dog and Cat Together">
                            </div>
                            <img src="{{ asset('images/daycare-dg-ct-ovr.png') }}" class="daycare-dg-ct-ovr" alt="Overlay">
                        </div>
                    </div>
                </div>
                <img src="{{ asset('images/daycare-dg-ct-ovr-two.png') }}" class="daycare-dg-ct-ovr-two" alt="">
            </div>
        </div>
    </section>

@include('partials.footer')