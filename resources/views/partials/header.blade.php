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
  .step-1-wrapper{
        background: ghostwhite;
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
    font-weight: 600;
    font-size: 18px;
  }
  .fc .fc-col-header-cell-cushion {
    text-decoration: none;
    color: saddlebrown;
  }
  .fc-scrollgrid-sync-inner{
    padding: 10px 0;
   }
</style>
</head>

<body>

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
                            <li><a href="{{ route('login') }}"><img src="{{asset('images/user.svg')}}" alt=""></a></li>
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