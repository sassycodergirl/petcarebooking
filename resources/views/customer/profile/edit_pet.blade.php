
@include('customer.partials.dash-header')

<div class="container-fluid">
     <div class="content-wrapper">
            <h2>Edit Pet</h2>

            <form action="{{ route('pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="name" value="{{ $pet->name }}" required>
                <input type="text" name="type" value="{{ $pet->type }}" required>
                <input type="text" name="breed" value="{{ $pet->breed }}">
                <input type="number" name="age" value="{{ $pet->age }}">
                <select name="gender">
                    <option value="">Select Gender</option>
                    <option value="Male" {{ $pet->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $pet->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                <input type="number" step="0.1" name="weight" value="{{ $pet->weight }}">
                <textarea name="notes">{{ $pet->notes }}</textarea>
                <input type="file" name="image">
                @if($pet->image)
                    <img src="{{ asset($pet->image) }}" alt="{{ $pet->name }}" width="80">
                @endif
                <button type="submit">Update Pet</button>
            </form>
</div>
</div>

 @include('customer.partials.dash-footer')
