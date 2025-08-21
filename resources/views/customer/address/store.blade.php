   @include('customer.partials.dash-header')

<div class="container">
     <div class="content-wrapper">
        <h3>Edit Profile</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
     
            <div class="row">



            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Manage your saved addresses</h4>
                
                    <hr>
                    <h5>Add New Address</h5>
                    <form action="{{ route('customer.address.store') }}" method="POST">
                        @csrf
                        <div class="row">

                        
                        <div class="col-md-6">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-12">
                            <label>Address Line 1</label>
                            <input type="text" name="address_line1" class="form-control" placeholder="Address Line1">
                        </div>
                        <div class="col-md-12">
                            <label>Address Line 2</label>
                            <input type="text" name="address_line2" class="form-control" placeholder="Address Line1">
                        </div>
                        <div class="col-md-6">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" placeholder="City">
                        </div>
                        <div class="col-md-6">
                             <label>State</label>
                            <input type="text" name="state" class="form-control" placeholder="State">
                        </div>
                        <div class="col-md-6">
                             <label>Pincode</label>
                            <input type="text" name="pincode" class="form-control" placeholder="Pincode">
                        </div>
                        <div class="col-md-6">
                            <label>Type of Address</label>
                           <select name="type" class="form-control" required>
                                <option value="Home" {{ old('name') == 'Home' ? 'selected' : '' }}>Home</option>
                                <option value="Office" {{ old('name') == 'Office' ? 'selected' : '' }}>Office</option>
                                <option value="Other" {{ old('name') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        </div>
                        <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Add Address</button>
                        </div>
                    </form>

                    </div>
                </div>
             </div>


              <!--address details-->
             
            </div>
    </div>



</div>

  @include('customer.partials.dash-footer')