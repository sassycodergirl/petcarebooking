<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">
    <title>Furry & Friend</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <style>
        /* From Uiverse.io by gharsh11032000 */ 
        /* The switch - the box around the slider */
        .switch {
        font-size: 17px;
        position: relative;
        display: inline-block;
        width: 4.5em;
        height: 1.3em;
        }

        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* The slider */
        .slider {
        position: absolute;
        cursor: pointer;
        inset: 0;
        background: #9fccfa;
        border-radius: 50px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .slider:before {
        position: absolute;
        content: "";
        display: flex;
        align-items: center;
        justify-content: center;
        height: 2em;
        width: 2em;
        inset: 0;
        background: url('https://cdn.shopify.com/s/files/1/0280/4793/3485/files/vegsvg.svg?v=1733987732');
        background-size: contain;
        background-repeat: no-repeat;
        border-radius: 50px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.4);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);

        }

        .switch input:checked + .slider {
        background: #259425;
        }

        .switch input:focus + .slider {
        box-shadow: 0 0 1px #0974f1;
        }

        .switch input:checked + .slider:before {
        transform: translateX(2.6em);
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
                            <li><a href="#" class="cd-button"><img src="{{asset('images/card-icon.svg')}}" alt=""></a></li>
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