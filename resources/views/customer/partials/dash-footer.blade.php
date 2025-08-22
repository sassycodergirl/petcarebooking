</div>


       <!-- partial:partials/_footer.html -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025.All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ms-1"></i>by <a href="https://coderbeans.com/">CoderBeans</a></span>
  </div>
</footer>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('customer/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('customer/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('customer/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="{{ asset('customer/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('customer/assets/js/dataTables.select.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('customer/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('customer/assets/js/template.js') }}"></script>
    <script src="{{ asset('customer/assets/js/settings.js') }}"></script>
    <script src="{{ asset('customer/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('customer/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('customer/assets/js/dashboard.js') }}"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->


     <script>
        const photoInput   = document.getElementById('photo');
        const photoPreview = document.getElementById('photoPreview');
        const removeBtn    = document.getElementById('removePhotoBtn');
        const removePhoto  = document.getElementById('removePhoto');

        // Preview selected image
        photoInput.addEventListener('change', function (event) {
            const [file] = event.target.files;
            if (file) {
                photoPreview.src = URL.createObjectURL(file);
                photoPreview.classList.remove('d-none');
                removeBtn.classList.remove('d-none');
                removePhoto.value = 0; // user uploaded new photo, not removing
                document.getElementById('noImageText').style.display = 'none';
            }
        });

        // Remove image (reset)
        removeBtn.addEventListener('click', function () {
            photoPreview.src = '';
            photoPreview.classList.add('d-none');
            photoInput.value = "";
            removePhoto.value = 1; // flag for backend to remove
            removeBtn.classList.add('d-none');
            document.getElementById('noImageText').style.display = 'block';
        });
</script>


<script>
    function toggleEdit(id) {
        const display = document.getElementById(`display-${id}`);
        const editForm = document.getElementById(`edit-${id}`);
        
        display.classList.toggle('d-none');
        editForm.classList.toggle('d-none');
    }
</script>


<script>
    document.getElementById('toggle-pet-form').addEventListener('click', function() {
        var form = document.getElementById('pet-form');
        if(form.style.display === 'none') {
            form.style.display = 'block';
            this.textContent = 'Hide Form';
        } else {
            form.style.display = 'none';
            this.textContent = 'Add New Pet';
        }
    });
</script>


<script>
    const imageInput = document.querySelector('input[name="image"]');
    const preview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.setAttribute("src", this.result);
                preview.style.display = "block";
            });

            reader.readAsDataURL(file);
        } else {
            preview.setAttribute("src", "#");
            preview.style.display = "none";
        }
    });
</script>

<script>
    const breedSelect = document.getElementById('pet-breed');
    const typeSelect = document.getElementById('pet-type');

    const breeds = {
        Dog: ["Labrador", "German Shepherd", "Beagle", "Bulldog", "Poodle"],
        Cat: ["Persian", "Siamese", "Maine Coon", "Ragdoll", "Sphynx"]
    };

    typeSelect.addEventListener('change', function() {
        const selectedType = this.value;
        breedSelect.innerHTML = '<option value="">Select Breed</option>'; // reset options

        if (breeds[selectedType]) {
            breeds[selectedType].forEach(function(breed) {
                const option = document.createElement('option');
                option.value = breed;
                option.text = breed;
                breedSelect.appendChild(option);
            });
        }
    });
</script>



<script>
const editBreedSelect = document.getElementById('edit-pet-breed');
const editTypeSelect = document.getElementById('edit-pet-type');

const breeds = {
    Dog: ["Labrador", "German Shepherd", "Beagle", "Bulldog", "Poodle"],
    Cat: ["Persian", "Siamese", "Maine Coon", "Ragdoll", "Sphynx"]
};

// Get the existing breed safely from Blade
const currentBreed = @json($pet->breed);

function populateEditBreed(selectedType, selectedBreed = '') {
    editBreedSelect.innerHTML = '<option value="">Select Breed</option>';
    if (breeds[selectedType]) {
        breeds[selectedType].forEach(function(breed) {
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
    populateEditBreed(this.value);
});
</script>



  </body>
</html>