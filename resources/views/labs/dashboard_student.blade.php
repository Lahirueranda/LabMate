@extends('layouts.app')

@section('Section')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="100" width="auto">
    </div>

    <!-- Navbar -->
    @include('layouts.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.main_sidebar')
    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid " style="    background-color: #d5d4d4!important;border-radius: 15px; padding: 10px;     width: 90%;">
          <div class="row">
            <section class="col-lg-8 mx-auto  connectedSortable">
              <div class="container">
                <h1>  Book  Lab Now </h1>
                <form id="labSelectionForm">
                  <input type="hidden" id="lab_id" name="lab_id" value="{{ auth()->user()->lab->id }}">
                  <!-- Date selection -->
                  <div class="form-group">
                    <label for="date">Select Date:</label>
                    <input type="date" id="date" name="date" class="form-control" onchange="getAvailableSlots()">
                  </div>



                                  <div class="form-group">
                                    <label for="is_available">Internet facility</label>
                                    <select class="form-control" id="is_available" name="is_available" required>
                                        <option value="1" >Yes</option>
                                        <option value="0" >No</option>
                                    </select>
                                </div>



                </form>
                <!-- Display existing bookings -->
                <div id="existingBookings" style="background: aliceblue; padding: 10px;" class="mt-4"></div>
                <!-- Display available slots -->
                <div id="availableSlots" class="mt-4"></div>
              </div>
            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>





<br>






<br>






<!-- Main content -->
<section class="content">
  <div class="container-fluid " style="    background-color: #d5d4d4!important;border-radius: 15px; padding: 10px;     width: 90%;">
    <div class="row">
      <section class="col-lg-8 mx-auto  connectedSortable">
        <div class="container">
          <h1> My Booking </h1>

          <table class="table" id="bookings-table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Time Slots</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>





    </div>
</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>



<br><br>














      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- /.footer -->

    @include('layouts.footer')
    <!-- /.footer -->



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  @endsection

  @section('Script')
  <script>
    function getAvailableSlots() {
      var labId = document.getElementById('lab_id').value;
      var date = document.getElementById('date').value;
      var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

      // Make AJAX request to get available slots
      $.ajax({
        type: 'POST',
        url: '/bookinglab/get-available-slots',
        data: {
          lab_id: labId,
          date: date
        },
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
          // Display existing bookings
          loadExistingBookings(labId, date);

          // Display available slots
          var slotsHtml = '<h2>Available Slots</h2>';
          slotsHtml += '<label>Select Time Slots:</label>';
          slotsHtml += '<select id="timeSlots" class="form-control" multiple>';
          response.availableSlots.forEach(function(slot) {
            slotsHtml += '<option value="' + slot.start_time + '">' + slot.start_time + ' - ' + slot.end_time + '</option>';
          });
          slotsHtml += '</select>';
          slotsHtml += '<button class="btn btn-success mt-3" onclick="bookLab()">Book</button>';
          $('#availableSlots').html(slotsHtml);
          multiple();
        }
      });
    }

    function loadExistingBookings(labId, date) {
      var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

      // Make AJAX request to get existing bookings
      $.ajax({
        type: 'POST',
        url: '/bookinglab/get-existing-bookings',
        data: {
          lab_id: labId,
          date: date
        },
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
          // Display existing bookings
          var bookingsHtml = '<h2>Existing Bookings</h2>';
          bookingsHtml += '<ul>';
          response.existingBookings.forEach(function(booking) {
            bookingsHtml += '<li style = "margin: 5px 2px;">' + booking.start_time + ' - ' + booking.end_time +
              ' <button class="btn btn-danger btn-sm" onclick="deleteBooking(' + booking.id + ')">Delete</button></li>';
          });
          bookingsHtml += '</ul>';
          $('#existingBookings').html(bookingsHtml);
        }
      });
    }


    function bookLab() {
      var labId = document.getElementById('lab_id').value;
      var date = document.getElementById('date').value;
      var timeSlots = $('#timeSlots').val();
      var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

      // Make AJAX request to book the lab
      $.ajax({
        type: 'POST',
        url: '/bookinglab/book',
        data: {
          lab_id: labId,
          date: date,
          time_slots: timeSlots
        },
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
          // Display success message
          alert(response.message);
          loadExistingBookings(labId, date);
          getAvailableSlots();
          lordingdatatabel();
          
          // Optionally, you can refresh the page or perform other actions after booking
        }
      });
    }

    function multiple() {
      var multipleCancelButton = new Choices('#timeSlots', {
        removeItemButton: true,
        maxItemCount: 22,
        searchResultLimit: 22,
        renderChoiceLimit: 22
      });
    }


    function deleteBooking(bookingId) {
      var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

      // Make AJAX request to delete the booking
      $.ajax({
        type: 'POST',
        url: '/bookinglab/delete-booking',
        data: {
          booking_id: bookingId
        },
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
          // Refresh the existing bookings after deletion
          var labId = document.getElementById('lab_id').value;
          var date = document.getElementById('date').value;
          loadExistingBookings(labId, date);
          getAvailableSlots();
          lordingdatatabel();
          // Optionally, you can display a success message or perform other actions after deletion
        }
      });
    }









    function lordingdatatabel() {
      $('#bookings-table').DataTable().destroy();

    	$('#bookings-table').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{!! route('bookings.data') !!}',
				columns: [{
						data: 'date',
						name: 'date'
					},
					{
						data: 'time_slots',
						name: 'time_slots'
					},
					{
						data: 'action',
						name: 'action',
						orderable: false,
						searchable: false,
						render: function(data, type, row) {
              return '<a href="#" onclick="cancelBooking(' + row.id + ', \'' + row.cancel_url + '\')">Cancel</a>';
						}
					},
				]
			});

    }

    function cancelBooking(bookingId, cancelUrl) {
    // Show a confirmation alert
    if (confirm("Are you sure you want to cancel this booking?")) {
        // Make AJAX call to cancel the booking
        $.ajax({
            url: cancelUrl,
            type: 'GET',
            success: function(response) {
                // Reload the DataTable after successful cancellation
                lordingdatatabel();
                alert(response.message);
            },
            error: function(error) {
                alert('An error occurred while canceling the booking.');
            }
        });
    }
}



  </script>

  
	<script>
		$(document).ready(function() {
      lordingdatatabel();
		});
	</script>


















  @endsection


  @section('title')
  <title>Dashbord 3 | Log in (v2)</title>
  @endsection