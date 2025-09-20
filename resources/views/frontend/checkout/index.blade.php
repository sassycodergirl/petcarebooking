<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
    <title>Checkout-Furry & Friends</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

     
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
    /* font-family: "Rubik", sans-serif; */
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    /* font-family: "Nunito", sans-serif; */
          :root {
            --scroll-behavior: smooth;
            --default-body-font: "Nunito", sans-serif;
            --default-heading-font: "Rubik", sans-serif;
            --bg-white: #ffffff;
            --bg-text-color: #3B2519;
            --bg-h1-color: #2E1A0F;
            --bg-orange: #FF9603;
          }
          h1, .h1-heading, h2, h3, h4, h5, h6{
          font-family: var(--default-heading-font);
          margin: 0 0 20px 0;
          font-weight: 700;
          padding: 0;
      }

      body{
        font-family: var(--default-heading-font);
      }
     .cart-count-badge{
      font-weight:400;
     }
        .header-checkout{
              border-bottom: 1px solid #dedede;
        }

        .order-md-last{
          background:#f5f5f5;
        }
          
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

   .right-scroll{
    position: sticky;
    top: 20px;
    right: 0;
    transition: all 0.3s ease-in-out;
   }
.input-group {
 position: relative;
}
.input-group select.input {
  appearance: none; /* remove default arrow for styling */
  background: #fff;
}

.input-group select.input:focus ~ label,
.input-group select.input:valid ~ label {
  transform: translateY(-50%) scale(0.8);
  background-color: #fff;
  z-index: 9999;
  padding: 0 .2em;
  color: #000;
  font-size: 1.2em;
}

.input {
  font-family: var(--default-heading-font);
 border: solid 1.5px #cbcbcb;
 border-radius: 8px !important;
 background: none;
 padding: 0.8rem;
 font-size: 1.2rem;
 color: #000;
 transition: border 150ms cubic-bezier(0.4,0,0.2,1);
 width: 100%;
 background: #fff;
}



.user-label {

 position: absolute;
 left: 15px;
  color: #7a7a7a;
  font-size: 1em;
 pointer-events: none;
 transform: translateY(1rem);
 transition: 150ms cubic-bezier(0.4,0,0.2,1);
}

.input:focus, input:valid {
 outline: none;
 border: 2px solid #000;
}

.input:focus ~ label, input:valid ~ label {
 transform: translateY(-50%) scale(0.8);
 background-color:#fff;
 z-index: 9999;
 padding: 0 .2em;
 color:#000;
   font-size: 1.2em;
}
/* Optional input - default when empty */
.input.optional:placeholder-shown {
  border: 1.5px solid #cbcbcb;
}

.input.optional:placeholder-shown ~ .user-label {
  transform: translateY(1rem);
  background-color: transparent;
  z-index: auto;
  padding: 0;
  color: #666; /* default label color */
  font-size: 1em;
}

/* Optional input - when focused or typed into */
.input.optional:focus,
.input.optional:not(:placeholder-shown) {
  border: 2px solid #000;
}

.input.optional:focus ~ .user-label,
.input.optional:not(:placeholder-shown) ~ .user-label {
  transform: translateY(-50%) scale(0.8);
  background-color: #fff;
  z-index: 9999;
  padding: 0 .2em;
  color: #000;
  font-size: 1.2em;
}


/* .form-control{
  background:transparent;
} */
.form-control:focus{
  box-shadow:none;
}

