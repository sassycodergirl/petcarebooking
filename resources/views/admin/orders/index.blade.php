@include('admin.partials.dash-header')



<div class="container">
    <h1 class="mb-4">Orders</h1>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Placed At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user?->name ?? 'Guest' }}</td>
                    <td>{{ $order->user->email ?? $order->email ?? null }}</td>
                    <td>{{ $order->user->phone ?? $order->phone ?? null }}</td>
                    <td>₹{{ number_format($order->total_amount, 2) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $orders->links() }}
</div>



@include('admin.partials.dash-footer')
