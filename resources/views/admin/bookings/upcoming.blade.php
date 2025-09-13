@include('admin.partials.dash-header')

<div class="container">
    <div class="dash-content card">
        <div class="card-header">
            <h4>📅 Upcoming Bookings</h4>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Owner</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->user->name }}</td>
                           <td>{{ $booking->check_in?->format('d M Y H:i') }}</td>
                            <td>{{ $booking->check_out?->format('d M Y H:i') }}</td>
                            <td>{{ $booking->location }}</td>
                            <td>
                                <span class="badge bg-{{ $booking->status == 'pending' ? 'warning' : ($booking->status == 'approved' ? 'success' : 'secondary') }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No upcoming bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>

@include('admin.partials.dash-footer')
