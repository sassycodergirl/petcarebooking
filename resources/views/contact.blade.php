@include('partials.header')

<section class="banner inner-banner inner-banner-all">
        <div class="container">
            <div class="inner-bn-all">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Contact Us</li>
                </ul>
                <h1>We are here to Help You</h1>
            </div>
        </div>
        <img src="{{ asset('images/dog-banner-img.png') }}" class="dog-banner-img" alt="">
        <img src="{{ asset('images/events-img-ovr.png') }}" class="events-img-ovr" alt="">
        <img src="{{ asset('images/contact-banner.png') }}" class="events-banner-img contact-banner" alt="">
    </section>

    <section class="contact-form">
        <div class="container">
            <div class="contact-form-wrap">
                <div class="row">
                    <div class="col-lg-6 contact-form-lft">
                        <div class="contact-form-hd">
                            <h2>Request a Call Back</h2>
                            <p>We are always here to help you, Just make a message.</p>
                        </div>
                        <div class="form-row">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-col">
                                            <label>Full Name</label>
                                            <input type="text" placeholder="Enter your full name...">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-col">
                                            <label>Email address</label>
                                            <input type="email" placeholder="Enter your email address...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-col">
                                            <label>Phone Number</label>
                                            <input type="tel" placeholder="Enter your phone number...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-col">
                                            <label>Message Subject</label>
                                            <select name="subject">
                                                <option value="">Select Subject</option>
                                                <option value="general">General Inquiry</option>
                                                <option value="support">Support</option>
                                                <option value="sales">Sales</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-col">
                                            <label for="message">Your Message</label>
                                            <textarea id="message" name="message"
                                                placeholder="Type your message here..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-col">
                                            <div class="form-col-flex">
                                                <label class="terms">
                                                    <input type="checkbox" name="terms">
                                                    <span class="box" aria-hidden="true"></span>
                                                    Accept <a href="#">Terms & Conditions</a>
                                                </label>

                                                <button type="submit" class="cmn-btn" data-content="Submit Now">Submit
                                                    Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 contact-form-rgt">
                        <div class="contact-form-img">
                            <img src="{{ asset('images/contact-img.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section" id="faqs">
        <div class="container">
            <div class="cmn-heading text-center">
                <h2>Frequently Ask Questions</h2>
            </div>
            <div class="accordion" id="faqLeft">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                    What services do you offer at Furry Friends?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqLeft">
                                <div class="accordion-body">
                                    <p>We offer daycare, grooming, training, and overnight stays for pets.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    Do I need to book in advance for daycare?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqLeft">
                                <div class="accordion-body">
                                    <p>Yes, we recommend booking in advance to ensure availability, especially during
                                    weekends and holidays. You can book online or contact us directly.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree">
                                    What is included in the daycare service?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqLeft">
                                <div class="accordion-body">
                                    <p>Our daycare includes supervised play, feeding, and regular walks.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour">
                                    Is there a trial day for first-timers?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqLeft">
                                <div class="accordion-body">
                                    <p>Yes, we offer a trial day so your pet can get used to our environment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive">
                                    What kind of pets do you accept in daycare?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqLeft">
                                <div class="accordion-body">
                                    <p>We accept dogs, cats, and small pets like rabbits and guinea pigs.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse6">
                                    What kind of pets do you accept in daycare?
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#faqLeft">
                                <div class="accordion-body">
                                    <p>We accept dogs, cats, and small pets like rabbits and guinea pigs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@include('partials.footer')