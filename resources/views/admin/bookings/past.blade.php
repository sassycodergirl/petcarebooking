
@include('admin.partials.dash-header')

<div class="container">
    <div class="dash-content card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Past Bookings</h4>
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary btn-sm">Back to All Bookings</a>
        </div>

        <div class="card-body">
            @if($bookings->count() > 0)
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Owner</th>
                            <th>Booking Type</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ ucfirst($booking->booking_type) }}</td>
                                <td>{{ $booking->check_in->format('d M Y') }}</td>
                                <td>{{ $booking->check_out->format('d M Y') }}</td>
                                <td>₹ {{ number_format($booking->total_price, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $booking->status == 'pending' ? 'warning' : ($booking->status == 'approved' ? 'success' : 'danger') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">View</a>
                                    @if($booking->status == 'approved')
                                        <form action="{{ route('admin.bookings.complete', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-primary">Mark Completed</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $bookings->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    No past bookings found.
                </div>
            @endif
        </div>
    </div>
</div>

@include('admin.partials.dash-footer')
