@include('customer.partials.dash-header')


<div class="container-fluid p-5">
    <h2 class="mb-4">Order #{{ $order->id }}</h2>
    
    <div class="mb-3">
        <strong>Date:</strong> {{ $order->created_at->format('d M Y H:i') }}<br>
        <strong>Status:</strong> 
        @php
            $statusClass = match($order->status) {
                'paid' => 'badge bg-success',
                'pending' => 'badge bg-warning text-dark',
                'failed' => 'badge bg-danger',
                default => 'badge bg-secondary',
            };
        @endphp
        <span class="{{ $statusClass }}">{{ ucfirst($order->status) }}</span>
        <strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}<br>
        <strong>Total Amount:</strong> ₹{{ number_format($order->total_amount, 2) }}
    </div>

    <h4>Order Items</h4>
    <table class="table table-bordered mb-4">
        <thead>
            <tr>
                <th>Product</th>
                <th>Variant</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>
                    @if($item->size) Size: {{ $item->size }} @endif
                    @if($item->color) Color: {{ $item->color }} @endif
                </td>
                <td>₹{{ number_format($item->product_price, 2) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->total_price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        @php
            $shipping = $order->addresses->firstWhere('type', 'shipping');
            $billing = $order->addresses->firstWhere('type', 'billing');
        @endphp

        <div class="col-md-6">
            <h4>Shipping Address</h4>
            <p>
                {{ $shipping->name }}<br>
                {{ $shipping->address_line1 }}<br>
                @if($shipping->address_line2) {{ $shipping->address_line2 }}<br> @endif
                {{ $shipping->city }}, {{ $shipping->state }} - {{ $shipping->pincode }}<br>
                {{ $shipping->country }}<br>
                Phone: {{ $shipping->phone }}
            </p>
        </div>

        <div class="col-md-6">
            <h4>Billing Address</h4>
            <p>
                {{ $billing->name }}<br>
                {{ $billing->address_line1 }}<br>
                @if($billing->address_line2) {{ $billing->address_line2 }}<br> @endif
                {{ $billing->city }}, {{ $billing->state }} - {{ $billing->pincode }}<br>
                {{ $billing->country }}<br>
                Phone: {{ $billing->phone }}
            </p>
        </div>
    </div>

    <a href="{{ route('customer.orders.index') }}" class="btn btn-secondary mt-4">Back to Orders</a>
</div>
@include('customer.partials.dash-footer')
