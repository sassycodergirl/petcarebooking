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
                            <h3>Select a Booking Slot</h3>
                        </div>
                        <div class="stepform-body">
                            <div class="step-1-wrapper">
                                <div class="p-2 p-md-3">
                                    <div class="row">
                                    <!-- Calendar -->
                                    <div class="col-12 col-md-8">
                                        <div class="calender-box p-2 p-md-5">
                                        
                                        <div id="calendar"></div>
                                        <div id="slotInfo" class="mt-3 alert alert-info">Please select a date to see availability.</div>
                                        </div>
                                    </div>

                                    <!-- Booking Form & Summary -->
                                    <div class="col-12 col-md-4">
                                        <div class="calender-box p-2 px-md-4 py-md-5">
                                        <h4>Book Your Slot</h4>
                                        <div id="bookingForm">
                                            <div class="mb-3">
                                                <label class="form-label">Location</label>
                                                <select class="form-select location"  name="location" required>
                                                <option value="">Select Location</option>
                                                <option value="Kharghar" selected="">Kharghar</option>
                                                
                                                </select>
                                            </div>


                                            <div class="mb-3">
                                            <label class="form-label">Booking Type</label>
                                                <div class="form-check">
                                                    <input class="form-check-input bookingType"  type="radio" name="bookingType" id="daycare4" value="Daycare4">
                                                    <label class="form-check-label" for="daycare4">Daycare </label>
                                                </div>
                                                <!-- <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="bookingType" id="daycare12" value="Daycare12">
                                                    <label class="form-check-label" for="daycare12">Daycare (12 Hours)</label>
                                                </div> -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="bookingType" id="boarding" value="Boarding">
                                                    <label class="form-check-label" for="boarding">Boarding</label>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-6 col-md-6 mb-3">
                                                <label class="form-label">Dogs</label>
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="changeCount('numDogs', -1)">-</button>
                                                    <input type="text" name="dogcount" id="numDogs" class="form-control text-center numDogs" value="0" readonly>
                                                    <button type="button" class="btn btn-outline-secondary" onclick="changeCount('numDogs', 1)">+</button>
                                                </div>
                                                </div>

                                                <div class="col-6 col-md-6 mb-3">
                                                <label class="form-label">Cats</label>
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="changeCount('numCats', -1)">-</button>
                                                    <input type="text" name="catcount" id="numCats" class="form-control text-center numCats" value="0" readonly>
                                                    <button type="button" class="btn btn-outline-secondary" onclick="changeCount('numCats', 1)">+</button>
                                                </div>
                                                </div>
                                            </div>


                                    

                                        <!-- Check-in / Check-out hidden initially -->
                                        <div class="mb-3 hidden-field" id="checkInField">
                                            <label class="form-label">Check-in</label>
                                            <input type="text" name="checkin" id="checkIn" class="form-control checkIn" placeholder="Enter Check-in Date & Time">
                                        </div>

                                        <div class="mb-3 hidden-field" id="checkOutField">
                                            <label class="form-label">Check-out</label>
                                            <input type="text" name="checkout" id="checkOut" class="form-control checkOut" placeholder="Enter Check-Out Date & Time">
                                        </div>

                                        <div id="penaltyMessage" class="penalty-text d-none"></div>

                                        <div class="summary-box mt-3 d-none" id="summaryBox">
                                            <h5>Booking Summary</h5>
                                            <p>Total Pets: <span id="totalPets">0</span></p>
                                            <p><strong>Duration:</strong> <span id="durationText">0</span> hours</p>
                                            <p><strong>Base Price:</strong> ₹<span id="basePrice">0</span></p>
                                            <p><strong>Additional charges:</strong> ₹<span id="penaltyPrice">0</span></p>
                                            <p><strong>Total:</strong> ₹<span id="totalPrice">0</span></p>
                                        </div>

                                     
                                            </div>
                                    </div>
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
                    <!-- <div class="buttons-wrap">
                        <button type="button" class="btn-step-prv" id="prevBtn"><i class="fa-solid fa-arrow-left"></i> Prviously</button>
                        <button type="button" class="btn-step-next" id="nextBtn">Continue</button>
                    </div> -->
                   
                        @if(Auth::check())
                        <div class="buttons-wrap">
                            <button type="button" class="btn-step-prv" id="prevBtn"><i class="fa-solid fa-arrow-left"></i> Previously</button>
                            <button type="button" class="btn-step-next" id="nextBtn">Continue</button>
                        </div>
                        @else
                        <div class="buttons-wrap d-block text-end">
                            <button type="button" class="btn-step-next" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Login/Register to Continue
                            </button>
                            
                        </div>
                        @endif
                   

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





