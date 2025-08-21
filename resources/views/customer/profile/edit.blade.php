
   @include('customer.partials.dash-header')

<div class="container">
    <h2>Edit Profile</h2>

    <form method="POST" action="{{ route('customer.profile.update') }}">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}">
        </div>

        <div>
            <label>Phone:</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
        </div>

        <div>
            <label>Address:</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}">
        </div>

        <button type="submit">Update Profile</button>
    </form>
</div>

  @include('customer.partials.dash-footer')