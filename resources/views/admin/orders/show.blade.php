@include('admin.partials.dash-header')
<div class="container mt-4">
    <h1>Order #{{ $order->id }}</h1>

    <p><strong>Status:</strong> 
        <select id="order-status" class="form-select" style="width:auto; display:inline-block;">
            @foreach(['pending','confirmed','processing','completed','cancelled','failed'] as $status)
                <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        <span id="status-message" class="text-success ms-2"></span>
    </p>

    <hr>

    <h3>Customer Info</h3>
    <p><strong>Name:</strong> {{ $order->user->name ?? 'Guest' }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>

    <h3>Shipping Address</h3>
    @php
        $shipping = $order->addresses->where('type', 'shipping')->first();
    @endphp
    @if($shipping)
        <p>{{ $shipping->name }}</p>
        <p>{{ $shipping->address_line1 }} {{ $shipping->address_line2 }}</p>
        <p>{{ $shipping->city }}, {{ $shipping->state }} - {{ $shipping->pincode }}</p>
        <p>{{ $shipping->phone }}</p>
    @endif

    <h3>Billing Address</h3>
    @php
        $billing = $order->addresses->where('type', 'billing')->first();
    @endphp
    @if($billing)
        <p>{{ $billing->name }}</p>
        <p>{{ $billing->address_line1 }} {{ $billing->address_line2 }}</p>
        <p>{{ $billing->city }}, {{ $billing->state }} - {{ $billing->pincode }}</p>
        <p>{{ $billing->phone }}</p>
    @endif

    <h3>Items</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Variant</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->size ?? '' }} {{ $item->color ?? '' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->product_price, 2) }}</td>
                <td>₹{{ number_format($item->total_price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total Amount: ₹{{ number_format($order->total_amount, 2) }}</h4>
</div>

@include('admin.partials.dash-footer')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const statusDropdown = document.getElementById('order-status');
    const statusMessage = document.getElementById('status-message');

    // Function to set color based on status
    function updateDropdownColor(status) {
        if(['failed','cancelled'].includes(status)) {
            statusDropdown.style.color = 'red';
        } else if(status === 'completed') {
            statusDropdown.style.color = 'green';
        } else {
            statusDropdown.style.color = 'black';
        }
    }

    // Set initial color on page load
    updateDropdownColor(statusDropdown.value);

    statusDropdown.addEventListener('change', function() {
        const status = this.value;
        statusMessage.textContent = '';
        statusMessage.classList.remove('text-danger');
        
        fetch("{{ route('admin.orders.updateStatus', $order->id) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status: status })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                statusMessage.textContent = 'Updated!';
                updateDropdownColor(status);
                setTimeout(() => statusMessage.textContent = '', 2000);
            } else {
                statusMessage.textContent = 'Error updating status!';
                statusMessage.classList.add('text-danger');
            }
        })
        .catch(err => {
            console.error(err);
            statusMessage.textContent = 'Error updating status!';
            statusMessage.classList.add('text-danger');
        });
    });
});
</script>
