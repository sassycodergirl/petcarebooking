@include('admin.partials.dash-header')


<div class="container">
    <div class="dash-content card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Booking Details #{{ $booking->id }}</h4>
            <span class="badge bg-{{ $booking->status == 'pending' ? 'warning' : ($booking->status == 'approved' ? 'success' : 'danger') }}">
                {{ ucfirst($booking->status) }}
            </span>
        </div>

        <div class="card-body">
            {{-- Booking Info --}}
            <h5 class="mb-3">📌 Booking Info</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Location</th>
                    <td>{{ $booking->location }}</td>
                </tr>
                <tr>
                    <th>Booking Type</th>
                    <td>{{ ucfirst($booking->booking_type) }}</td>
                </tr>
                <tr>
                    <th>Check In</th>
                    <td>{{ $booking->check_in->format('d M Y, h:i A') }}</td>
                </tr>
                <tr>
                    <th>Check Out</th>
                    <td>{{ $booking->check_out->format('d M Y, h:i A') }}</td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>₹ {{ number_format($booking->total_price, 2) }}</td>
                </tr>
            </table>

            {{-- Owner Info --}}
            <h5 class="mt-4 mb-3">👤 Owner Info</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $booking->user->name }}</td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>{{ $booking->user->phone }}</td>
                </tr>
                <tr>
                    <th>Alt Contact</th>
                    <td>{{ $booking->user->alt_contact ?? '—' }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $booking->user->residential_address }}</td>
                </tr>
                <tr>
                    <th>Aadhar</th>
                    <td>
                        @if($booking->user->aadhar)
                           <a href="{{ asset('public/user/'.$booking->user->aadhar) }}" target="_blank">View Aadhar</a>
                        @else
                            —
                        @endif
                    </td>
                </tr>
            </table>

            {{-- Pets Info --}}
            <h5 class="mt-4 mb-3">🐾 Pets</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Breed</th>
                        <th>Age</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($booking->extra_pet_details as $pet)
                        <tr>
                            <td>{{ $pet['name'] }}</td>
                            <td>{{ ucfirst($pet['type']) }}</td>
                            <td>{{ $pet['breed'] }}</td>
                            <td>{{ $pet['age'] }}</td>
                            <td>{{ ucfirst($pet['gender']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Slots Info --}}
            <h5 class="mt-4 mb-3">📅 Slot Reservations</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($booking->reservations as $res)
                        <tr>
                            <td>{{ $booking->check_in->format('d M Y') }} - {{ $booking->check_out->format('d M Y') }}</td>
                            <td>{{ $res->slot->location }}</td>
                            <td>{{ ucfirst($res->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

           {{-- Admin Actions --}}
            <div class="mt-4">
                @if($booking->status == 'pending')
                    <form method="POST" action="{{ route('admin.bookings.approve', $booking->id) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>

                    <form method="POST" action="{{ route('admin.bookings.cancel', $booking->id) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger">Cancel</button>
                    </form>
                @elseif($booking->status == 'approved')
                    <form method="POST" action="{{ route('admin.bookings.complete', $booking->id) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-primary">Mark Completed</button>
                    </form>
                @endif

                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Back</a>
            </div>

        </div>
    </div>
</div>
@include('admin.partials.dash-footer')
