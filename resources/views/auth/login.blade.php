@extends('layouts.app')

@section('content')
<div class="container auth-content">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 form-div p-0">
                        <!-- <div class="card-header ">{{ __('Login') }}</div> -->
                         
                       

                        <div class="card-body py-5">
                            <div class="text-center">
                             <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" alt></a>
                         </div>
                            <form method="POST" action="{{ route('login') }}" class="mt-4">
                                @csrf

                                <div class="row mb-3">
                                    <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn submit-btn">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>

                            <div>
                                <p class="register-link">Not a member? <a href="{{ route('register') }}">Register Now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 d-none d-md-block">
                        <div class="h-100">
                            <img class="img-fluid h-100 object-fit" src="{{asset('images/auth-image.webp')}}" alt="dog-cat">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
