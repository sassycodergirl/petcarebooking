<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
  
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout</title>


    

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<style>
    .container {
  max-width: 960px;
}

</style>

    <style>
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
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
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
          <strong>₹<span class="checkout-total">0.00</span></strong>
        </li>

        <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form> -->
      </div>
      <div class="col-md-7 col-lg-8">
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
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="{{asset('js/jquery-min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
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
                    <div class="me-3 flex-grow-1">
                        <h6 class="my-0">${item.name}</h6>
                        ${variantInfo}
                        <div class="d-flex align-items-center mt-1">
                            <button class="btn btn-sm btn-outline-secondary qty-minus" data-key="${item.key}">-</button>
                            <input type="text" value="${item.qty}" class="form-control form-control-sm text-center mx-2 qty" data-key="${item.key}" style="width:60px;" readonly>
                            <button class="btn btn-sm btn-outline-secondary qty-plus" data-key="${item.key}">+</button>
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
