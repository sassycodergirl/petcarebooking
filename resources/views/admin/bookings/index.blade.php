@include('admin.partials.dash-header')


<div class="container">
    <div class="dash-content">
        <div class="page-header">
            <h4 class="page-title">All Bookings</h4>
        </div>

        <div class="card">
            <div class="card-body">
                @if($bookings->count())
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->user->name ?? 'Guest' }}</td>
                                        <td>{{ ucfirst($booking->booking_type) }}</td>
                                        <td>{{ $booking->location }}</td>
                                        <td>{{ $booking->check_in?->format('d M Y H:i') }}</td>
                                        <td>{{ $booking->check_out?->format('d M Y H:i') }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($booking->status == 'pending') bg-warning
                                                @elseif($booking->status == 'approved') bg-success
                                                @elseif($booking->status == 'cancelled') bg-danger
                                                @else bg-secondary
                                                @endif">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td>₹{{ number_format($booking->total_price, 2) }}</td>
                                        <td>{{ $booking->created_at->diffForHumans() }}</td>
                                       <td>
                                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">View</a>

                                            @if(in_array($booking->status, ['pending', 'approved']))
                                               
                                                @if($booking->status == 'pending')
                                                    <form method="POST" action="{{ route('admin.bookings.approve', $booking->id) }}" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Approve</button>
                                                    </form>
                                                @endif

                                              
                                              <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Are you sure you want to cancel this booking?');">
                                                    Cancel
                                                </button>
                                            </form>
                                            @endif

                                           
                                         
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $bookings->links() }}
                    </div>
                @else
                    <p class="text-muted">No bookings found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@include('admin.partials.dash-footer')
