
@include('customer.partials.dash-header')

<div class="container-fluid">
     <div class="content-wrapper">
            <h2>Edit Pet</h2>

            <form action="{{ route('customer.pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">

                    <div class="col-12 col-md-4 form-group">
                        <label>Pet Name:</label>
                        <input type="text" name="name" value="{{ $pet->name }}" class="form-control" required>
                    </div>

                    <div class="col-12 col-md-4 form-group">
                        <label>Pet Type:</label>
                        <select name="type" id="edit-pet-type" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="Dog" {{ $pet->type == 'Dog' ? 'selected' : '' }}>Dog</option>
                            <option value="Cat" {{ $pet->type == 'Cat' ? 'selected' : '' }}>Cat</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4 form-group">
                        <label>Pet Breed:</label>
                        <select name="breed" id="edit-pet-breed" class="form-control">
                            <option value="">Select Breed</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4 form-group">
                        <label>Pet Age:</label>
                        <input type="number" name="age" value="{{ $pet->age }}" class="form-control">
                    </div>

                    <div class="col-12 col-md-4 form-group">
                        <label>Pet Gender:</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ $pet->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $pet->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4 form-group">
                        <label>Pet Weight (kg):</label>
                        <input type="number" step="0.1" name="weight" value="{{ $pet->weight }}" class="form-control">
                    </div>

                    <div class="col-12 col-md-6 form-group">
                        <label>Notes:</label>
                        <textarea name="notes" class="form-control">{{ $pet->notes }}</textarea>
                    </div>

                    <div class="col-12 col-md-6 form-group">
                        <label>Pet Image:</label>
                        <input type="file" name="image" id="edit-image" class="form-control" accept="image/*">
                        @if($pet->image)
                            <img id="edit-image-preview" src="{{ asset('public/' . $pet->image) }}" alt="{{ $pet->name }}" width="80" style="margin-top:10px;">
                        @else
                            <img id="edit-image-preview" src="#" alt="Preview" style="display:none; max-width:150px; margin-top:10px;">
                        @endif
                    </div>

                    <div class="col-12 col-md-6">
                        <button type="submit" class="btn btn-primary w-100">Update Pet Details</button>
                    </div>

                </div>
            </form>
</div>
</div>

 @include('customer.partials.dash-footer')


 <script>
const editBreedSelect = document.getElementById('edit-pet-breed');
const editTypeSelect = document.getElementById('edit-pet-type');

const editBreeds = {
    Dog: ["Labrador", "German Shepherd", "Beagle", "Bulldog", "Poodle"],
    Cat: ["Persian", "Siamese", "Maine Coon", "Ragdoll", "Sphynx"]
};

// Pass existing breed safely from Blade
const currentBreed = @json($pet->breed);

console.log('Current pet breed from Blade:', currentBreed);
console.log('Current pet type from Blade:', editTypeSelect.value);

function populateEditBreed(selectedType, selectedBreed = '') {
    editBreedSelect.innerHTML = '<option value="">Select Breed</option>';
    if (editBreeds[selectedType]) {
        editBreeds[selectedType].forEach(function(breed) {
            const option = document.createElement('option');
            option.value = breed;
            option.text = breed;
            if (breed === selectedBreed) {
                option.selected = true;
            }
            editBreedSelect.appendChild(option);
        });
    }
}


// Initial load: pre-select existing breed
populateEditBreed(editTypeSelect.value, currentBreed);

// Update breed options when type changes
editTypeSelect.addEventListener('change', function() {
    console.log('Type changed to:', this.value);
    populateEditBreed(this.value);
});
</script>


<script>
    const editImageInput = document.getElementById('edit-image');
    const editImagePreview = document.getElementById('edit-image-preview');

    editImageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                editImagePreview.src = e.target.result;
                editImagePreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>