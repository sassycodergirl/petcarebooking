@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Email Verification Required</h2>
    <p>Please check your inbox for the verification link.</p>

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Resend Verification Email</button>
    </form>
</div>
@endsection
