<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
    <title>Furry & Friend</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <style>
.calender-box{
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
}
  #calendar { max-width: 100%; margin: 20px auto; }
  .fc-daygrid-day.fc-day-disabled { background-color:#f300168c !important; cursor: not-allowed !important; }
  .fc-day-selected { background-color: #007bff !important; color: white !important; }
  .summary-box { background: #f8f9fa; border: 1px solid #ddd; padding: 15px; border-radius: 8px; }
  .penalty-text { color: red; font-weight: bold; margin-bottom: 10px; }

  /* Smooth hide/show animation */
  .hidden-field { opacity: 0; max-height: 0; overflow: hidden; transition: opacity 0.5s ease, max-height 0.5s ease; }
  .hidden-field.show { opacity: 1; max-height: 200px; }
  .fc .fc-daygrid-day-frame {
        display: flex;
    justify-content: center;
    align-items: center;
  }
  .fc .fc-daygrid-day-number {
    text-decoration: none;
    color: #000;
    font-weight: 400;
    font-size: 18px;
  }
  .fc .fc-col-header-cell-cushion {
    text-decoration: none;
    color: saddlebrown;
  }
  .fc-scrollgrid-sync-inner{
    padding: 10px 0;
   }
   .step-1-wrapper .input-group {
         flex-wrap: unset;
   }
    .step-1-wrapper .input-group .btn{
        background: antiquewhite;
        color: #000;
        font-size: 21px;
        font-weight: bold;
    }
    .fc-scrollgrid-sync-table td{
        cursor: pointer;
    }

    .flatpickr-calendar {
    font-size: 14px !important;
}

.flatpickr-time input {
    font-size: 14px !important; 
}
</style>

<script>
window.addEventListener("load", function () {
  const cookieBox = document.querySelector(".cookie-card");
  const acceptBtn = document.querySelector(".acceptButton");
  const declineBtn = document.querySelector(".declineButton");

  // Check existing consent
  const consent = localStorage.getItem("cookieConsent");
  if (consent) {
    cookieBox.style.display = "none";
    if (consent === "accepted") {
      loadAnalytics();
    }
  } else {
    // Show cookie box after 2 seconds with fade-in
    setTimeout(() => {
      cookieBox.classList.add("show");
    }, 2000);
  }

  // Accept all cookies
  acceptBtn.addEventListener("click", function () {
    localStorage.setItem("cookieConsent", "accepted");
    cookieBox.style.display = "none";
    loadAnalytics();
  });

  // Decline cookies
  declineBtn.addEventListener("click", function () {
    localStorage.setItem("cookieConsent", "declined");
    cookieBox.style.display = "none";
    console.log("❌ Analytics disabled – only necessary cookies running.");
  });

  // Load Google Analytics & FB Pixel *only if accepted*
  function loadAnalytics() {
    console.log("✅ Loading Analytics & Facebook Pixel");
    // Google Analytics & FB Pixel code here...
  }
});
</script>


</head>

<body>

<div class="cookie-card card">
 <svg version="1.1" id="cookieSvg" x="0px" y="0px" viewBox="0 0 122.88 122.25" xml:space="preserve"><g><path d="M101.77,49.38c2.09,3.1,4.37,5.11,6.86,5.78c2.45,0.66,5.32,0.06,8.7-2.01c1.36-0.84,3.14-0.41,3.97,0.95 c0.28,0.46,0.42,0.96,0.43,1.47c0.13,1.4,0.21,2.82,0.24,4.26c0.03,1.46,0.02,2.91-0.05,4.35h0v0c0,0.13-0.01,0.26-0.03,0.38 c-0.91,16.72-8.47,31.51-20,41.93c-11.55,10.44-27.06,16.49-43.82,15.69v0.01h0c-0.13,0-0.26-0.01-0.38-0.03 c-16.72-0.91-31.51-8.47-41.93-20C5.31,90.61-0.73,75.1,0.07,58.34H0.07v0c0-0.13,0.01-0.26,0.03-0.38 C1,41.22,8.81,26.35,20.57,15.87C32.34,5.37,48.09-0.73,64.85,0.07V0.07h0c1.6,0,2.89,1.29,2.89,2.89c0,0.4-0.08,0.78-0.23,1.12 c-1.17,3.81-1.25,7.34-0.27,10.14c0.89,2.54,2.7,4.51,5.41,5.52c1.44,0.54,2.2,2.1,1.74,3.55l0.01,0 c-1.83,5.89-1.87,11.08-0.52,15.26c0.82,2.53,2.14,4.69,3.88,6.4c1.74,1.72,3.9,3,6.39,3.78c4.04,1.26,8.94,1.18,14.31-0.55 C99.73,47.78,101.08,48.3,101.77,49.38L101.77,49.38z M59.28,57.86c2.77,0,5.01,2.24,5.01,5.01c0,2.77-2.24,5.01-5.01,5.01 c-2.77,0-5.01-2.24-5.01-5.01C54.27,60.1,56.52,57.86,59.28,57.86L59.28,57.86z M37.56,78.49c3.37,0,6.11,2.73,6.11,6.11 s-2.73,6.11-6.11,6.11s-6.11-2.73-6.11-6.11S34.18,78.49,37.56,78.49L37.56,78.49z M50.72,31.75c2.65,0,4.79,2.14,4.79,4.79 c0,2.65-2.14,4.79-4.79,4.79c-2.65,0-4.79-2.14-4.79-4.79C45.93,33.89,48.08,31.75,50.72,31.75L50.72,31.75z M119.3,32.4 c1.98,0,3.58,1.6,3.58,3.58c0,1.98-1.6,3.58-3.58,3.58s-3.58-1.6-3.58-3.58C115.71,34.01,117.32,32.4,119.3,32.4L119.3,32.4z M93.62,22.91c2.98,0,5.39,2.41,5.39,5.39c0,2.98-2.41,5.39-5.39,5.39c-2.98,0-5.39-2.41-5.39-5.39 C88.23,25.33,90.64,22.91,93.62,22.91L93.62,22.91z M97.79,0.59c3.19,0,5.78,2.59,5.78,5.78c0,3.19-2.59,5.78-5.78,5.78 c-3.19,0-5.78-2.59-5.78-5.78C92.02,3.17,94.6,0.59,97.79,0.59L97.79,0.59z M76.73,80.63c4.43,0,8.03,3.59,8.03,8.03 c0,4.43-3.59,8.03-8.03,8.03s-8.03-3.59-8.03-8.03C68.7,84.22,72.29,80.63,76.73,80.63L76.73,80.63z M31.91,46.78 c4.8,0,8.69,3.89,8.69,8.69c0,4.8-3.89,8.69-8.69,8.69s-8.69-3.89-8.69-8.69C23.22,50.68,27.11,46.78,31.91,46.78L31.91,46.78z M107.13,60.74c-3.39-0.91-6.35-3.14-8.95-6.48c-5.78,1.52-11.16,1.41-15.76-0.02c-3.37-1.05-6.32-2.81-8.71-5.18 c-2.39-2.37-4.21-5.32-5.32-8.75c-1.51-4.66-1.69-10.2-0.18-16.32c-3.1-1.8-5.25-4.53-6.42-7.88c-1.06-3.05-1.28-6.59-0.61-10.35 C47.27,5.95,34.3,11.36,24.41,20.18C13.74,29.69,6.66,43.15,5.84,58.29l0,0.05v0h0l-0.01,0.13v0C5.07,73.72,10.55,87.82,20.02,98.3 c9.44,10.44,22.84,17.29,38,18.1l0.05,0h0v0l0.13,0.01h0c15.24,0.77,29.35-4.71,39.83-14.19c10.44-9.44,17.29-22.84,18.1-38l0-0.05 v0h0l0.01-0.13v0c0.07-1.34,0.09-2.64,0.06-3.91C112.98,61.34,109.96,61.51,107.13,60.74L107.13,60.74z M116.15,64.04L116.15,64.04 L116.15,64.04L116.15,64.04z M58.21,116.42L58.21,116.42L58.21,116.42L58.21,116.42z"></path></g></svg>
  <p class="cookieHeading">We use cookies.</p>
  <p class="cookieDescription mb-1">This website uses cookies to ensure you get the best experience on our site.</p>
  <p class="cookieDescription">By clicking “Accept all cookies”, you agree Furry & Friends can store cookies on your device and disclose information in accordance with our <a href="#">Cookie Policy.</a></p>

  <div class="buttonContainer">
    <button class="acceptButton">Accept All Cookies</button>
  <button class="declineButton">Decline</button>
  </div>
</div>

    <header class="main-head">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ route('index') }}"><img src="{{asset('images/logo.png')}}" alt></a>
                <button class="navbar-toggler navbar-toggler-main" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <span class="stick"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <button class="navbar-toggler navbar-toggler-main" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon"></span> -->
                        <span class="stick"></span>
                    </button>
                    <ul class="navbar-nav ms-auto">
                        <li class="current-menu-item"><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('shop.index') }}">Products</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('community') }}">Community</a></li>
                        <li><a href="{{ route('events') }}">Events</a></li>
                    </ul>
                    <div class="hdr-rgt-button hdr-rgt-button-none">
                        <a href="{{ route('booking') }}" class="cmn-btn" data-content="Book Day Care"><span>Book Day Care</span></a>
                    </div>
                </div>
                <div class="hdr-rgt">
                    <div class="hdr-rgt-icons">
                        <ul>
                            <li><a class="btn-opens" href="javascript:void(0)"><img src="{{asset('images/search.svg')}}" alt=""></a>
                                <span class="btn-closes"><i class="fa-solid fa-xmark"></i></span></li>
                            <li><a href="#" class="cd-button cart-btn"><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512"><circle cx="176" cy="416" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 80h64l48 272h256"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M160 288h249.44a8 8 0 0 0 7.85-6.43l28.8-144a8 8 0 0 0-7.85-9.57H128"/></svg><span class="cd-button-cart-count">{{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}</span></a></li>
                            <!-- <li><a href="{{ route('login') }}"><img src="{{asset('images/user.svg')}}" alt=""></a></li> -->
                            <li>
                              @if(Auth::check())
                                  <a href="{{ route('dashboard') }}">
                                      <img src="{{ asset('images/user.svg') }}" alt="User">
                                      Dashboard
                                  </a>
                              @else
                                   <img src="{{ asset('images/user.svg') }}" alt="Login"
                                    role="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#loginModal"
                                    style="cursor: pointer;">
                              @endif
                          </li>
                          </ul>
                    </div>
                    <div class="hdr-rgt-button">
                        <a href="{{ route('booking') }}" class="cmn-btn" data-content="Book Day Care"><span>Book Day Care</span></a>
                    </div>
                </div>
            </nav>
        </div>
        <button class="navbar-toggler" id="navoverlay" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"></button>

        <div class="search-form">
            <div class="container">
                <div class="search-form-wrap footer-form">
                    <input type="text" placeholder="Search Product...">
                    <button type="submit" class="cmn-btn"><img src="{{asset('images/search.svg')}}" alt=""></button>
                </div>
            </div>
        </div>
    </header>