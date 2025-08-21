
   @include('customer.partials.dash-header')

<div class="container">
     <div class="content-wrapper">
        <h3>Edit Profile</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
     
            <div class="row">
                <!--basic information-->
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                   
                  <div class="card-body">
                      <h4 class="mb-3">Basic Information</h4>
                    <form class="forms-sample" action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
                     @csrf

                        
                        <div class="form-group">
                            <label for="exampleInputUsername1">Full Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="tel" name="phone" placeholder="Phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="photo" class="form-label">Profile Photo</label>
                            <input type="file" name="profile_photo" id="photo" class="form-control" accept="image/*">

                            <!-- Image preview / message -->
                            <div class="mt-3 position-relative" style="display:inline-block;">
                                @if($user->profile_photo)
                                    <img id="photoPreview" 
                                        src="{{ asset('public/' .$user->profile_photo) }}" 
                                        alt="Profile Photo" 
                                        class="img-thumbnail" 
                                        width="150">

                                    <!-- Remove button -->
                                    <button type="button" id="removePhotoBtn" 
                                            class="btn btn-sm btn-danger position-absolute top-0 start-100 translate-middle">
                                        ×
                                    </button>
                                @else
                                    <p id="noImageText" class="text-muted">No image available</p>
                                    <img id="photoPreview" 
                                        src="" 
                                        alt="Profile Photo" 
                                        class="img-thumbnail d-none" 
                                        width="150">
                                    <button type="button" id="removePhotoBtn" 
                                            class="btn btn-sm btn-danger position-absolute top-0 start-100 translate-middle d-none">
                                        ×
                                    </button>
                                @endif
                            </div>

                            <!-- Hidden input to flag removal -->
                            <input type="hidden" name="remove_photo" id="removePhoto" value="0">
                        </div>

                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Notification Preference</label>
                            <select name="notification_preference" class="form-control">
                                <option value="email" {{ $user->notification_preference == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="sms" {{ $user->notification_preference == 'whatsapp' ? 'selected' : '' }}>Whatsapp</option>
                                <option value="both" {{ $user->notification_preference == 'both' ? 'selected' : '' }}>Both</option>
                                <option value="none" {{ $user->notification_preference == 'none' ? 'selected' : '' }}>None</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Confirm Password</label>
                            <input type="password" name="password_confirmation"  class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                        </div>

                       

                        
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
                <!--basic information-->
              <!--address details-->

             <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Your Addresses</h4>
                    <p class="card-description">Manage your saved addresses</p>

                    <table class="table table-bordered" id="addressesTable">
                        <thead>
                        <tr>
                            <th>Label</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Pincode</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($addresses as $address)
                        <tr>
                            <form action="{{ route('customer.address.update', $address->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td><input type="text" name="label" class="form-control" value="{{ $address->label }}"></td>
                            <td><input type="text" name="address" class="form-control" value="{{ $address->address }}"></td>
                            <td><input type="text" name="city" class="form-control" value="{{ $address->city }}"></td>
                            <td><input type="text" name="state" class="form-control" value="{{ $address->state }}"></td>
                            <td><input type="text" name="pincode" class="form-control" value="{{ $address->pincode }}"></td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                                <a href="{{ route('customer.address.delete', $address->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                            </form>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <hr>
                    <h5>Add New Address</h5>
                    <form action="{{ route('customer.address.store') }}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="col-md-2">
                            <input type="text" name="label" class="form-control" placeholder="Label">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="city" class="form-control" placeholder="City">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="state" class="form-control" placeholder="State">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="pincode" class="form-control" placeholder="Pincode">
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