.bg-lightgraay{
  background: #f5f5f5;
}
.payment-info{
      max-width: 385px;
}
.paynow-btn{
      background: #000000;
      color:#fff;
      font-weight:600;
}
.paynow-btn:hover{
   background: #ff9603;
}
.payment-header{
  border: 1px solid #000;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  border-top-right-radius:7px !important;
  border-top-left-radius: 7px;
}
.payment-icons{
    display: flex;
    gap: 4px;
    align-items: center;
    justify-content: end;
    flex-wrap: wrap;
}
.payment-icons span{
     background: #fff;
    border: 1px solid #e3e3e3;
    border-radius: 5px;
    padding: 0px 5px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
        font-weight: 500;
}
#razorpay_express_info{
  height: auto;overflow: visible;border: 1px solid #c1c1c1; border-top: none;border-bottom-left-radius: 7px;
    border-bottom-right-radius: 7px;
}
.text-sub{
      color: slategray;
}
.price-point{
  font-size:1.3em;
}
.billing-choice{
    padding: 15px;
    border: 1px solid #cbcbcb;
    cursor: pointer;
}
.form-check-input:checked {
    background-color: #000000;
    border-color: #000000;
}
.billing-choice:first-child {
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
}
.billing-choice:last-child {
    border-bottom-right-radius: 7px;
    border-bottom-left-radius: 7px;
}
.list-group-item{
    border-radius: 7px;
}
.list-group-item+.list-group-item {
    border-top-width: 1px;
}
.billing-choice:has(input[type="radio"]:checked) {
  background: #f5f5f5;
  border: 1px solid #000;
}
.billing-section{
    background: #f5f5f5;
    border-bottom-left-radius: 7px;
    border-bottom-right-radius: 7px;
    display: none;
}
.secure-text{
      letter-spacing: 3px;
          font-size: 12px;
}

.tooltip-icon {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  font-weight: bold;
  cursor: pointer;
  border-radius: 50%;
  width: 18px;
  height: 18px;
  text-align: center;
  line-height: 18px;
}

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
          .border-right{
            border-right: 1px solid #dedede;
          }
        }
    </style>
  </head>
  <body>
    
<!-- Loader -->
<div id="checkout-loader" 
     style="position: fixed; top:0; left:0; width:100%; height:100%; background:#fff; display:flex; justify-content:center; align-items:center; z-index:9999;">
    <img src="{{ asset('images/loader.gif') }}" alt="Loading..." width="60">
