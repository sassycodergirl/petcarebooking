@include('admin.partials.dash-header')
<div class="container-fluid">
    <h1 class="mb-4">Order #{{ $order->id }}</h1>

    <div class="card mb-4">
        <div class="card-header">Customer Info</div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->shippingAddress->name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $order->email ?? $order->user->email ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $order->shippingAddress->phone ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">Shipping Address</div>
        <div class="card-body">
            <p>{{ $order->shippingAddress->address_line1 ?? '' }} {{ $order->shippingAddress->address_line2 ?? '' }}</p>
            <p>{{ $order->shippingAddress->city }}, {{ $order->shippingAddress->state }} - {{ $order->shippingAddress->pincode }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">Billing Address</div>
        <div class="card-body">
            <p>{{ $order->billingAddress->address_line1 ?? '' }} {{ $order->billingAddress->address_line2 ?? '' }}</p>
            <p>{{ $order->billingAddress->city }}, {{ $order->billingAddress->state }} - {{ $order->billingAddress->pincode }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Order Items</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Variant</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->size ?? '' }} {{ $item->color ?? '' }}</td>
                        <td>₹{{ number_format($item->product_price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h5 class="mt-3">Total Amount: ₹{{ number_format($order->total_amount, 2) }}</h5>
            <p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>
            <p>Payment Method: <strong>{{ ucfirst($order->payment_method) }}</strong></p>
        </div>
    </div>
</div>


@include('admin.partials.dash-footer')