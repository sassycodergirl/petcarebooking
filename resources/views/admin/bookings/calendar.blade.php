@include('admin.partials.dash-header')

<div class="container my-3">
    <div class="dash-content card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Booking Calendar</h4>
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary btn-sm">Back to All Bookings</a>
        </div>

        <div class="card-body">
            <div id="booking-calendar"></div>
        </div>
    </div>
</div>

<!-- Modal: bookings for clicked date -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bookings for <span id="modal-date"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Owner</th>
                    <th>Type</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Pets</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="modal-bookings"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@include('admin.partials.dash-footer')

