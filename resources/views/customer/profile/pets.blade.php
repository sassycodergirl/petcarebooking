
@include('customer.partials.dash-header')

<div class="container-fluid content-wrapper">
     <div class="">

     <button id="toggle-pet-form" class="btn btn-primary" style="margin-bottom: 10px;">Add New Pet</button>

     <div id="pet-form p-md-5 bg-white" style="display: none;">
        <form action="{{ route('customer.pets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-4 form-group">
                    <label>Pet Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Pet Name" required>
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>Pet Type(Dog/Cat):</label>
                    <input type="text" class="form-control" name="type" placeholder="Pet Type" required>
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>Pet Breed:</label>
                    <input type="text" class="form-control" name="breed" placeholder="Breed">
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>Pet Age:</label>
                    <input type="number" class="form-control" name="age" placeholder="Age">
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>Pet Gender:</label>
                    <select name="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-12 col-md-4 form-group">    
                    <label>Pet Weight (kg):</label>
                    <input type="number" class="form-control" step="0.1" name="weight" placeholder="Weight (kg)">
                </div>
                <div class="col-12 col-md-4 form-group">    
                    <label>Notes:</label>
                    <textarea name="notes" class="form-control" placeholder="Notes"></textarea>
                </div>
                <div class="col-12 col-md-4 form-group">      
                    <label>Upload Pet Image:</label>
                    <input type="file"  class="form-control" name="image" accept="image/*">
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>Pet Image Preview:</label>
                    <img id="image-preview" src="#" alt="Preview" style="display:none; max-width:150px; margin-top:10px;">
                </div>
            <button type="submit" class="btn btn-primary">Add Pet</button>
            </div>
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
