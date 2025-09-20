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

   
.input-group {
 position: relative;
}
.input-group select.input {
  appearance: none; /* remove default arrow for styling */
  background: none;
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
 border: solid 1.5px #8b8b8b;
 border-radius: 8px !important;
 background: none;
 padding: 0.8rem;
 font-size: 1.2rem;
 color: #000;
 transition: border 150ms cubic-bezier(0.4,0,0.2,1);
 width: 100%;
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
  border: 1.5px solid #8b8b8b;
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


.form-control{
  background:transparent;
}
.form-control:focus{
  box-shadow:none;
}

.bg-lightgraay{
  background: #f5f5f5;
}
.payment-info{
      max-width: 350px;
}
.paynow-btn{
      background: #000000;
      color:#fff;
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
    gap: 10px;
    align-items: center;
    justify-content: end;
    flex-wrap: wrap;
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
    

  <main>
    <div class="header-checkout text-center py-3 bg-white">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6 text-start">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{asset('images/logo.png')}}" alt></a>
          </div>
          <div class="col-6 col-md-6 text-end">
            <a href="#" class="cart-btn">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512"><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16Zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32"/><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M160 224v16a96 96 0 0 0 96 96h0a96 96 0 0 0 96-96v-16"/></svg>
            </a>
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
                    </div>
                   </div>

              </div>

            


           

         

              <!-- Billing Choice -->
            <div class="col-12 my-4">
            <h4 class="mb-3">Billing address</h4>
              <div class="billing-choice">
                <label>
                  <input type="radio" class="form-check-input" name="billing_address_selector" id="billing_same" checked>
                  <span class="">Same as shipping address</span>
                </label>
              </div>
              <div class="billing-choice">
                <label class="mt-2">
                  <input type="radio" class="form-check-input" name="billing_address_selector" id="billing_different">
                  <span class="">Use a different billing address</span>
                </label>
              </div>
            </div>

              <!-- Collapsible Billing Section -->
              <div id="billing_section" class="billing-section" style="overflow: hidden; max-height: 0; transition: max-height 0.4s ease;">
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
                      <input type="tel" class="input form-control" id="phone" name="billing_phone" autocomplete="off" required pattern="[0-9]{10}">
                      <label class="user-label" for="billing_phone">Phone</label>
                      <div class="invalid-feedback">Please enter a valid Phone Number.</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="save-info">
                <label class="form-check-label" for="save-info">Save this information for next time</label>
              </div> -->

           

             
              <div class="col-12 my-4">
                 <h4 class="mb-3">Payment</h4>
                <div class="bg-lightgraay">

                  <!-- Razorpay Radio Option (Default Selected, Cannot Deselect) -->
                <div class="payment-header p-4">
                  <div class="row">
                    <div class="col-6 col-md-6">
                      <div class="d-flex gap-3">
                        <input type="radio" class="form-check-input" id="razorpay_express" name="payment_method" checked readonly onclick="return false;">
                        <span for="razorpay_express" class="">
                          Razorpay Express Checkout (UPI,Cards,Wallets,NetBanking) </span>
                      </div>
                    </div>
                    <div class="col-6 col-md-6">
                      <div class="payment-icons">
                          <span><img src="https://www.vectorlogo.zone/logos/upi/upi-ar21.svg" alt="Razorpay" width="50"></span>
                          <span><svg height="2em" width="2em"
                              xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                              xmlns:dc="http://purl.org/dc/elements/1.1/"
                              xmlns:cc="http://creativecommons.org/ns#"
                              xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                              xmlns:svg="http://www.w3.org/2000/svg"
                              xmlns="http://www.w3.org/2000/svg"
                              xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                              xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                              version="1.1"
                              id="Layer_1"
                              x="0px"
                              y="0px"
                              width="800px"
                              height="800px"
                              viewBox="0 0 750 471"
                              enable-background="new 0 0 750 471"
                              xml:space="preserve"
                              sodipodi:docname="visa.svg"
                              inkscape:version="0.92.2 5c3e80d, 2017-08-06">

                            <metadata
                                id="metadata4882">

                            <rdf:RDF>

                            <cc:Work
                                    rdf:about="">

                            <dc:format>image/svg+xml</dc:format>

                            <dc:type
                                      rdf:resource="http://purl.org/dc/dcmitype/StillImage" />

                            </cc:Work>

                            </rdf:RDF>

                            </metadata>

                            <defs
                                id="defs4880" />

                            <sodipodi:namedview
                                pagecolor="#ffffff"
                                bordercolor="#666666"
                                borderopacity="1"
                                objecttolerance="10"
                                gridtolerance="10"
                                guidetolerance="10"
                                inkscape:pageopacity="0"
                                inkscape:pageshadow="2"
                                inkscape:window-width="1428"
                                inkscape:window-height="869"
                                id="namedview4878"
                                showgrid="false"
                                inkscape:zoom="0.384"
                                inkscape:cx="83.333333"
                                inkscape:cy="235.5"
                                inkscape:window-x="164"
                                inkscape:window-y="478"
                                inkscape:window-maximized="0"
                                inkscape:current-layer="Layer_1" />

                            <title
                                id="title4867">Slice 1</title>

                            <desc
                                id="desc4869">Created with Sketch.</desc>

                            <g
                                id="visa"
                                sketch:type="MSLayerGroup">

                            <path
                                  id="Shape"
                                  sketch:type="MSShapeGroup"
                                  fill="#0E4595"
                                  d="M278.198,334.228l33.36-195.763h53.358l-33.384,195.763H278.198   L278.198,334.228z" />

                            <path
                                  id="path13"
                                  sketch:type="MSShapeGroup"
                                  fill="#0E4595"
                                  d="M524.307,142.687c-10.57-3.966-27.135-8.222-47.822-8.222   c-52.725,0-89.863,26.551-90.18,64.604c-0.297,28.129,26.514,43.821,46.754,53.185c20.77,9.597,27.752,15.716,27.652,24.283   c-0.133,13.123-16.586,19.116-31.924,19.116c-21.355,0-32.701-2.967-50.225-10.274l-6.877-3.112l-7.488,43.823   c12.463,5.466,35.508,10.199,59.438,10.445c56.09,0,92.502-26.248,92.916-66.884c0.199-22.27-14.016-39.216-44.801-53.188   c-18.65-9.056-30.072-15.099-29.951-24.269c0-8.137,9.668-16.838,30.559-16.838c17.447-0.271,30.088,3.534,39.936,7.5l4.781,2.259   L524.307,142.687" />

                            <path
                                  id="Path"
                                  sketch:type="MSShapeGroup"
                                  fill="#0E4595"
                                  d="M661.615,138.464h-41.23c-12.773,0-22.332,3.486-27.941,16.234   l-79.244,179.402h56.031c0,0,9.16-24.121,11.232-29.418c6.123,0,60.555,0.084,68.336,0.084c1.596,6.854,6.492,29.334,6.492,29.334   h49.512L661.615,138.464L661.615,138.464z M596.198,264.872c4.414-11.279,21.26-54.724,21.26-54.724   c-0.314,0.521,4.381-11.334,7.074-18.684l3.607,16.878c0,0,10.217,46.729,12.352,56.527h-44.293V264.872L596.198,264.872z" />

                            <path
                                  d="M 45.878906 138.46484 L 45.197266 142.53711 C 66.290228 147.64311 85.129273 155.0333 101.62305 164.22656 L 148.96875 333.91406 L 205.42383 333.85156 L 289.42773 138.46484 L 232.90234 138.46484 L 180.66406 271.96094 L 175.09961 244.83008 C 174.83893 243.99185 174.55554 243.15215 174.26562 242.31055 L 156.10547 154.99219 C 152.87647 142.59619 143.50892 138.89684 131.91992 138.46484 L 45.878906 138.46484 z "
                                  id="path16"
                                  style="fill:#0e4595;fill-opacity:1" />

                            </g>

                            </svg></span>
                          <img src="https://cdn.razorpay.com/assets/mastercard.svg" alt="MasterCard" width="38">
                          <img src="https://cdn.razorpay.com/assets/upi.svg" alt="UPI" width="38">
                        </div>
                    </div>
                  </div>
               </div>
                  <!-- Info Section Always Expanded -->
                  <div id="razorpay_express_info" class="payment-info text-center py-2 m-auto" style="height: auto; overflow: visible;">
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


         

              <button class="w-100 btn btn-lg paynow-btn" type="submit">Pay Now</button>
            </form>
          </div>
        </div>

        <div class="col-md-6 col-lg-6 order-md-last p-md-5 p-4">
          <div class="summary-box">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Your cart</span>
              <span class="badge bg-primary rounded-pill cart-count-badge"></span>
            </h4>
            <ul class="list-group mb-3 checkout-cart-items">
            
              <!-- <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Third item</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$5</span>
              </li> -->
          
              <!-- <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$20</strong>
              </li> -->
            </ul>

            <li class="list-group-item d-flex justify-content-between">
              <span>Total (INR)</span>
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
    // (function () {
    //   'use strict'

    //   // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //   var forms = document.querySelectorAll('.needs-validation')

    //   // Loop over them and prevent submission
    //   Array.prototype.slice.call(forms)
    //     .forEach(function (form) {
    //       form.addEventListener('submit', function (event) {
    //         if (!form.checkValidity()) {
    //           event.preventDefault()
    //           event.stopPropagation()
    //         }

    //         form.classList.add('was-validated')
    //       }, false)
    //     })
    // })()

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

          function renderCheckoutCart(cart, totalPrice) {
              checkoutCartContainer.innerHTML = '';

              if (!Array.isArray(cart)) cart = Object.values(cart);

              if (cart.length === 0) {
                  checkoutCartContainer.innerHTML = `
                      <li class="list-group-item text-center">Your cart is empty!</li>
                  `;
                  checkoutTotalEl.textContent = '0.00';
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
                        <div class="d-flex align-items-start me-3 flex-grow-1">
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
  const billingSection = document.getElementById('billing_section');

  function toggleBillingSection() {
    if (billingDifferent.checked) {
      billingSection.style.maxHeight = billingSection.scrollHeight + "px";
    } else {
      billingSection.style.maxHeight = "0";
    }
  }

  billingSame.addEventListener('change', toggleBillingSection);
  billingDifferent.addEventListener('change', toggleBillingSection);
});
</script>

  </body>
</html>
