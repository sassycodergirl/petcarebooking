    <footer class="footer">
          <div class="container-fluid d-flex justify-content-center">
          
            <div class="copyright">
              2025, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="https://coderbeans.com/">CoderBeans</a>
            </div>
           
          </div>
        </footer>
      </div>

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('admin/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('admin/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('admin/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('admin/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('admin/assets/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('admin/assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo.js') }}"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>

   <script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 10,
            "lengthChange": true
        });
    });
</script>



<script>
@if(isset($colors))
let colors = @json($colors);

// Start from existing variants count if editing
let variantIndex = {{ isset($product) ? $product->variants->count() : 0 }};

// ======= Add new variant row dynamically =======
function addVariant() {
    const tbody = document.querySelector('#variants-table tbody');

    let colorOptions = colors.map(c => `<option value="${c.id}">${c.name}</option>`).join('');

    tbody.insertAdjacentHTML('beforeend', `
        <tr>
            <td><input type="text" name="variants[${variantIndex}][size]" class="form-control"></td>
            <td>
              <select name="variants[${variantIndex}][color_id]" class="form-select">
                  <option value="">Select Color</option>
                  ${colorOptions}
              </select>
            </td>
            <td><input type="number" step="0.01" name="variants[${variantIndex}][price]" class="form-control"></td>
            <td><input type="number" name="variants[${variantIndex}][stock_quantity]" value="0" class="form-control"></td>
            <td>
                <input type="file" name="variants[${variantIndex}][image]" class="form-control variant-main-image-input" accept="image/*">
                <div class="variant-main-image-preview mt-2"></div>
            </td>
            <td>
                <input type="file" name="variants[${variantIndex}][gallery][]" class="form-control variant-gallery-input" accept="image/*" multiple>
                <div class="variant-gallery-preview d-flex flex-wrap mt-2"></div>
                <small class="form-text text-muted">You can upload multiple images.</small>
            </td>
            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeVariant(this)">Remove</button></td>
        </tr>
    `);

    variantIndex++;
}

function removeVariant(btn) {
    btn.closest('tr').remove();
}

// ======= Live preview for main variant image =======
// document.addEventListener('change', function(e) {
//     if (e.target.classList.contains('variant-main-image-input')) {
//         const input = e.target;
//         let previewContainer = input.closest('td').querySelector('.variant-main-image-preview');

//         // Remove previous preview
//         previewContainer.innerHTML = '';

//         if (input.files && input.files[0]) {
//             const reader = new FileReader();
//             reader.onload = function(ev) {
//                 const img = document.createElement('img');
//                 img.src = ev.target.result;
//                 img.style.width = '70px';
//                 img.style.height = '70px';
//                 img.style.objectFit = 'cover';
//                 img.classList.add('img-thumbnail');

//                 previewContainer.appendChild(img);
//             }
//             reader.readAsDataURL(input.files[0]);
//         }
//     }
// });
// Main variant image live preview with remove button
 document.addEventListener('change', function(e) {
        if (!e.target.classList.contains('variant-main-image-input')) return;

        const input = e.target;
        const previewContainer = input.closest('td').querySelector('.variant-main-image-preview');
        previewContainer.innerHTML = ''; // clear previous preview

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                const wrapper = document.createElement('div');
                wrapper.style.width = '70px';
                wrapper.style.height = '70px';
                wrapper.style.position = 'relative';
                wrapper.style.display = 'inline-block';
                
                const img = document.createElement('img');
                img.src = ev.target.result;
                img.style.width = '100%';
                img.style.height = '100%';
                img.style.objectFit = 'cover';
                img.classList.add('img-thumbnail');

                // Remove button for preview
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.innerText = '×';
                btn.classList.add('btn', 'btn-sm', 'btn-danger', 'p-1', 'position-absolute', 'top-0', 'end-0');
                btn.addEventListener('click', function() {
                    wrapper.remove();
                    input.value = ''; // reset input so user can re-upload
                });

                wrapper.appendChild(img);
                wrapper.appendChild(btn);
                previewContainer.appendChild(wrapper);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

// ======= Live preview for gallery images =======
document.addEventListener('change', function(e) {
    if (!e.target.classList.contains('variant-gallery-input')) return;

    const input = e.target;
    let previewContainer = input.closest('td').querySelector('.variant-gallery-preview');

    Array.from(input.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(ev) {
            const wrapper = document.createElement('div');
            wrapper.style.width = '70px';
            wrapper.style.height = '70px';
            wrapper.style.marginRight = '5px';
            wrapper.style.marginBottom = '5px';
            wrapper.style.position = 'relative';
            wrapper.classList.add('new-variant-image-wrapper');

            const img = document.createElement('img');
            img.src = ev.target.result;
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'cover';
            img.classList.add('img-thumbnail');

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.classList.add('btn', 'btn-sm', 'btn-danger', 'p-1', 'position-absolute', 'top-0', 'end-0');
            btn.innerText = '×';
            btn.addEventListener('click', () => wrapper.remove());

            wrapper.appendChild(img);
            wrapper.appendChild(btn);
            previewContainer.appendChild(wrapper);
        }
        reader.readAsDataURL(file);
    });
});

// ======= Remove existing gallery images =======
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.remove-variant-image').forEach(btn => {
        btn.addEventListener('click', function() {
            let wrapper = this.closest('.variant-image-wrapper');
            let imageId = wrapper.dataset.id;

            fetch(`{{ route('admin.variants.gallery.delete', ':id') }}`.replace(':id', imageId), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) wrapper.remove();
            })
            .catch(err => console.error(err));
        });
    });
});

