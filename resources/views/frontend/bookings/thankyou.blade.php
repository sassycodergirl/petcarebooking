@include('partials.header')



<section class="banner inner-banner inner-banner-all">
        <div class="container">
            <div class="inner-bn-all">
               
                <h1>Thank You!</h1>
            </div>
        </div>
        <img src="{{ asset('images/dog-banner-img.png') }}" class="dog-banner-img" alt="">
        <img src="{{ asset('images/events-img-ovr.png') }}" class="events-img-ovr" alt="">
         <img src="{{ asset('images/about-banner.png') }}" class="events-banner-img about-banner" alt="">
        
    </section>

<div class="container py-5">
<div class="thank-you-page py-5">

  
   

    <!-- From Uiverse.io by akshat-patel28 --> 
    <div class="success-card">
        

        <div class="icon-container">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            width="3em" height="3em"
            viewBox="0 0 512 512"
            stroke-width="0"
            fill="currentColor"
            stroke="currentColor"
            class="icon"
            >
            <path
                d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"
            ></path>
            </svg>
        </div>
        <div class="message-text-container">
            <p class="message-text">Payment Done Sucessfully!</p>
            <p class="sub-text">Your booking Request sent successfully.</p>
        </div>
      
    </div>


    <!-- From Uiverse.io by PriyanshuGupta28 --> 
<div class="stepper-box">
  <div class="stepper-step stepper-completed">
    <div class="stepper-circle">
      <svg
        viewBox="0 0 16 16"
        class="bi bi-check-lg"
        fill="currentColor"
        height="16"
        width="16"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"
        ></path>
      </svg>
    </div>
    <div class="stepper-line"></div>
    <div class="stepper-content">
      <div class="stepper-title">Booking Request Submitted</div>
      <div class="stepper-status">Completed</div>
      <div class="stepper-time"> {{ $booking->created_at->timezone('Asia/Kolkata')->format('M d, h:i A') }}</div>
    </div>
  </div>

  <div class="stepper-step stepper-completed">
    <div class="stepper-circle">2</div>
    <div class="stepper-line"></div>
    <div class="stepper-content">
      <div class="stepper-title">Booking Request Details Sent on <strong>WhatsApp</strong></div>
      <div class="stepper-status">Completed</div>

    </div>
  </div>

  <div class="stepper-step stepper-pending">
    <div class="stepper-circle">3</div>
    <div class="stepper-content">
      <div class="stepper-title">Confirmation by Admin through WhatsApp</div>
      <div class="stepper-status">Pending</div>
      <div class="stepper-time">Estimated: 30 min</div>
    </div>
  </div>
<a href="{{ route('customer.dashboard') }}" class="btn btn-success">Go to Dashboard</a>
</div>

    
</div>

</div>

@include('partials.footer')