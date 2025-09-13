@include('partials.header')

<div class="container">
<div class="thank-you-page">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" viewBox="0 0 16 16"><path fill="#37a722" d="M11.4 6.85a.5.5 0 0 0-.707-.707l-3.65 3.65l-1.65-1.65a.5.5 0 0 0-.707.707l2 2a.5.5 0 0 0 .707 0l4-4z"/><path fill="#37a722" fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8s3.58 8 8 8s8-3.58 8-8s-3.58-8-8-8M1 8c0-3.87 3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7s-7-3.13-7-7" clip-rule="evenodd"/></svg>
    </div>
    <h1>Thank You!</h1>
    <p>Your booking Request sent successfully and is currently <strong>pending approval</strong>.</p>
    <p>You will receive updates on <strong>WhatsApp</strong>.  
       Once approved by admin, you will receive a confirmation message.</p>

    <div class="booking-info">
        <h3>Booking Details:</h3>
        <ul>
            <li><strong>Booking ID:</strong> {{ $booking->id }}</li>
            <li><strong>Pet Name:</strong> {{ $booking->pet->name ?? '-' }}</li>
            <li><strong>Date:</strong> {{ $booking->date ?? '-' }}</li>
            <li><strong>Status:</strong> Pending</li>
        </ul>
    </div>

    <a href="{{ route('home') }}" class="btn btn-primary">Go to Homepage</a>
</div>

</div>

@include('partials.footer')