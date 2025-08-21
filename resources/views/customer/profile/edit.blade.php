
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
                      <h4 class="mb-3">Basic Information</h4>
                    <form class="forms-sample" action="{{ route('customer.profile.update') }}" method="POST">
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
                            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">

                            <!-- Image preview / message -->
                            <div class="mt-3 position-relative" style="display:inline-block;">
                                @if($user->photo)
                                    <img id="photoPreview" 
                                        src="{{ asset($user->photo) }}" 
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
             
            </div>
    </div>



</div>

  @include('customer.partials.dash-footer')