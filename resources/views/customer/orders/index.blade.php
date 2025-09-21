@include('customer.partials.dash-header')


<div class="container-fluid p-5">
    <h2 class="mb-4">My Orders</h2>

    @if($orders->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Payment Method</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    <td>₹{{ number_format($order->total_amount, 2) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ ucfirst($order->payment_method) }}</td>
                    <td>
                        <a href="{{ route('customer.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                            View Details
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }} <!-- pagination links -->
    @else
        <p>You have not placed any orders yet.</p>
    @endif
</div>

@include('customer.partials.dash-footer')