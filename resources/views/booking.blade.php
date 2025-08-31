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
                        <div class="step-txt">Owner Details</div>
                    </div>
                    <div class="step">
                        <span>4</span>
                        <div class="step-txt">Review & Payment</div>
                    </div>
                </div>

                <!-- Form steps -->
                <form id="stepForm" enctype="multipart/form-data" method="POST" action="#">
                    <div class="form-step step-slot active">
                        <div class="stepform-hd-top">
                            <h3>Select a Booking Slot</h3>
                        </div>
                        <div class="stepform-body">
                            <div class="step-1-wrapper">
                                <div class="p-2 p-md-3">
                                    <div class="row">
                                    <!-- Calendar -->
                                    <div class="col-12 col-md-8">
                                        <div class="calender-box bg-white p-2 p-md-5">
                                        
                                        <div id="calendar"></div>
                                        <div id="slotInfo" class="mt-3 alert alert-info">Please select a date to see availability.</div>
                                        </div>
                                    </div>

                                    <!-- Booking Form & Summary -->
                                    <div class="col-12 col-md-4">
                                        <div class="calender-box p-2 px-md-4 py-md-5">
                                        <h4>Book Your Slot</h4>
                                        <div id="bookingForm">
                                            <div class="mb-3 bg-white p-4">
                                                <label class="form-label">Location</label>
                                                <select class="form-select location"  name="location" required>
                                                <option value="">Select Location</option>
                                                <option value="Kharghar" selected="">Kharghar</option>
                                                
                                                </select>
                                            </div>


                                            <div class="mb-3 bg-white p-4">
                                            <label class="form-label">Booking Type</label>
                                                <div class="form-check">
                                                    <input class="form-check-input bookingType"  type="radio" name="bookingType" id="daycare4" value="Daycare4">
                                                    <label class="form-check-label" for="daycare4">Daycare </label>
                                                </div>
                                                <!-- <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="bookingType" id="daycare12" value="Daycare12">
                                                    <label class="form-check-label" for="daycare12">Daycare (12 Hours)</label>
                                                </div> -->
                                                <div class="form-check bg-white p-4">
                                                    <input class="form-check-input" type="radio" name="bookingType" id="boarding" value="Boarding">
                                                    <label class="form-check-label" for="boarding">Boarding</label>
                                                </div>
                                            </div>


                                            <div class="row bg-white p-4">
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


                                    
                                        <div class="bg-white p-4">
                                            <!-- Check-in / Check-out hidden initially -->
                                            <div class="mb-3 hidden-field" id="checkInField">
                                                <label class="form-label">Check-in</label>
                                                <input type="text" name="checkin" id="checkIn" class="form-control checkIn" placeholder="Enter Check-in Date & Time">
                                            </div>

                                            <div class="mb-3 hidden-field" id="checkOutField">
                                                <label class="form-label">Check-out</label>
                                                <input type="text" name="checkout" id="checkOut" class="form-control checkOut" placeholder="Enter Check-Out Date & Time">
                                            </div>
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
                    <div class="form-step step-pet-details">
                        <div class="stepform-hd-top">
                            <h2>Pet Details</h2>
                        </div>
                        <div class="stepform-body">
                            <div id="petDetailsWrapper"></div>
                            
                        </div>
                    </div>
                    <div class="form-step step-owner">
                        <div class="stepform-hd-top">
                            <h2>Owners Details</h2>
                        </div>
                        <!-- <div class="stepform-body">
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
                        </div> -->
                          <div class="stepform-body">
                            <div class="row stepform-body-row">
                            <div class="col-md-6">
                                <div class="stepform-body-col">
                                <label>Owner’s Name</label>
                                <input type="text" name="owner[name]" placeholder="Enter Owner’s name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stepform-body-col">
                                <label>Contact Number</label>
                                <input type="text" name="owner[contact]" placeholder="Enter Contact Number" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="stepform-body-col">
                                <label>Residential Address</label>
                                <input type="text" name="owner[address]" placeholder="Enter Residential Address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stepform-body-col">
                                <label>Alternate Contact Number</label>
                                <input type="text" name="owner[alt_contact]" placeholder="Enter Alternate Contact Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stepform-body-col">
                                <label for="aadharUpload">Upload Aadhar (Image)</label>
                                <input type="file" id="aadharUpload" name="owner[aadhar]" accept="image/*" required>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                   <div class="form-step step-review">
                        <div class="stepform-hd-top">
                            <h2>Review Your Booking</h2>
                        </div>
                        <div class="stepform-body row">
                            <!-- Left column: User details -->
                            <div class="col-md-8" id="reviewLeft">
                                <div class="review-section">
                                    <div class="booking-details-div">
                                        <h4 class="review-title"><span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1024" height="1024" viewBox="0 0 1024 1024"><path fill="currentColor" d="m960 95.888l-256.224.001V32.113c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76h-256v-63.76c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76H64c-35.344 0-64 28.656-64 64v800c0 35.343 28.656 64 64 64h896c35.344 0 64-28.657 64-64v-800c0-35.329-28.656-63.985-64-63.985m0 863.985H64v-800h255.776v32.24c0 17.679 14.32 32 32 32s32-14.321 32-32v-32.224h256v32.24c0 17.68 14.32 32 32 32s32-14.32 32-32v-32.24H960zM736 511.888h64c17.664 0 32-14.336 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32m0 255.984h64c17.664 0 32-14.32 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.696 14.336 32 32 32m-192-128h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32m0-255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32m-256 0h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32m0 255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32"/></svg></span>Booking Details</h4>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <p><strong>Location:</strong></p> <div id="reviewLocation"></div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                 <p><strong>Booking Type:</strong> </p><div id="reviewBookingType"></div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                 <p><strong>Check In Date & Time:</strong> </p><div id="reviewCheckInDateTime"></div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                 <p><strong>Checo Out Date & Time:</strong> </p><div id="reviewCheckOutDateTime"></div>
                                            </div>
                                            
                                        </div>
                                   
                                    </div>

                                    <div class="pet-details-div">
                                        <h4>Pet Details</h4>
                                        <div id="reviewPets"></div>
                                    </div>

                                    <div class="owner-details-div">
                                        <h4 class="review-title">Owner Details</h4>
                                        <p><strong>Name:</strong> <span id="reviewOwnerName"></span></p>
                                        <p><strong>Contact:</strong> <span id="reviewOwnerContact"></span></p>
                                        <p><strong>Address:</strong> <span id="reviewOwnerAddress"></span></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right column: Summary & Checkout -->
                            <div class="col-md-4" id="reviewRight">
                                <div class="summary-box p-3 border rounded">
                                    <h5 class="review-title">Booking Summary</h5>
                                    <p>Total Pets: <span id="reviewTotalPets"></span></p>
                                    <p><strong>Duration:</strong> <span id="reviewDuration"></span></p>
                                    <p><strong>Base Price:</strong> ₹<span id="reviewBasePrice"></span></p>
                                    <p><strong>Additional Charges:</strong> ₹<span id="reviewPenaltyPrice"></span></p>
                                    <p><strong>Total:</strong> ₹<span id="reviewTotalPrice"></span></p>
                                    <hr>
                                    <div class="terms">
                                        <input type="checkbox" id="acceptTnC" required>
                                        <label for="acceptTnC">I accept the Terms & Conditions</label>
                                    </div>
                                    <button type="button" id="expressCheckout" class="btn btn-primary mt-3">Express Checkout</button>
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