// ======= Remove existing main variant image =======
document.querySelectorAll('.remove-main-variant-image').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        let wrapper = this.closest('.variant-main-image-wrapper');
        if (!wrapper) return;

        let variantId = wrapper.dataset.variantId;
        if (!variantId) return;

        let url = "{{ route('admin.variants.main-image.delete', ':id') }}".replace(':id', variantId);

        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
        })
        .then(res => res.json())
        .then(data => { if(data.success) wrapper.remove(); })
        .catch(err => console.error(err));
    });
});
@endif
</script>





<!--simple product-->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== Preview newly selected images =====
    const input = document.getElementById('product-gallery-input');
    const previewContainer = document.getElementById('product-gallery-preview');

    input.addEventListener('change', function() {
        // Clear previous preview if needed
        previewContainer.innerHTML = '';

        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const wrapper = document.createElement('div');
                wrapper.style.width = '100px';
                wrapper.style.height = '100px';
                wrapper.style.margin = '5px';
                wrapper.style.position = 'relative';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100%';
                img.style.height = '100%';
                img.style.objectFit = 'cover';
                img.classList.add('border', 'rounded');

                const btn = document.createElement('button');
                btn.type = 'button';
                btn.innerText = '×';
                btn.classList.add('btn', 'btn-sm', 'btn-danger', 'position-absolute', 'top-0', 'end-0');
                btn.addEventListener('click', () => {
                    wrapper.remove();
                    // Optional: remove file from input.files (advanced, requires FormData)
                });

                wrapper.appendChild(img);
                wrapper.appendChild(btn);
                previewContainer.appendChild(wrapper);
            }
            reader.readAsDataURL(file);
        });
    });

    // ===== Remove existing images =====
    document.querySelectorAll('.remove-existing-image').forEach(btn => {
        btn.addEventListener('click', function() {
            const wrapper = this.closest('.existing-image-wrapper');
            const imageId = wrapper.dataset.id;

            fetch(`{{ route('admin.products.gallery.delete', ':id') }}`.replace(':id', imageId), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) wrapper.remove();
            })
            .catch(err => console.error(err));
        });
    });
});
</script>


<!--simple product-->



<!--main product image-->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainInput = document.getElementById('main-product-image-input');
    const wrapper = document.querySelector('.main-product-image-wrapper');
    const img = wrapper.querySelector('.main-product-image');

    mainInput.addEventListener('change', function() {
        const file = this.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            img.style.display = 'block'; // Show image if it was hidden
        }
        reader.readAsDataURL(file);
    });

    // Optional: remove existing main image
    wrapper.querySelectorAll('.remove-main-product-image').forEach(btn => {
        btn.addEventListener('click', function() {
            img.src = '';
            img.style.display = 'none';
            mainInput.value = ''; // Clear input if needed
        });
    });
});

</script>


  </body>
</html>
