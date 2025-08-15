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
      new DataTable('#basic-datatables');
    </script>



<!--product variable js-->
@if(isset($colors))
<script>
    let colors = @json($colors);
    let variantIndex = 0;

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
                <td><input type="file" name="variants[${variantIndex}][image]" class="form-control" accept="image/*"></td>
                <td><button type="button" class="btn btn-sm btn-danger" onclick="removeVariant(this)">Remove</button></td>
            </tr>
        `);
        variantIndex++;
    }

    function removeVariant(btn) {
        btn.closest('tr').remove();
    }
</script>
@endif
<!--product variable js-->


  </body>
</html>