<!--step form js-->
<script>
$(document).ready(function () {
    let currentStep = 0;
    const totalSteps = $(".form-step").length;
    let petsGenerated = false; // track if pet forms are generated

    const dogBreeds = [
        "Labrador Retriever", "German Shepherd", "Golden Retriever",
        "Beagle", "Bulldog", "Poodle", "Rottweiler", "Dachshund", "Other"
    ];

    const catBreeds = [
        "Persian", "Maine Coon", "Siamese",
        "Ragdoll", "Bengal", "Sphynx", "British Shorthair", "Other"
    ];

    function getBreedOptions(type, index) {
        let breeds = type === "Dog" ? dogBreeds : catBreeds;
        return `
            <select name="pets[${index}][breed]" required>
              <option value="">Select ${type} Breed</option>
              ${breeds.map(b => `<option value="${b}">${b}</option>`).join("")}
            </select>
        `;
    }

    function getPetFormHTML(index, type) {
        return `
        <div class="pet-form-box mb-4 p-3 border rounded">
            <h5>Pet ${index} (${type})</h5>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label>Pet’s Name</label>
                    <input type="text" name="pets[${index}][name]" placeholder="Enter Pet’s name" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label>Breed</label>
                    ${getBreedOptions(type, index)}
                </div>
                <div class="col-md-6 mb-4">
                    <label>Age</label>
                    <input type="number" min="1" name="pets[${index}][age]" placeholder="Enter Age">
                </div>
                <div class="col-md-6 mb-4">
                    <label>Gender</label>
                    <select name="pets[${index}][gender]">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-6 mb-4">
                    <label>Existing Conditions</label>
                    <input type="text" name="pets[${index}][conditions]" placeholder="Any health issues">
                </div>
                <div class="col-md-6 mb-4">
                    <label>Food Habits</label>
                    <input type="text" name="pets[${index}][food]" placeholder="Type here">
                </div>
                <input type="hidden" name="pets[${index}][type]" value="${type}">
            </div>
        </div>
        `;
    }

    function generatePetForms(numDogs, numCats) {
        let wrapper = $("#petDetailsWrapper");
        wrapper.html(""); // reset only first time
        let petIndex = 1;

        for (let i = 1; i <= numDogs; i++) {
            wrapper.append(getPetFormHTML(petIndex, "Dog"));
            petIndex++;
        }

        for (let i = 1; i <= numCats; i++) {
            wrapper.append(getPetFormHTML(petIndex, "Cat"));
            petIndex++;
        }
    }



    function validatePetStep() {
    let isValid = true;

    // Clear previous errors
    $(".pet-error").remove();

    $("#petDetailsWrapper .pet-form-box").each(function() {
        const petNameInput = $(this).find("input[name*='[name]']");
        const petNameVal = petNameInput.val().trim();

        if(!/^[a-zA-Z\s]+$/.test(petNameVal) || petNameVal === "") {
            petNameInput.after('<div class="pet-error text-danger">Please enter a valid name (letters only).</div>');
            isValid = false;
        }
    });

    return isValid;
}



    function validateOwnerStep() {
    let isValid = true;

    // Clear previous errors
    $(".owner-error").remove();

    // Name validation (only letters and spaces)
    const ownerName = $("input[name='owner[name]']");
    const nameVal = ownerName.val().trim();
    if(!/^[a-zA-Z\s]+$/.test(nameVal) || nameVal === "") {
        ownerName.after('<div class="owner-error text-danger">Please enter a valid name (letters only).</div>');
        isValid = false;
    }

    // Phone validation (10 digits)
    const ownerPhone = $("input[name='owner[contact]']");
    const phoneVal = ownerPhone.val().trim();
    if(!/^\d{10}$/.test(phoneVal)) {
        ownerPhone.after('<div class="owner-error text-danger">Please enter a valid 10-digit phone number.</div>');
        isValid = false;
    }

    // Alternate phone validation (optional, but if filled must be 10 digits)
    const altPhone = $("input[name='owner[alt_contact]']");
    const altVal = altPhone.val().trim();
    if(altVal !== "" && !/^\d{10}$/.test(altVal)) {
        altPhone.after('<div class="owner-error text-danger">Please enter a valid 10-digit alternate phone number.</div>');
        isValid = false;
    }

    return isValid;
}


    function formatDateTime(dt) {
        const date = new Date(dt);
        const options = { year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: '2-digit' };
        return date.toLocaleString('en-IN', options);
    }

    function populateReviewStep() {
        // Booking Details
        $("#reviewLocation").text($("select[name='location']").val());
        $("#reviewBookingType").text($("input[name='bookingType']:checked").val());
        // $("#reviewDateTime").text(formatDateTime($("#checkIn").val()) + " to " + formatDateTime($("#checkOut").val()));
        $("#reviewCheckInDateTime").text(formatDateTime($("#checkIn").val()));
        $("#reviewCheckOutDateTime").text(formatDateTime($("#checkOut").val()));
        // Pet Details
        let petsHTML = "";
        $("#petDetailsWrapper .pet-form-box").each(function(index){
            const petName = $(this).find("input[name*='[name]']").val();
            const petBreed = $(this).find("select[name*='[breed]']").val();
            const petAge = $(this).find("input[name*='[age]']").val();
            const petGender = $(this).find("select[name*='[gender]']").val();
            const petType = $(this).find("input[name*='[type]']").val();

            petsHTML += `
                <p><strong>${petType} ${index+1}:</strong> ${petName}, Breed: ${petBreed}, Age: ${petAge}, Gender: ${petGender}</p>
            `;
        });
        $("#reviewPets").html(petsHTML);

        // Owner Details
        $("#reviewOwnerName").text($("input[name='owner[name]']").val());
        $("#reviewOwnerContact").text($("input[name='owner[contact]']").val());
        $("#reviewOwnerAddress").text($("input[name='owner[address]']").val());

        // Booking Summary
        $("#reviewTotalPets").text(parseInt($("#numDogs").val()) + parseInt($("#numCats").val()));
        $("#reviewDuration").text($("#durationText").text());
        $("#reviewBasePrice").text($("#basePrice").text());
        $("#reviewPenaltyPrice").text($("#penaltyPrice").text());
        $("#reviewTotalPrice").text($("#totalPrice").text());
    }

    function updateStepIndicators() {
        $(".steps .step").each(function(index){
            $(this).removeClass("active completed");
            if(index < currentStep) $(this).addClass("completed");
            if(index === currentStep) $(this).addClass("active");
        });

        // Hide prev button on first step
            if(currentStep === 0){
                $("#prevBtn").hide();
            } else {
                $("#prevBtn").show();
            }
    }

    function validateStep() {
        let isValid = true;
        const activeStepEl = $(".form-step").eq(currentStep);

        activeStepEl.find("input[required], select[required]").each(function () {
            if (!this.checkValidity()) {
                this.reportValidity();
                isValid = false;
                return false;
            }
        });

        // Step 1 extra validation
        if(activeStepEl.hasClass("step-slot")){
            const bookingType = $("input[name='bookingType']:checked").val();
            const location = $("select[name='location']").val();
            const numDogs = parseInt($("#numDogs").val());
            const numCats = parseInt($("#numCats").val());
            const checkIn = $("#checkIn").val();
            const checkOut = $("#checkOut").val();

            if (!bookingType || !location) {
                alert("Please select location and booking type.");
                isValid = false;
            } else if (numDogs + numCats < 1) {
                alert("Please select at least 1 dog or cat.");
                isValid = false;
            } else if (!checkIn || !checkOut) {
                alert("Please select both check-in and check-out dates.");
                isValid = false;
            }
        }

        return isValid;
    }

    $("#nextBtn").click(function () {
        if(!validateStep()) return;

        const activeStepEl = $(".form-step").eq(currentStep);

          // Step 2 → Pet Details validation
            if(activeStepEl.hasClass("step-pets")){
                if(!validatePetStep()) return; // stop if invalid
            }
        // Step 3 → Owner Details validation
            if(activeStepEl.hasClass("step-owner")){
                if(!validateOwnerStep()) return; // stop moving forward if invalid
            }

        // Step 1 → Step 2: generate pets only once
        if(activeStepEl.hasClass("step-slot") && !petsGenerated){
            const numDogs = parseInt($("#numDogs").val()) || 0;
            const numCats = parseInt($("#numCats").val()) || 0;
            generatePetForms(numDogs, numCats);
            petsGenerated = true;
        }

        // Move to next step
        if(currentStep < totalSteps - 1){
            currentStep++;
            $(".form-step").removeClass("active").eq(currentStep).addClass("active");
            updateStepIndicators();
        }

        // If last step → populate review
        if(currentStep === totalSteps - 1){
            populateReviewStep();
            // $("#nextBtn").text("Submit");
            $("#nextBtn").hide();
        } else {
            $("#nextBtn").text("Continue");
        }
    });

    $("#prevBtn").click(function () {
        if(currentStep > 0){
            currentStep--;
            $(".form-step").removeClass("active").eq(currentStep).addClass("active");
            updateStepIndicators();
            $("#nextBtn").text("Continue");
        }
    });

    updateStepIndicators(); // initialize
});
</script>



<!--step form js-->

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

       // ✅ Save Summary Details
    data.summary = {
        totalPets: document.getElementById("totalPets")?.textContent || 0,
        durationText: document.getElementById("durationText")?.textContent || "0",
        basePrice: document.getElementById("basePrice")?.textContent || 0,
        penaltyPrice: document.getElementById("penaltyPrice")?.textContent || 0,
        totalPrice: document.getElementById("totalPrice")?.textContent || 0,
    };

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

    // ✅ Restore summary details
    if (savedData.summary) {
        document.getElementById("totalPets").textContent = savedData.summary.totalPets;
        document.getElementById("durationText").textContent = savedData.summary.durationText;
        document.getElementById("basePrice").textContent = savedData.summary.basePrice;
        document.getElementById("penaltyPrice").textContent = savedData.summary.penaltyPrice;
        document.getElementById("totalPrice").textContent = savedData.summary.totalPrice;

        // Show summary box if valid
        if (parseInt(savedData.summary.totalPets) > 0) {
            document.getElementById("summaryBox").classList.remove("d-none");
        }
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