<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Register to Continue</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <!-- Loader GIF -->
        <div id="registerLoader" class="text-center d-none mb-3">
          <img src="{{ asset('images/loader.gif') }}" alt="Loading..." width="60">
        </div>

        <!-- Registration Form -->
        <form id="registerForm">
          @csrf
          <div class="mb-3">
            <label for="registerName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="registerName" required>
          </div>
          <div class="mb-3">
            <label for="registerEmail" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="registerEmail" required>
          </div>
          <div class="mb-3">
            <label for="registerPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="registerPassword" required>
          </div>
          <div class="mb-3">
            <label for="registerPasswordConfirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="registerPasswordConfirm" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <!-- Message Display -->
        <div id="registerMessage" class="text-center d-none mt-3"></div>

        <div class="mt-2 text-center">
          Already have an account? 
          <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login here</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Registration Modal -->

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
    const checkInField = document.getElementById('checkInField');
    const checkOutField = document.getElementById('checkOutField');
    const checkIn = document.getElementById('checkIn');
    const checkOut = document.getElementById('checkOut');
    const bookingRadios = document.querySelectorAll('input[name="bookingType"]');
    const slotInfo = document.getElementById('slotInfo');
    const penaltyMessage = document.getElementById('penaltyMessage');
    const basePriceEl = document.getElementById('basePrice');
    const penaltyPriceEl = document.getElementById('penaltyPrice');
    const totalPriceEl = document.getElementById('totalPrice');
    const durationText = document.getElementById('durationText');
    const summaryBox = document.getElementById('summaryBox');
    const totalPetsEl = document.getElementById('totalPets');

    // document.querySelector('select[name="location"]').value = "Kharghar";

    checkIn.disabled = true;
    checkOut.disabled = true;

    const fullyBookedDates = ["2025-08-28", "2025-08-30"];
    let selectedDateEl = null;

    let calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialView: 'dayGridMonth',
        selectable: true,
        dateClick: function(info){
            if (fullyBookedDates.includes(info.dateStr)) return;
            if(selectedDateEl) selectedDateEl.classList.remove("fc-day-selected");
            info.dayEl.classList.add("fc-day-selected");
            selectedDateEl = info.dayEl;
            checkInPicker.setDate(info.dateStr + " 08:00", true);
            updateSlotInfo();
        },
        dayCellDidMount: function(arg){
            const localDate = `${arg.date.getFullYear()}-${String(arg.date.getMonth()+1).padStart(2,"0")}-${String(arg.date.getDate()).padStart(2,"0")}`;
            if(fullyBookedDates.includes(localDate)){
                arg.el.classList.add("fc-day-disabled");
                arg.el.style.backgroundColor="red";
                arg.el.style.color="white";
            }
        }
    });
    calendar.render();

    const prices = { 
        "Daycare4": 499, 
        "Daycare12": 799, 
        "Boarding": {
            1: 1350, 4: 5400, 7: 9450, 10: 13500, 15: 20250, 30: 41850, daily: 1350
        }
    };

    let checkInPicker = flatpickr("#checkIn", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        disable: fullyBookedDates,
        onChange: function(selectedDates) {
            if(selectedDates.length > 0) {
                let minCheckout = new Date(selectedDates[0].getTime() + 30*60*1000);
                checkOutPicker.set('minDate', minCheckout);
                checkOutPicker.set('disable', fullyBookedDates);
            }
            highlightBookingRange();
            calculateSummary();
            toggleSummaryVisibility();
            updateSlotInfo();
        }
    });

    let checkOutPicker = flatpickr("#checkOut", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        disable: fullyBookedDates,
        onChange: function() {
            highlightBookingRange();
            calculateSummary();
            toggleSummaryVisibility();
            updateSlotInfo();
        }
    });

    let selectedRangeEls = [];

    function highlightBookingRange() {
        selectedRangeEls.forEach(el => el.classList.remove('fc-day-selected'));
        selectedRangeEls = [];

        const inTime = checkInPicker.selectedDates[0];
        let outTime = checkOutPicker.selectedDates[0];
        if (!inTime) return;

        let booking = getSelectedBooking();
        const dates = [];
        let startDate = new Date(inTime);
        let endDate = outTime ? new Date(outTime) : new Date(inTime);

        if (booking === "Boarding" && outTime) {
            const startCycle = new Date(inTime); startCycle.setHours(8,0,0,0);
            const endCycle = new Date(startCycle.getTime() + 24*60*60*1000);
            if(inTime < startCycle) startDate = new Date(startCycle);
            if(outTime <= endCycle) endDate = new Date(startCycle.getTime() + 1 - 1);
            else endDate = outTime;
        }

        let currentDate = new Date(startDate);
        while (currentDate <= endDate) {
            const dateStr = `${currentDate.getFullYear()}-${String(currentDate.getMonth()+1).padStart(2,'0')}-${String(currentDate.getDate()).padStart(2,'0')}`;
            if (!fullyBookedDates.includes(dateStr)) dates.push(new Date(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }

        const allDays = document.querySelectorAll('.fc-daygrid-day');
        allDays.forEach(day => {
            const dayDate = day.getAttribute('data-date');
            if (fullyBookedDates.includes(dayDate)) {
                day.classList.add('fc-day-disabled');
                day.style.backgroundColor = "red";
                day.style.color = "white";
                return;
            }
            dates.forEach(d => {
                const dateStr = `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;
                if(dayDate === dateStr){
                    day.classList.add('fc-day-selected');
                    selectedRangeEls.push(day);
                }
            });
        });
    }

  

    function updateSlotInfo() {
    const inTime = checkInPicker.selectedDates[0];
    const outTime = checkOutPicker.selectedDates[0];

    let startStr = "";
    let endStr = "";

    if (inTime && outTime) {
        // Full range selected
        startStr = `${inTime.getFullYear()}-${String(inTime.getMonth()+1).padStart(2,'0')}-${String(inTime.getDate()).padStart(2,'0')}`;
        endStr = `${outTime.getFullYear()}-${String(outTime.getMonth()+1).padStart(2,'0')}-${String(outTime.getDate()).padStart(2,'0')}`;
    } else if (selectedDateEl) {
        // Only single date clicked
        const date = selectedDateEl.getAttribute('data-date');
        startStr = date;
        endStr = date;
    } else {
        slotInfo.innerHTML = "Please select a date to see availability.";
        return;
    }

    // TODO: Replace with dynamic availability if needed
    const totalSlots = 7;
    const availableDaycare = 5;
    const availableBoarding = 2;

    slotInfo.innerHTML = `<b>Slots for ${startStr}${startStr !== endStr ? " to " + endStr : ""}</b><br>
                          Total Slots: ${totalSlots}<br>
                          Available Daycare: ${availableDaycare}<br>
                          Available Boarding: ${availableBoarding}<br>`;
}


    function toggleCheckFields() {
        const selectedBooking = getSelectedBooking();
        if (selectedBooking) {
            checkInField.classList.add('show');
            checkOutField.classList.add('show');
            checkIn.disabled = false;
            checkOut.disabled = false;
        } else {
            checkInField.classList.remove('show');
            checkOutField.classList.remove('show');
            checkIn.disabled = true;
            checkOut.disabled = true;
        }
    }

    function getSelectedBooking() {
        const selected = Array.from(bookingRadios).find(r => r.checked);
        return selected ? selected.value : null;
    }

    function resetBooking() {
        checkInPicker.clear();
        checkOutPicker.clear();
        penaltyMessage.classList.add("d-none");
        penaltyMessage.textContent = "";
        basePriceEl.textContent = 0;
        penaltyPriceEl.textContent = 0;
        totalPriceEl.textContent = 0;
        durationText.textContent = "";
        totalPetsEl.textContent = 0;
        selectedRangeEls.forEach(el => el.classList.remove('fc-day-selected'));
        selectedRangeEls = [];
        slotInfo.innerHTML = "Please select a date to see availability.";
    }

    bookingRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            resetBooking();
            toggleCheckFields();
            calculateSummary();
            toggleSummaryVisibility();
        });
    });







function calculateSummary() {
    const inTime = checkInPicker.selectedDates[0];
    const outTime = checkOutPicker.selectedDates[0];
    let booking = getSelectedBooking();
    if (!inTime || !outTime || !booking) return;

    const dogs = parseInt(document.getElementById('numDogs').value) || 0;
    const cats = parseInt(document.getElementById('numCats').value) || 0;
    const totalPets = dogs + cats;
    totalPetsEl.textContent = totalPets;

    penaltyMessage.classList.add("d-none");
    penaltyMessage.textContent = "";

    if (totalPets === 0) {
        basePriceEl.textContent = 0;
        penaltyPriceEl.textContent = 0;
        totalPriceEl.textContent = 0;
        return;
    }

    let duration = (outTime - inTime) / (1000 * 60 * 60);
    if (duration <= 0) return;
    durationText.textContent = duration.toFixed(1);

    let basePrice = 0, extraCharge = 0, earlyCharge = 0;

    // Early check-in
    if (inTime.getHours() < 8) {
        earlyCharge = 499;
        penaltyMessage.classList.remove("d-none");
        penaltyMessage.textContent = `Early check-in before 8:00 AM! Additional Charge ₹${earlyCharge}`;
    }

    // --- create cutoff 10:00 PM for same day ---
    let cutoff = new Date(inTime);
    cutoff.setHours(22, 0, 0, 0);

    // Daycare 4H selected
    if (booking === "Daycare4") {
        basePrice = prices.Daycare4;

        if (duration > 4 && outTime <= cutoff && inTime.toDateString() === outTime.toDateString()) {
            // upgrade to Daycare12
            booking = "Daycare12";
            basePrice = prices.Daycare12;
            extraCharge = 0;
        }
        else if (duration <= 4 && outTime > cutoff) {
            // convert to Boarding 24h
            basePrice = 499;
            extraCharge = 851;
            penaltyMessage.classList.remove("d-none");
            penaltyMessage.textContent = `Exceeded allowed hours! Charged ₹${extraCharge} per pet.`;
        }
        else if (duration > 4 && outTime > cutoff) {
            // also convert to Boarding
            basePrice = 799;
            extraCharge = 551;
            penaltyMessage.classList.remove("d-none");
            penaltyMessage.textContent = `Exceeded allowed hours! Charged ₹${extraCharge} per pet.`;
        }
    }

  



    // Hidden Daycare 12H (auto applied)
    if (booking === "Daycare12") {
        basePrice = prices.Daycare12;

        if (duration > 12 && outTime <= cutoff && inTime.toDateString() === outTime.toDateString()) {
            // convert to Boarding
            basePrice = 1350;
            extraCharge = 0;
        }
        else if (duration <= 12 && outTime > cutoff) {
            basePrice = 799;
            extraCharge = 551;
            penaltyMessage.classList.remove("d-none");
            penaltyMessage.textContent = `Exceeded allowed hours! Charged ₹${extraCharge} per pet.`;
        }
        else if (duration > 12 && outTime > cutoff) {
            basePrice = 799;
            extraCharge = 551;
            penaltyMessage.classList.remove("d-none");
            penaltyMessage.textContent = `Exceeded allowed hours! Charged ₹${extraCharge} per pet.`;
        }
    }




if (booking === "Boarding") {
       // --- Block days check ---
    let currentDate = new Date(inTime);
    let blocked = false;
    while (currentDate <= outTime) {
        const dateStr = `${currentDate.getFullYear()}-${String(currentDate.getMonth()+1).padStart(2,'0')}-${String(currentDate.getDate()).padStart(2,'0')}`;
        if (fullyBookedDates.includes(dateStr)) {
            blocked = true;
            break;
        }
        currentDate.setDate(currentDate.getDate() + 1);
    }

    if (blocked) {
        penaltyMessage.classList.remove("d-none");
        penaltyMessage.textContent = "Boarding cannot be booked because one or more days in this range are fully booked.";
        document.querySelector(".buttons-wrap").classList.add("d-none");
        basePriceEl.textContent = 0;
        penaltyPriceEl.textContent = 0;
        totalPriceEl.textContent = 0;
        return; // stop here
    }
    else{
         document.querySelector(".buttons-wrap").classList.remove("d-none");
    }
    


    const basePerDay = prices.Boarding.daily; // e.g., 1350
    let days = 1;

    // Start cycle at check-in 8:00 AM anchor
    let cycleStart = new Date(inTime);
    cycleStart.setHours(8, 0, 0, 0);

    if (inTime > cycleStart) {
        cycleStart.setDate(cycleStart.getDate() + 1);
    }

    let cycleEnd = new Date(cycleStart);
    cycleEnd.setDate(cycleEnd.getDate() + 1); // +24 hrs

    while (outTime >= cycleEnd) {
        days++;
        cycleStart = new Date(cycleEnd);
        cycleEnd.setDate(cycleEnd.getDate() + 1);
    }

    // ✅ Base price = all complete boarding days
    basePrice = basePerDay * days;
    extraCharge = 0;

    // ✅ If checkout is after 8:00 AM (not aligned with cycleEnd) → add penalty
    let cutoff = new Date(outTime);
    cutoff.setHours(8, 0, 0, 0);

    if (outTime > cutoff) {
        extraCharge = basePerDay;
    }

    // Messages
    if (extraCharge > 0) {
        penaltyMessage.classList.remove("d-none");
        penaltyMessage.textContent = "Late check-out after 8:00 AM incurs additional charges.";
    } else {
        penaltyMessage.classList.add("d-none");
    }
}






    basePriceEl.textContent = basePrice * totalPets;
    penaltyPriceEl.textContent = (extraCharge + earlyCharge) * totalPets;
    totalPriceEl.textContent = (basePrice + extraCharge + earlyCharge) * totalPets;
}





    function toggleSummaryVisibility() {
    const location = document.querySelector('select[name="location"]').value;
    const booking = getSelectedBooking();
    const inTime = checkInPicker.selectedDates[0];
    const outTime = checkOutPicker.selectedDates[0];
    const dogs = parseInt(document.getElementById('numDogs').value) || 0;
    const cats = parseInt(document.getElementById('numCats').value) || 0;
    const totalPets = dogs + cats;

    let blocked = false;
    if (inTime && outTime) {
        let currentDate = new Date(inTime);
        while (currentDate <= outTime) {
            const dateStr = `${currentDate.getFullYear()}-${String(currentDate.getMonth()+1).padStart(2,'0')}-${String(currentDate.getDate()).padStart(2,'0')}`;
            if (fullyBookedDates.includes(dateStr)) {
                blocked = true;
                break;
            }
            currentDate.setDate(currentDate.getDate() + 1);
        }
    }

    if (blocked) {
        penaltyMessage.classList.remove("d-none");
        penaltyMessage.textContent = "Boarding cannot be booked because one or more days in this range are fully booked.";
        summaryBox.classList.add("d-none"); // ❌ Hide summary
        return;
    } else {
        penaltyMessage.classList.add("d-none");
    }

    if (location && booking && inTime && outTime && totalPets > 0) {
        summaryBox.classList.remove('d-none');
    } else {
        summaryBox.classList.add('d-none');
    }
}


    window.changeCount = function(id, delta){
        const input = document.getElementById(id);
        let value = parseInt(input.value) || 0;
        value += delta;
        if(value<0) value=0;
        input.value = value;
        calculateSummary();
        toggleSummaryVisibility();
        updateSlotInfo();
    }
});
</script>


<script>
    $('#ajaxLoginForm').submit(function(e) {
    e.preventDefault();
    let form = $(this);
    let url = "{{ route('login') }}"; // Laravel login route

    $.ajax({
        url: url,
        type: "POST",
        data: form.serialize(),
        success: function(response) {
            // Close modal
            $('#loginModal').modal('hide');

            // Reload the page to update Auth::check() and continue booking
            location.reload();
        },
        error: function(xhr) {
            let errors = xhr.responseJSON.errors;
            if(errors) {
                $('#loginError').text(errors.email ? errors.email[0] : errors.password ? errors.password[0] : 'Login failed');
            } else {
                $('#loginError').text('Login failed. Please try again.');
            }
        }
    });
});

</script>

<script>

$('#registerForm').submit(function(e){
    e.preventDefault(); // prevent normal form submit

    let redirectUrl = window.location.href; // current page
    let formData = $(this).serialize() + '&redirect=' + encodeURIComponent(redirectUrl);

    // Show loader
    $('#registerLoader').removeClass('d-none');
    $('#registerForm button[type="submit"]').prop('disabled', true);
    $('#registerMessage').addClass('d-none').html('');

    $.ajax({
        url: "{{ route('register') }}",
        method: 'POST',
        data: formData,
        success: function(res){
            // Hide loader
            $('#registerLoader').addClass('d-none');

            // Hide form
            $('#registerForm').hide();

            // Show message inside modal
            $('#registerMessage').removeClass('d-none').html(`
                <div class="alert alert-success">
                    ${res.message}
                </div>
                <button type="button" class="btn btn-success mt-3" data-bs-dismiss="modal">Close</button>
            `);
        },
        error: function(err){
            // Hide loader, enable button
            $('#registerLoader').addClass('d-none');
            $('#registerForm button[type="submit"]').prop('disabled', false);

            if (err.responseJSON && err.responseJSON.errors) {
                let errors = err.responseJSON.errors;
                let html = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value){
                    html += '<li>' + value[0] + '</li>';
                });
                html += '</ul></div>';
                $('#registerMessage').removeClass('d-none').html(html);
            } else {
                console.log(err);
            }
        }
    });
});

// Reload page when modal closes (any way it closes)
var registerModal = document.getElementById('registerModal');
registerModal.addEventListener('hidden.bs.modal', function () {
    location.reload();
});
</script>


<!--otp based login/register-->
<!-- <script>
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
        fetch("{{ route('phone.login.send') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ phone: phoneInput.value })
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
        fetch("{{ route('phone.login.verify') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ phone: phoneInput.value, otp: otpInput.value })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                errorBox.innerText = "✅ " + data.message;
                setTimeout(() => {
                    let modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                    modal.hide();
                    location.reload(); // refresh navbar login status
                }, 1000);
            } else {
                errorBox.innerText = data.message;
            }
        });
    });
});
</script> -->

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

<!--sessionStorage-->
<script>
// Save form data into localStorage
function saveBookingForm() {
    let data = {};

    // Location (select)
    let location = document.querySelector(".location");
    if (location) data.location = location.value;

    // Booking Type (radio)
    let bookingType = document.querySelector('input[name="bookingType"]:checked');
    if (bookingType) data.bookingType = bookingType.value;

    // Dogs / Cats
    let numDogs = document.querySelector(".numDogs");
    if (numDogs) data.numDogs = numDogs.value;

    let numCats = document.querySelector(".numCats");
    if (numCats) data.numCats = numCats.value;

    // Check-in / Check-out
    let checkIn = document.querySelector(".checkIn");
    if (checkIn) data.checkIn = checkIn.value;

    let checkOut = document.querySelector(".checkOut");
    if (checkOut) data.checkOut = checkOut.value;

    // Save to localStorage
    localStorage.setItem("bookingFormData", JSON.stringify(data));
}

// Restore saved data
function restoreBookingForm() {
    let savedData = localStorage.getItem("bookingFormData");
    if (!savedData) return;

    savedData = JSON.parse(savedData);

    // Restore location
    if (savedData.location) {
        let location = document.querySelector(".location");
        if (location) location.value = savedData.location;
    }

    // Restore bookingType
    if (savedData.bookingType) {
        let bookingInput = document.querySelector(`input[name="bookingType"][value="${savedData.bookingType}"]`);
        if (bookingInput) bookingInput.checked = true;

        //test
        bookingInput.dispatchEvent(new Event('change', { bubbles: true }));

            // Fallback: manually show fields if still hidden
            const checkInField = document.getElementById('checkInField');
            const checkOutField = document.getElementById('checkOutField');
            const checkIn = document.getElementById('checkIn');
            const checkOut = document.getElementById('checkOut');

            if (checkInField && checkOutField) {
                checkInField.classList.add('show');
                checkOutField.classList.add('show');
            }
            if (checkIn) checkIn.disabled = false;
            if (checkOut) checkOut.disabled = false;
        //test
         
    }

    // Restore dogs/cats
    if (savedData.numDogs) {
        let numDogs = document.querySelector(".numDogs");
        if (numDogs) numDogs.value = savedData.numDogs;
    }

    if (savedData.numCats) {
        let numCats = document.querySelector(".numCats");
        if (numCats) numCats.value = savedData.numCats;
    }

    // Restore check-in / check-out
    if (savedData.checkIn) {
        let checkIn = document.querySelector(".checkIn");
        if (checkIn) checkIn.value = savedData.checkIn;
    }

    if (savedData.checkOut) {
        let checkOut = document.querySelector(".checkOut");
        if (checkOut) checkOut.value = savedData.checkOut;
    }

}

// Run restore on page load
document.addEventListener("DOMContentLoaded", restoreBookingForm);

// Save whenever user changes something
document.querySelectorAll("#bookingForm input, #bookingForm select").forEach(el => {
    el.addEventListener("change", saveBookingForm);
    el.addEventListener("input", saveBookingForm);
});
</script>


<!--sessionStorage-->


