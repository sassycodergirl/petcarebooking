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
        <svg class="wave"  viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg">
            <path
            d="M0,256L11.4,240C22.9,224,46,192,69,192C91.4,192,114,224,137,234.7C160,245,183,235,206,213.3C228.6,192,251,160,274,149.3C297.1,139,320,149,343,181.3C365.7,213,389,267,411,282.7C434.3,299,457,277,480,250.7C502.9,224,526,192,549,181.3C571.4,171,594,181,617,208C640,235,663,277,686,256C708.6,235,731,149,754,122.7C777.1,96,800,128,823,165.3C845.7,203,869,245,891,224C914.3,203,937,117,960,112C982.9,107,1006,181,1029,197.3C1051.4,213,1074,171,1097,144C1120,117,1143,107,1166,133.3C1188.6,160,1211,224,1234,218.7C1257.1,213,1280,139,1303,133.3C1325.7,128,1349,192,1371,192C1394.3,192,1417,128,1429,96L1440,64L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,320,69,320C45.7,320,23,320,11,320L0,320Z"
            fill-opacity="1"
            ></path>
        </svg>

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

  <div class="stepper-step stepper-active">
    <div class="stepper-circle">2</div>
    <div class="stepper-line"></div>
    <div class="stepper-content">
      <div class="stepper-title">Booking Confirmation on <strong>WhatsApp</strong> with Pending Status</div>
      <div class="stepper-status">Pending Approval</div>

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

 
</div>

    <a href="{{ route('customer.dashboard') }}" class="btn btn-success">Go to Dashboard</a>
</div>

</div>

@include('partials.footer')