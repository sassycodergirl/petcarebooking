@include('partials.header')



<section class="banner inner-banner inner-banner-all">
        <div class="container">
            <div class="inner-bn-all">
               
                <h1>Thank You!!</h1>
            </div>
        </div>
        <img src="{{ asset('images/dog-banner-img.png') }}" class="dog-banner-img" alt="">
        <img src="{{ asset('images/events-img-ovr.png') }}" class="events-img-ovr" alt="">
        <img src="{{ asset('images/success.png') }}" class="events-img-ovr" alt="">
        
    </section>

<div class="container py-5">
<div class="thank-you-page text-center py-5">

  
    <div>
        <h3><span class="me-3"> <svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" viewBox="0 0 16 16"><path fill="#37a722" d="M11.4 6.85a.5.5 0 0 0-.707-.707l-3.65 3.65l-1.65-1.65a.5.5 0 0 0-.707.707l2 2a.5.5 0 0 0 .707 0l4-4z"/><path fill="#37a722" fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8s3.58 8 8 8s8-3.58 8-8s-3.58-8-8-8M1 8c0-3.87 3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7s-7-3.13-7-7" clip-rule="evenodd"/></svg></span>Payment Done Sucessfully!</h3>
    </div>
    <div>
        <p>Your booking Request sent successfully and is currently <strong>pending approval</strong>.</p>
        <p>You will receive updates on <strong>WhatsApp</strong>.  
        Once approved by admin, you will receive a confirmation message.</p>
    </div>
    
   

    <div class="booking-info">
        <h3>Booking Details:</h3>
        <ul>
            <li><strong>Booking ID:</strong> {{ $booking->id }}</li>
            <li><strong>Check In:</strong> {{ $booking->check_in->format('d M Y, h:i A') }}</li>
            <li><strong>Check Out:</strong> {{ $booking->check_out->format('d M Y, h:i A') }}</li>
            <li><strong>Status:</strong> Pending</li>
        </ul>
    </div>

    <a href="{{ route('customer.dashboard') }}" class="btn btn-success">Go to Homepage</a>
</div>

</div>

@include('partials.footer')