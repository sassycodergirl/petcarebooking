

<div class="container py-5 text-center">
    <div class="card shadow-lg p-5 rounded">
        <h1 class="text-success mb-4">🎉 Thank You for Your Order!</h1>
        <p class="lead">Your order has been placed successfully.</p>
        
        @if(isset($orderId))
            <p class="mt-3">Your <strong>Order ID</strong> is: 
                <span class="badge bg-primary fs-6">{{ $orderId }}</span>
            </p>
        @endif

        <div class="mt-4">
            <a href="{{ route('shop.index') }}" class="btn btn-outline-primary">
                Continue Shopping
            </a>
            <a href="{{ route('customer.dashboard') }}" class="btn btn-success ms-2">
                Go to Dashboard
            </a>
        </div>

    </div>
</div>

