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

<!-- FullCalendar (free), Bootstrap tooltips assumed available -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>


<style>
.fc-daycare-heavy .fc-event-main { background: rgba(17, 138, 178, 0.12) !important; }
.fc-boarding-heavy .fc-event-main {
    background: rgb(40 167 69) !important;padding: 7px;
}
.fc-mixed .fc-event-main { background: rgba(108,117,125,0.06) !important; }
</style>

<script>
    var baseBookingUrl = "{{ url('admin-furry-cms/bookings') }}";
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('booking-calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 'auto',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        // 🔹 Updated JSON feed route
        events: "{{ route('admin.bookings.booking-calendar.data') }}",
        eventClick: function(info) {
            var date = info.event.startStr;
            document.getElementById('modal-date').innerText = date;

            var tbody = document.getElementById('modal-bookings');
            tbody.innerHTML = '';

            var bookings = info.event.extendedProps.bookings || [];
            if (bookings.length === 0) {
                tbody.innerHTML = '<tr><td colspan="9" class="text-center">No bookings</td></tr>';
            } else {
               bookings.forEach(function(b) {
                // Count pets by type
                // var petCount = {};
                // if (b.pets && b.pets.length) {
                //     b.pets.forEach(function(p) {
                //         petCount[p.type] = (petCount[p.type] || 0) + 1;
                //     });
                // }

                // Build breakdown string
                // var pets = Object.entries(petCount).map(([type, count]) => `${count} ${type}${count > 1 ? 's' : ''}`).join(', ');
                // if (!pets) pets = '0';

                var statusBadge = '<span class="badge bg-' + (b.status === 'approved' ? 'success' : (b.status === 'pending' ? 'warning' : 'danger')) + '">' + b.status + '</span>';
                var petsSummary = `${b.total_pets} (Dogs: ${b.num_dogs}, Cats: ${b.num_cats})`;
                var options = { 
                    day: '2-digit', 
                    month: 'short', 
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true // ✅ 12-hour format with AM/PM
                };

                var checkIn = new Date(b.check_in).toLocaleString('en-GB', options);  
                var checkOut = new Date(b.check_out).toLocaleString('en-GB', options);
                tbody.innerHTML += `
                    <tr>
                        <td>${b.id}</td>
                        <td>${b.owner}</td>
                        <td>${b.type}</td>
                        <td>${checkIn}</td>
                        <td>${checkOut}</td>
                        <td>${petsSummary}</td>
                        <td>₹ ${b.price}</td>
                        <td>${statusBadge}</td>
                        <td>
                             <a href="${baseBookingUrl}/${b.id}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                `;
            });

            }

            var modal = new bootstrap.Modal(document.getElementById('bookingModal'));
            modal.show();
        },
        eventDidMount: function(info) {
            var tooltipText = info.event.title;
            new bootstrap.Tooltip(info.el, {
                title: tooltipText,
                placement: 'top',
                trigger: 'hover',
                container: 'body'
            });
        }
    });

    calendar.render();
});
</script>
