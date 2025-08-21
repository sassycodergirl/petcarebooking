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
                                    <option value="Work">Office</option>
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

                        @foreach(Auth::user()->addresses as $address)
                            <div class="address-card mb-3 p-3 border rounded" id="address-{{ $address->id }}">
                                
                                <!-- Display Mode -->
                                <div class="address-display" id="display-{{ $address->id }}">
                                    <p><strong>Name:</strong> {{ $address->name }}</p>
                                    <p>
                                        {{ $address->address_line1 }}
                                        @if($address->address_line2), {{ $address->address_line2 }}@endif,
                                        {{ $address->city }}, {{ $address->state }} - {{ $address->pincode }}
                                    </p>
                                    @if($address->phone)
                                        <p>Phone: {{ $address->phone }}</p>
                                    @endif
                                    <p>Type of Address: {{ $address->type }}</p>
                                    <div class="mt-2 d-flex gap-2">
                                        <button type="button" class="btn btn-sm btn-primary" onclick="toggleEdit({{ $address->id }})">Edit</button>
                                        <a href="{{ route('customer.address.delete', $address->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </div>
                                </div>

                                <!-- Edit Mode -->
                                <form action="{{ route('customer.address.update', $address->id) }}" method="POST" class="address-edit d-none" id="edit-{{ $address->id }}">
                                    @csrf
                                    @method('PUT')

                                    <p>
                                        <input type="text" name="name" value="{{ $address->name }}" class="form-control mb-1" placeholder="Full Name" required>
                                        <input type="text" name="address_line1" value="{{ $address->address_line1 }}" class="form-control mb-1" required>
                                        <input type="text" name="address_line2" value="{{ $address->address_line2 }}" class="form-control mb-1">
                                        <input type="text" name="city" value="{{ $address->city }}" class="form-control mb-1" required>
                                        <input type="text" name="state" value="{{ $address->state }}" class="form-control mb-1" required>
                                        <input type="text" name="pincode" value="{{ $address->pincode }}" class="form-control mb-1" required>
                                    </p>

                                    <p>
                                        <input type="text" name="phone" value="{{ $address->phone }}" class="form-control mb-1" placeholder="Phone">
                                    </p>

                                    <p>
                                        <select name="type" class="form-control mb-1" required>
                                            <option value="Home" {{ $address->type=='Home' ? 'selected' : '' }}>Home</option>
                                            <option value="Office" {{ $address->type=='Office' ? 'selected' : '' }}>Office</option>
                                            <option value="Other" {{ $address->type=='Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </p>

                                    <div class="mt-2 d-flex gap-2">
                                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="toggleEdit({{ $address->id }})">Cancel</button>
                                    </div>
                                </form>

                            </div>
                        @endforeach

                        @if(Auth::user()->addresses->isEmpty())
                            <p class="text-center">No addresses found.</p>
                        @endif
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

  @include('customer.partials.dash-footer')