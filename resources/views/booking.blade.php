@include('partials.header')
<section class="banner inner-banner inner-banner-all step-banner">
        <div class="container">
            <div class="inner-bn-all">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>Book a Day Care</li>
                </ul>
                <h1>Book Day Care</h1>
            </div>
        </div>
    </section>

    <section class="step-form-sec">
        <div class="container">
            <div class="step-container">
                <!-- Step indicators -->
                <div class="steps">
                    <div class="step active">
                        <span>1</span>
                        <div class="step-txt">Select Slot</div>
                    </div>
                    <div class="step">
                        <span>2</span>
                        <div class="step-txt">Pet Details</div>
                    </div>
                    <div class="step">
                        <span>3</span>
                        <div class="step-txt">Review</div>
                    </div>
                    <div class="step">
                        <span>4</span>
                        <div class="step-txt">Payment</div>
                    </div>
                </div>

                <!-- Form steps -->
                <form id="stepForm">
                    <div class="form-step active">
                        <div class="stepform-hd-top">
                            <h2>Select a Booking Slot</h2>
                        </div>
                        <div class="stepform-body">
                            <div class="row stepform-body-row">
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Location</label>
                                        <div class="stepform-inp-wrap">
                                            <input type="text" name="location" placeholder="Kharghar (Nearest Location)">
                                            <img src="images/point.svg" class="point-img" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Location</label>
                                        <div class="booking-type">
                                            <label>
                                                <input type="radio" name="booking" value="4hours">
                                                Daycare (4 Hours)
                                            </label>
                                            <label>
                                                <input type="radio" name="booking" value="12hours" checked>
                                                Daycare (12 Hours)
                                            </label>
                                            <label>
                                                <input type="radio" name="booking" value="boarding">
                                                Boarding
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="stepform-hd-top">
                            <h2>Pet Details</h2>
                        </div>
                        <div class="stepform-body">
                            <div class="row stepform-body-row">
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Owner’s name</label>
                                        <input type="text" placeholder="Enter Pet Owner name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Pet’s name</label>
                                        <input type="text" placeholder="Enter Pet’s name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Pet Type</label>
                                        <select>
                                            <option value="0">Select Pet Type</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Pet’s Breed</label>
                                        <select>
                                            <option value="0">Select Breed</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Pet’s Age</label>
                                        <input type="number" placeholder="Enter Pet’s age">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Gender</label>
                                        <div class="booking-type">
                                            <label>
                                                <input type="radio" name="gender" value="Male">
                                                Male
                                            </label>
                                            <label>
                                                <input type="radio" name="gender" value="Female" checked>
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="stepform-body-col">
                                        <label>Residential Address:</label>
                                        <input type="text" placeholder="Enter Residential Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Contact Number</label>
                                        <input type="text" placeholder="Enter Contact Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Alternate Contact Number</label>
                                        <input type="text" placeholder="Enter Alternate Contact Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Existing disease/ Co-morbidity</label>
                                        <input type="text" placeholder="Type here">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Deworming & Date:</label>
                                        <input type="date" placeholder="Enter Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Allergies</label>
                                        <div class="booking-type">
                                            <label>
                                                <input type="radio" name="allergies" value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="radio" name="allergies" value="No" checked>
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Food Habits</label>
                                        <input type="text" placeholder="Type here">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Walk schedule</label>
                                        <input type="text" placeholder="Type here">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Kindly attach Adhar Card Number of the owner:</label>
                                        <input type="number" placeholder="Type here">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="stepform-body-col">
                                        <label>Any habits or behaviour concern</label>
                                        <input type="number" placeholder="Type here">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="stepform-hd-top">
                            <h2>Select a Booking Slot</h2>
                        </div>
                        <div class="stepform-body">
                            <div class="row stepform-body-row">
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Location</label>
                                        <div class="stepform-inp-wrap">
                                            <input type="text" name="location" placeholder="Kharghar (Nearest Location)">
                                            <img src="images/point.svg" class="point-img" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Location</label>
                                        <div class="booking-type">
                                            <label>
                                                <input type="radio" name="booking" value="4hours">
                                                Daycare (4 Hours)
                                            </label>
                                            <label>
                                                <input type="radio" name="booking" value="12hours" checked>
                                                Daycare (12 Hours)
                                            </label>
                                            <label>
                                                <input type="radio" name="booking" value="boarding">
                                                Boarding
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="stepform-hd-top">
                            <h2>Select a Booking Slot</h2>
                        </div>
                        <div class="stepform-body">
                            <div class="row stepform-body-row">
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Location</label>
                                        <div class="stepform-inp-wrap">
                                            <input type="text" name="location" placeholder="Kharghar (Nearest Location)">
                                            <img src="images/point.svg" class="point-img" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepform-body-col">
                                        <label>Location</label>
                                        <div class="stepform-inp-wrap">
                                            <input type="text" name="location" placeholder="Kharghar (Nearest Location)">
                                            <img src="images/point.svg" class="point-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttons-wrap">
                        <button type="button" class="btn-step-prv" id="prevBtn"><i class="fa-solid fa-arrow-left"></i> Prviously</button>
                        <button type="button" class="btn-step-next" id="nextBtn">Continue</button>
                    </div>
                </form>
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

@include('partials.footer')