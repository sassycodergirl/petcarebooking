@extends('layouts.app')

@section('title', 'Order Failed')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <div class="mb-4">
            <i class="bi bi-x-circle text-danger" style="font-size: 4rem;"></i>
        </div>
        <h2 class="text-danger mb-3">Order Failed</h2>
        <p class="lead">
            Unfortunately, your order could not be processed. <br>
            Please try again or contact our support team if the problem persists.
        </p>

        <div class="mt-4">
            <a href="{{ route('checkout.index') }}" class="btn btn-warning">
                Try Again
            </a>
            <a href="{{ route('shop.index') }}" class="btn btn-outline-primary ms-2">
                Continue Shopping
            </a>
           
        </div>
    </div>
</div>
@endsection
