   @include('customer.partials.dash-header')
<div class="container">
    <div class="content-wrapper">
        <h3>Manage Addresses</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <!-- Add New Address Form -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Address</h4>
                        <form action="{{ route('customer.address.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="tel" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address Line 1</label>
                                <input type="text" name="address_line1" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address Line 2</label>
                                <input type="text" name="address_line2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Pincode</label>
                                <input type="text" name="pincode" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address Type</label>
                                <select name="type" class="form-control" required>
                                    <option value="Home">Home</option>
                                    <option value="Office">Office</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add Address</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- List of Saved Addresses -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Saved Addresses</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Pincode</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->addresses as $address)
                                    <tr>
                                        <td>{{ $address->name }}</td>
                                        <td>{{ $address->phone }}</td>
                                        <td>{{ $address->address_line1 }} {{ $address->address_line2 }}</td>
                                        <td>{{ $address->city }}</td>
                                        <td>{{ $address->state }}</td>
                                        <td>{{ $address->pincode }}</td>
                                        <td>{{ $address->type }}</td>
                                        <td>
                                            <a href="{{ route('customer.address.delete', $address->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if(Auth::user()->addresses->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No addresses found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

  @include('customer.partials.dash-footer')