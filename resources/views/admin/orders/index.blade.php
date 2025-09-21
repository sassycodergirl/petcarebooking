@include('admin.partials.dash-header')
<div class="container-fluid">
    <h1 class="mb-4">All Orders</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Placed At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
                <td>{{ $order->id }}</td>
                <td>{{ $order->email ?? $order->user->name ?? 'Guest' }}</td>
                <td>₹{{ number_format($order->total_amount, 2) }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>{{ ucfirst($order->payment_method) }}</td>
                <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                        View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No orders found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $orders->links() }}
    </div>
</div>

@include('admin.partials.dash-footer')
