@include('customer.partials.dash-header')
<div class="container-fluid p-5">
    <h2 class="mb-4">Past Bookings</h2>

    @if($bookings->count() > 0)
    <div class="table-responsive">
       <table id="basic-datatables" class="table table-bordered table-hover display table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Booking Type</th>
                    <th>Location</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total Pets</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ ucfirst($booking->booking_type) }}</td>
                    <td>{{ $booking->location }}</td>
                    <td>{{ $booking->check_in->format('d M Y, h:i A') }}</td>
                    <td>{{ $booking->check_out->format('d M Y, h:i A') }}</td>
                    <td>{{ $booking->num_dogs + $booking->num_cats }}</td>
                    <td>₹{{ number_format($booking->total_price, 2) }}</td>
                    <td>
                        <span class="badge 
                            @if($booking->status === 'pending') bg-warning
                            @elseif($booking->status === 'approved') bg-success
                            @elseif($booking->status === 'cancelled') bg-danger
                            @elseif($booking->status === 'completed') bg-secondary
                            @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a data-bs-toggle="collapse" href="#pets-{{ $booking->id }}" role="button" aria-expanded="false" aria-controls="pets-{{ $booking->id }}">
                            Click Here
                        </a>
                    </td>
                </tr>
                {{-- Collapsible pet details --}}
                <tr class="collapse" id="pets-{{ $booking->id }}">
                    <td colspan="9">
                        <div class="p-3 bg-light">
                            <h5>Pet Details</h5>
                            @if(!empty($booking->extra_pet_details))
                            <div class="row">
                                @foreach($booking->extra_pet_details as $pet)
                                <div class="col-md-3 mb-3">
                                    <strong>Name:</strong> {{ $pet['name'] }}<br>
                                    <strong>Breed:</strong> {{ $pet['breed'] }}<br>
                                    <strong>Age:</strong> {{ $pet['age'] }}<br>
                                    <strong>Gender:</strong> {{ $pet['gender'] }}<br>
                                    <strong>Type:</strong> {{ $pet['type'] }}
                                </div>
                                @endforeach
                            </div>
                            @else
                            <p>No pets found.</p>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No past bookings found.</p>
    @endif
</div>
@include('customer.partials.dash-footer')