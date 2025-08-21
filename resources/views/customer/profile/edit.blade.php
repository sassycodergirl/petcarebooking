
   @include('customer.partials.dash-header')

<div class="container pt-5">
     <div class="content-wrapper">

        <h2>Edit Profile</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{ route('customer.profile.update') }}" method="POST">
                     @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="name" value="{{ old('name', $user->name) }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ old('email', $user->email) }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                      </div>
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input type="checkbox" class="form-check-input" required>
                          <a href="#">Remember me</a>
                          <i class="input-helper"></i></label>
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