</div>
  <main>
    <div class="header-checkout text-center py-3 bg-white">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6 text-start">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{asset('images/logo.png')}}" alt></a>
          </div>
          <div class="col-6 col-md-6 text-end">
            <span class="secure-badge"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#26d155" d="M22 3.94L12 .44L2 3.94V12c0 4.127 2.534 7.012 4.896 8.803a19.8 19.8 0 0 0 4.65 2.595q.17.064.342.122l.112.04l.114-.04a14 14 0 0 0 .65-.244a19.7 19.7 0 0 0 4.34-2.473C19.467 19.012 22 16.127 22 12zM11.001 15.415L6.76 11.172l1.414-1.415l2.828 2.829l5.657-5.657l1.415 1.414z"/></svg></span>
            <span class="secure-text">100% SECURE</span>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container">
      <div class="row">
    
        <div class="col-md-6 col-lg-6 p-md-5 p-4 border-right">
          <div class="form-div">
            
            <form class="needs-validation" novalidate>

           
            <div class="row">
              <div class="col-6 col-md-6">
                 <h4 class="mb-3">Contact</h4>
              </div>
              <div class="col-6 col-md-6 text-end">
                <a href="javascript:void(0)" class="text-black">Sign In</a>
              </div>
            </div>

            
                <div class="col-12 mb-4">
                    <div class="input-group">
                      <input type="email" class="input form-control" id="email" name="email" autocomplete="off" required>
                      <label for="email" class="user-label">Email</label>
                      <div class="invalid-feedback">
                        Please enter a valid email address.
                      </div>
                    </div>

                    <div class="form-check mt-4">
                      <input type="checkbox" class="form-check-input" id="updates" name="updates" checked>
                      <span class="form-check-label" for="updates">
                        Keep me updated with the order updates and offers via WhatsApp, SMS and Email
                      </span>
                    </div>
                  </div>




            <h4 class="mb-3">Shipping & Delivery</h4>
              <div class="row g-3">
                <div class="col-sm-6">
                    <div class="input-group">
                     <input type="text" class="input form-control" id="firstName" name="firstName" autocomplete="off" value="" required>
                        <label class="user-label">First Name</label>
                        <div class="invalid-feedback">
                          Valid first name is required.
                         </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="input-group">
                     <input type="text" class="input form-control" id="lastName" name="lasttName" autocomplete="off" value="" required>
                        <label class="user-label">Last Name</label>
                        <div class="invalid-feedback">
                          Valid last name is required.
                         </div>
                    </div>
                </div>



                <div class="col-12">
                   <div class="input-group">
                     <input type="text" class="input form-control" id="address" name="address" autocomplete="off" value="" required>
                        <label class="user-label">Last Name</label>
                        <div class="invalid-feedback">
                           Please enter your shipping address.
                         </div>
                    </div>

                  
                </div>

                <div class="col-12">
                   <div class="input-group">
                     <input type="text" class="input form-control optional" id="address2" name="address-extra" autocomplete="off" value="" placeholder=" ">
                        <label class="user-label">Apartment, suite, etc. (optional)</label>
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="input-group">
                    <input type="text" class="input form-control"  id="city" name="city" autocomplete="off" required>
                    <label for="city" class="user-label">City</label>
                    <div class="invalid-feedback">
                      Please enter a valid city.
                    </div>
                  </div>
                </div>

       

                <div class="col-md-4">
                  <div class="input-group">
                    <select class="input form-control" id="state" name="state" required>
                      <option value="" disabled selected></option> <!-- placeholder -->
                      
                      <!-- A -->
                      <option value="Andhra Pradesh">Andhra Pradesh</option>
                      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                      <option value="Assam">Assam</option>

                      <!-- B -->
                      <option value="Bihar">Bihar</option>

                      <!-- C -->
                      <option value="Chhattisgarh">Chhattisgarh</option>

                      <!-- D -->
                      <option value="Delhi">Delhi</option>

                      <!-- G -->
                      <option value="Goa">Goa</option>
                      <option value="Gujarat">Gujarat</option>

                      <!-- H -->
                      <option value="Haryana">Haryana</option>
                      <option value="Himachal Pradesh">Himachal Pradesh</option>

                      <!-- J -->
                      <option value="Jharkhand">Jharkhand</option>
                      <option value="Jammu and Kashmir">Jammu and Kashmir</option>

                      <!-- K -->
                      <option value="Karnataka">Karnataka</option>
                      <option value="Kerala">Kerala</option>

                      <!-- L -->
                      <option value="Ladakh">Ladakh</option>

                      <!-- M -->
                      <option value="Madhya Pradesh">Madhya Pradesh</option>
                      <option value="Maharashtra">Maharashtra</option>
                      <option value="Manipur">Manipur</option>
                      <option value="Meghalaya">Meghalaya</option>
                      <option value="Mizoram">Mizoram</option>

                      <!-- N -->
                      <option value="Nagaland">Nagaland</option>

                      <!-- O -->
                      <option value="Odisha">Odisha</option>

                      <!-- P -->
                      <option value="Punjab">Punjab</option>
                      <option value="Puducherry">Puducherry</option>

                      <!-- R -->
                      <option value="Rajasthan">Rajasthan</option>

                      <!-- S -->
                      <option value="Sikkim">Sikkim</option>

                      <!-- T -->
                      <option value="Tamil Nadu">Tamil Nadu</option>
                      <option value="Telangana">Telangana</option>
                      <option value="Tripura">Tripura</option>

                      <!-- U -->
                      <option value="Uttar Pradesh">Uttar Pradesh</option>
                      <option value="Uttarakhand">Uttarakhand</option>

                      <!-- W -->
                      <option value="West Bengal">West Bengal</option>
                    </select>
                    <label for="state" class="user-label">State</label>
                    <div class="invalid-feedback">
                      Please provide a valid state.
                    </div>
                  </div>
                </div>




                <div class="col-md-4">
                  <div class="input-group">
                    <input type="text" class="input form-control" id="zip" name="zip" autocomplete="off" required>
                    <label for="zip" class="user-label">PIN Code</label>
                    <div class="invalid-feedback">
                      PIN code required.
                    </div>
                  </div>
                </div>

                   <div class="col-12">
                    <div class="input-group">
                      <input type="tel" class="input form-control" id="phone" name="phone" autocomplete="off" 
                            required pattern="[0-9]{10}" maxlength="10" >
                      <label for="phone" class="user-label">Phone</label>
                      <div class="invalid-feedback">
                        Please enter a valid 10-digit phone number.
                      </div>
                      <!-- Tooltip icon -->
                      <span class="tooltip-icon" data-bs-toggle="tooltip" title="In case we need to contact you about your order">
                       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12"><path fill="#7a7a7a" d="M5.82 3c-.328 0-.61.15-.74.508c-.094.26-.299.492-.575.492s-.5-.172-.5-.498c0-.825.946-1.5 1.82-1.5c1.19 0 2.04 1.12 1.76 2.26a1.83 1.83 0 0 1-.48.849l-.448.448a.5.5 0 0 0-.146.354v.586a.5.5 0 0 1-1 0v-.586c0-.398.158-.779.439-1.06l.448-.448a.82.82 0 0 0-.572-1.404zm.93 5.75a.75.75 0 1 1-1.5 0a.75.75 0 0 1 1.5 0"/><path fill="#7a7a7a" fill-rule="evenodd" d="M12 6c0 3.31-2.69 6-6 6S0 9.31 0 6s2.69-6 6-6s6 2.69 6 6m-1 0c0 2.76-2.24 5-5 5S1 8.76 1 6s2.24-5 5-5s5 2.24 5 5" clip-rule="evenodd"/></svg>
                      </span>
                    </div>
                   </div>

              </div>

            


           

         

              <!-- Billing Choice -->
            <div class="col-12 mt-4">
            <h4 class="mb-3">Billing address</h4>
            <div class="address-list">
             <div class="billing-choice" data-target="billing_same">
                <input type="radio" class="form-check-input me-3" name="billing_address_selector" id="billing_same" checked>
                <span for="billing_same">Same as shipping address</span>
              </div>

              <div class="billing-choice" data-target="billing_different">
                <input type="radio" class="form-check-input me-3" name="billing_address_selector" id="billing_different">
                <span for="billing_different">Use a different billing address</span>
              </div>
            </div>
          </div>
              <!-- Collapsible Billing Section -->
              <div id="billing_section" class="billing-section p-4">
                <div class="row g-3">
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input type="text" class="input form-control" id="billing_firstName" name="billing_firstName" autocomplete="off" required>
                      <label class="user-label" for="billing_firstName">First Name</label>
                      <div class="invalid-feedback">Valid first name is required.</div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="input-group">
                      <input type="text" class="input form-control" id="billing_lastName" name="billing_lastName" autocomplete="off" required>
                      <label class="user-label" for="billing_lastName">Last Name</label>
                      <div class="invalid-feedback">Valid last name is required.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group">
                      <input type="text" class="input form-control" id="billing_address1" name="billing_address1" autocomplete="off" required>
                      <label class="user-label" for="billing_address1">Address</label>
                      <div class="invalid-feedback">Please enter billing address.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group">
                      <input type="text" class="input form-control optional" id="billing_address2" name="billing_address2" autocomplete="off" placeholder=" ">
                      <label class="user-label" for="billing_address2">Apartment, suite, etc. (optional)</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="input-group">
                      <select class="input form-control" id="billing_state" name="billing_state" required>
                        <option value="" disabled selected></option> <!-- placeholder -->

                        <!-- A -->
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>

                        <!-- B -->
                        <option value="Bihar">Bihar</option>

                        <!-- C -->
                        <option value="Chhattisgarh">Chhattisgarh</option>

                        <!-- D -->
                        <option value="Delhi">Delhi</option>

                        <!-- G -->
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>

                        <!-- H -->
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>

                        <!-- J -->
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>

                        <!-- K -->
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>

                        <!-- L -->
                        <option value="Ladakh">Ladakh</option>

                        <!-- M -->
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>

                        <!-- N -->
                        <option value="Nagaland">Nagaland</option>

                        <!-- O -->
                        <option value="Odisha">Odisha</option>

                        <!-- P -->
                        <option value="Punjab">Punjab</option>
                        <option value="Puducherry">Puducherry</option>

                        <!-- R -->
                        <option value="Rajasthan">Rajasthan</option>

                        <!-- S -->
                        <option value="Sikkim">Sikkim</option>

                        <!-- T -->
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>

                        <!-- U -->
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>

                        <!-- W -->
                        <option value="West Bengal">West Bengal</option>
                      </select>
                      <label for="billing_state" class="user-label">State</label>
                      <div class="invalid-feedback">
                        Please provide a valid state.
                      </div>
                    </div>
                  </div>


                  <div class="col-md-4">
                    <div class="input-group">
                      <input type="text" class="input form-control" id="billing_city" name="billing_city" autocomplete="off" required>
                      <label class="user-label" for="billing_city">City</label>
                      <div class="invalid-feedback">Please enter a valid city.</div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="input-group">
                      <input type="text" class="input form-control" id="billing_zip" name="billing_zip" autocomplete="off" required>
                      <label class="user-label" for="billing_zip">PIN Code</label>
                      <div class="invalid-feedback">PIN code required.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group">
                      <input type="tel" class="input form-control optional" id="phone" name="billing_phone" autocomplete="off" placeholder=" " pattern="[0-9]{10}">
                      <label class="user-label" for="billing_phone">Phone (optional)</label>
                      <div class="invalid-feedback">Please enter a valid Phone Number.</div>
                          <!-- Tooltip icon -->
                        <span class="tooltip-icon" data-bs-toggle="tooltip" title="In case we need to contact you about your order">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12"><path fill="#7a7a7a" d="M5.82 3c-.328 0-.61.15-.74.508c-.094.26-.299.492-.575.492s-.5-.172-.5-.498c0-.825.946-1.5 1.82-1.5c1.19 0 2.04 1.12 1.76 2.26a1.83 1.83 0 0 1-.48.849l-.448.448a.5.5 0 0 0-.146.354v.586a.5.5 0 0 1-1 0v-.586c0-.398.158-.779.439-1.06l.448-.448a.82.82 0 0 0-.572-1.404zm.93 5.75a.75.75 0 1 1-1.5 0a.75.75 0 0 1 1.5 0"/><path fill="#7a7a7a" fill-rule="evenodd" d="M12 6c0 3.31-2.69 6-6 6S0 9.31 0 6s2.69-6 6-6s6 2.69 6 6m-1 0c0 2.76-2.24 5-5 5S1 8.76 1 6s2.24-5 5-5s5 2.24 5 5" clip-rule="evenodd"/></svg>
                        </span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="save-info">
                <label class="form-check-label" for="save-info">Save this information for next time</label>
              </div> -->

           

             
              <div class="col-12 my-4">
                 <h4 class="mb-2">Payment Method</h4>
                 <p class="text-sub">All transactions are secure and encrypted.</p>
                <div class="bg-lightgraay">

                  <!-- Razorpay Radio Option (Default Selected, Cannot Deselect) -->
                <div class="payment-header p-4">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="d-flex gap-3">
                        <input type="radio" class="form-check-input" id="razorpay_express" name="payment_method" checked readonly onclick="return false;">
                        <span for="razorpay_express" class="">
                          Razorpay Express Checkout (UPI,Cards,Wallets,NetBanking) </span>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                      <div class="payment-icons">
                          <span><img src="https://www.vectorlogo.zone/logos/upi/upi-ar21.svg" alt="Razorpay" width="50"></span>
                          <span><svg width="2em" height="2em" viewBox="0 -86.5 256 256" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                              <defs>
                                  <linearGradient x1="45.9741966%" y1="-2.00617467%" x2="54.8768726%" y2="100%" id="linearGradient-1">
                                      <stop stop-color="#222357" offset="0%"></stop>
                                      <stop stop-color="#254AA5" offset="100%"></stop>
                                  </linearGradient>
                              </defs>
                              <g>
                                  <path d="M132.397094,56.2397455 C132.251036,44.7242808 142.65954,38.2977599 150.500511,34.4772086 C158.556724,30.5567233 161.262627,28.0430004 161.231878,24.5376253 C161.17038,19.1719416 154.805357,16.804276 148.847757,16.7120293 C138.454628,16.5505975 132.412467,19.5178668 127.607952,21.7625368 L123.864273,4.24334875 C128.684163,2.02174043 137.609033,0.084559486 146.864453,-7.10542736e-15 C168.588553,-7.10542736e-15 182.802234,10.7236802 182.879107,27.3511501 C182.963666,48.4525854 153.69071,49.6210438 153.890577,59.05327 C153.959762,61.912918 156.688728,64.964747 162.669389,65.7411565 C165.628971,66.133205 173.800493,66.433007 183.0636,62.1665965 L186.699658,79.11693 C181.718335,80.931115 175.314876,82.6684285 167.343223,82.6684285 C146.895202,82.6684285 132.512402,71.798691 132.397094,56.2397455 M221.6381,81.2078555 C217.671491,81.2078555 214.327548,78.8940005 212.836226,75.342502 L181.802894,1.24533061 L203.511621,1.24533061 L207.831842,13.1835926 L234.360459,13.1835926 L236.866494,1.24533061 L256,1.24533061 L239.303345,81.2078555 L221.6381,81.2078555 M224.674554,59.6067505 L230.939643,29.5804456 L213.781755,29.5804456 L224.674554,59.6067505 M106.076031,81.2078555 L88.9642665,1.24533061 L109.650591,1.24533061 L126.754669,81.2078555 L106.076031,81.2078555 M75.473185,81.2078555 L53.941265,26.7822953 L45.2316377,73.059396 C44.2092367,78.2252115 40.1734431,81.2078555 35.6917903,81.2078555 L0.491982464,81.2078555 L0,78.886313 C7.22599245,77.318119 15.4359498,74.7890215 20.409585,72.083118 C23.4537265,70.4303645 24.322383,68.985166 25.3217224,65.0569935 L41.8185094,1.24533061 L63.68098,1.24533061 L97.1972855,81.2078555 L75.473185,81.2078555" fill="url(#linearGradient-1)" transform="translate(128.000000, 41.334214) scale(1, -1) translate(-128.000000, -41.334214) "></path>
                              </g>
                          </svg>
                          </span>
                          <span><svg width="2em" height="2em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <g fill="none" fill-rule="evenodd">
                                <circle cx="7" cy="12" r="7" fill="#EA001B"/>
                                <circle cx="17" cy="12" r="7" fill="#FFA200" fill-opacity=".8"/>
                              </g>
                            </svg>
                          </span>
                          <span>+10</span>
                        </div>
                    </div>
                  </div>
               </div>
                  <!-- Info Section Always Expanded -->
                  <div id="razorpay_express_info" class="text-center py-2 px-4">
                    <div class="payment-info m-auto">
                    <div class="mb-3">
                      <img class="img-fluid" src="{{asset('images/secure-payment.png')}}" alt="secure-payment">
                    </div>
                    <div class="payment-content">
                      <p>
                        After clicking “Pay now”, you will be redirected to Razorpay Payments (UPI,Cards,Wallets,NetBanking) to complete your purchase securely.
                      </p>
                    
                    </div>
                  </div>
                  </div>
                </div>
              </div>


         

              <button class="w-100 btn btn-lg paynow-btn" type="submit">Pay Now</button>
            </form>
          </div>
        </div>

        <div class="col-md-6 col-lg-6 order-md-last p-md-5 p-4">
          <div class="summary-box right-scroll">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-black">Your cart</span>
              <span class="badge bg-black rounded-pill cart-count-badge"></span>
            </h4>
            <ul class="list-group mb-3 checkout-cart-items gap-3">
            </ul>

            <li class="list-group-item d-flex justify-content-between price-point">
              <span><strong>Total (INR)</strong></span>
              <strong>₹<span class="checkout-total"></span></strong>
            </li>

          <!-- <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </form> -->
        </div>
    </div>

      </div>
    </div>
  </main>




    <script src="{{asset('js/jquery-min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <script>
    

    document.addEventListener('DOMContentLoaded', function() {

    

    const phoneInput = document.getElementById('phone');

    phoneInput.addEventListener('input', function() {
        // Remove any non-digit character
        this.value = this.value.replace(/\D/g, '');
    });

    // Existing Bootstrap validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
});

    </script>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const checkoutCartContainer = document.querySelector('.checkout-cart-items');
          const checkoutTotalEl = document.querySelector('.checkout-total');
          const loader = document.getElementById('checkout-loader');

          
          function showLoader() {
              loader.style.display = "flex";
          }

          function hideLoader() {
              loader.style.display = "none";
          }

          function renderCheckoutCart(cart, totalPrice) {
              checkoutCartContainer.innerHTML = '';

              if (!Array.isArray(cart)) cart = Object.values(cart);

              if (cart.length === 0) {
                  checkoutCartContainer.innerHTML = `
                      <li class="list-group-item text-center">Your cart is empty!</li>
                  `;
                  checkoutTotalEl.textContent = '0.00';
                   hideLoader();
                  return;
              }

              cart.forEach(item => {
                  let variantInfo = '';
                  if (item.size || item.color_name) {
                      let colorSpan = '';
                      if (item.color_hex) {
                          colorSpan = `<span style="background-color:${item.color_hex};display:inline-block;width:12px;height:12px;border-radius:50%;margin-left:5px;"></span>`;
                      }
                      variantInfo = `<small class="text-muted">` +
                          (item.size ? `Size: ${item.size}` : '') +
                          (item.size && item.color_name ? ' | ' : '') +
                          (item.color_name ? `Color: ${item.color_name} ${colorSpan}` : '') +
                          `</small>`;
                  }

                  const html = `
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center me-3 flex-grow-1">
                            <img src="${item.image}" alt="${item.name}" 
                                class="me-3" style="width:60px; height:60px; object-fit:cover; border-radius:6px;">
                            <div>
                                <h6 class="my-0">${item.name}</h6>
                                ${variantInfo}
                                <div class="d-flex align-items-center mt-1">
                                    <button class="btn btn-sm btn-outline-secondary qty-minus" data-key="${item.key}">-</button>
                                    <input type="text" value="${item.qty}" class="form-control form-control-sm text-center mx-2 qty" data-key="${item.key}" style="width:60px;" readonly>
                                    <button class="btn btn-sm btn-outline-secondary qty-plus" data-key="${item.key}">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="text-muted d-block">₹${(item.price * item.qty).toFixed(2)}</span>
                            <button class="btn btn-sm btn-danger remove-item mt-1" data-key="${item.key}">×</button>
                        </div>
                    </li>
                `;

                  checkoutCartContainer.insertAdjacentHTML('beforeend', html);
              });

              checkoutTotalEl.textContent = totalPrice.toFixed(2);

              // update badge with total quantity
          const cartBadge = document.querySelector('.cart-count-badge');
          if (cartBadge) {
              let totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
              cartBadge.textContent = totalQty;
          }

              attachCartEvents();
               hideLoader();
          }

          function attachCartEvents() {
              checkoutCartContainer.querySelectorAll('.qty-plus').forEach(btn => 
                  btn.onclick = () => updateQty(btn.dataset.key, 1)
              );
              checkoutCartContainer.querySelectorAll('.qty-minus').forEach(btn => 
                  btn.onclick = () => updateQty(btn.dataset.key, -1)
              );
              checkoutCartContainer.querySelectorAll('.remove-item').forEach(btn => 
                  btn.onclick = () => removeCartItem(btn.dataset.key)
              );
          }

          function updateQty(key, change) {
             showLoader();
              const input = checkoutCartContainer.querySelector(`.qty[data-key="${key}"]`);
              if (!input) return;

              let qty = parseInt(input.value) + change;
              if (qty < 1) qty = 1;

              fetch(`{{ url('/cart/update') }}/${key}`, {
                  method: 'POST',
                  headers: { 'Content-Type': 'application/json','X-CSRF-TOKEN': '{{ csrf_token() }}' },
                  body: JSON.stringify({ qty })
              })
              .then(res => res.json())
              .then(data => {
                  renderCheckoutCart(data.cart, data.totalPrice);
              });
          }

          function removeCartItem(key) {
            showLoader();
              fetch(`{{ url('/cart/remove') }}/${key}`, {
                  method: 'POST',
                  headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
              })
              .then(res => res.json())
              .then(data => {
                  renderCheckoutCart(data.cart, data.totalPrice);
              });
          }

          // Load initial cart
           showLoader();
          fetch(`{{ url('/cart/items') }}`)
              .then(res => res.json())
              .then(data => {
                  renderCheckoutCart(data.cart, data.totalPrice);
              });

          
      });
    </script>


<script>
document.addEventListener('DOMContentLoaded', function() {
  const billingSame = document.getElementById('billing_same');
  const billingDifferent = document.getElementById('billing_different');
  const billingSection = $("#billing_section"); // jQuery element

  function toggleBillingSection() {
    if (billingDifferent.checked) {
      billingSection.stop().slideDown(300);
    } else {
      billingSection.stop().slideUp(300);
    }
  }

  // Initial state
  toggleBillingSection();

  // Native radio change
  billingSame.addEventListener('change', toggleBillingSection);
  billingDifferent.addEventListener('change', toggleBillingSection);

  // Custom div click
  document.querySelectorAll('.billing-choice').forEach(choice => {
    choice.addEventListener('click', () => {
      // Unselect all
      document.querySelectorAll('.billing-choice').forEach(c => {
        c.classList.remove('active');
        c.querySelector('input[type="radio"]').checked = false;
      });

      // Select clicked one
      choice.classList.add('active');
      const input = choice.querySelector('input[type="radio"]');
      input.checked = true;

      // 🔑 Call toggle after setting checked
      toggleBillingSection();
    });
  });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
})
</script>


  </body>
</html>
