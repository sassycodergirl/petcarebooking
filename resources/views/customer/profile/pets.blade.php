
@include('customer.partials.dash-header')

<div class="container-fluid content-wrapper">
     <div class="">

     <button id="toggle-pet-form" style="margin-bottom: 10px;">Add New Pet</button>

     <div id="pet-form" style="display: none;">
        <form action="{{ route('customer.pets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Pet Name" required>
            <input type="text" name="type" placeholder="Pet Type" required>
            <input type="text" name="breed" placeholder="Breed">
            <input type="number" name="age" placeholder="Age">
            <select name="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input type="number" step="0.1" name="weight" placeholder="Weight (kg)">
            <textarea name="notes" placeholder="Notes"></textarea>
            <input type="file" name="image" accept="image/*">
            <button type="submit">Add Pet</button>
        </form>
    </div>



        <h2>My Pets</h2>
        @if(session('success'))
            <div style="color:green">{{ session('success') }}</div>
        @endif

        <!-- PET LIST -->
         <div class="table-responsive">
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Breed</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Weight</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pets as $pet)
                    <tr>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->type }}</td>
                        <td>{{ $pet->breed }}</td>
                        <td>{{ $pet->age }}</td>
                        <td>{{ $pet->gender }}</td>
                        <td>{{ $pet->weight }}</td>
                        <td>{{ $pet->notes }}</td>
                        <td>
                            <a href="{{ route('customer.pets.edit', $pet->id) }}">Edit</a>
                            <form action="{{ route('customer.pets.destroy', $pet->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8">No pets added yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

 

      
     </div>
</div>

 @include('customer.partials.dash-footer')
