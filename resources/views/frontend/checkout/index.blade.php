<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
    <title>Checkout-Furry & Friends</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
     
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
    h1, .h1-heading, h2, h3, h4, h5, h6 {
    font-family: var(--default-heading-font);
    margin: 0 0 20px 0;
    font-weight: 700;
    padding: 0;
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
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">First name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>

                <div class="col-12">
                  <label for="username" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                  <div class="invalid-feedback">
                      Your username is required.
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                  <input type="email" class="form-control" id="email" placeholder="you@example.com">
                  <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                  </div>
                </div>

                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>

                <div class="col-12">
                  <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                  <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>

                <div class="col-md-5">
                  <label for="country" class="form-label">Country</label>
                  <select class="form-select" id="country" required>
                    <option value="">Choose...</option>
                    <option>United States</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="state" class="form-label">State</label>
                  <select class="form-select" id="state" required>
                    <option value="">Choose...</option>
                    <option>California</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="zip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="same-address">
                <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="save-info">
                <label class="form-check-label" for="save-info">Save this information for next time</label>
              </div>

              <hr class="my-4">

              <h4 class="mb-3">Payment</h4>

              <div class="my-3">
                <div class="form-check">
                  <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                  <label class="form-check-label" for="credit">Credit card</label>
                </div>
                <div class="form-check">
                  <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                  <label class="form-check-label" for="debit">Debit card</label>
                </div>
                <div class="form-check">
                  <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                  <label class="form-check-label" for="paypal">PayPal</label>
                </div>
              </div>

              <div class="row gy-3">
                <div class="col-md-6">
                  <label for="cc-name" class="form-label">Name on card</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="cc-number" class="form-label">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="cc-expiration" class="form-label">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="cc-cvv" class="form-label">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
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
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
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

  </body>
</html>
