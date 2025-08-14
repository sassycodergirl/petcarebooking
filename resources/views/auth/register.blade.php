@extends('layouts.app')

@section('content')
<div class="container auth-content">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
               <!--  <div class="card-header">{{ __('Register') }}</div> -->
                <div class="row">
                  <div class="col-md-6 form-div p-0">
                    <div class="card-body py-5">
                      <div class="text-center">
                             <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" alt></a>
                        <form method="POST" action="{{ route('register') }}" class="mt-4">
                            @csrf

                            <div class="row mb-3">
                               

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Full Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email Address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Set New Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                               

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn submit-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div>
                                <p class="register-link">Already a member? <a href="{{ route('login') }}">Login Now</a></p>
                        </div>
                    </div>
                  </div>
                </div>
                  <div class="col-md-6 p-0 d-none d-md-block" style="background:#4a1a11;">
                        <div class="h-100">
                            <img class="img-fluid h-100" style="object-fit:contain" src="{{asset('images/register-image.webp')}}" alt="dog-cat">
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
