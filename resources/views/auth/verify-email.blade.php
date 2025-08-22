@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Verify Your Email</h1>
    <p>Please check your email and click on the verification link to activate your account.</p>

    @if(session('message'))
        <div class="mt-4 text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
        @csrf
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
            Resend Verification Email
        </button>
    </form>
</div>
@endsection
