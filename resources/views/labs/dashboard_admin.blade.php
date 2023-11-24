@extends('layouts.app')

@section('Section')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
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
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->








      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">



        
      @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        
          <!-- Small boxes (Stat box) -->
          <div class="row" style="justify-content: center;">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>12</h3>

                  <p>New Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53</h3>

                  <p>Today Booking </p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>

                  <p>All Users </p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
          </div>

        </div><!-- /.container-fluid -->








        <section class="content m-5">
          <div class="container-fluid " style="    background-color: #d5d4d4!important;border-radius: 15px; padding: 10px;     width: 80% !important;   ">
            <div class="row">
              <section class="col-lg-8 mx-auto  connectedSortable">
                <div class="container">
                  <h1> All  Booking </h1>


                      <div class="input-group mb-3">
            <label class="input-group-text" for="selectedDate">Select Date:</label>
            <input type="date" class="form-control" id="selectedDate" onchange="loadDataByDate()">
          </div>

          
                  <table class="table" id="bookings-table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Time Slots</th>
                        <th>User Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </section>
              <!-- right col -->
            </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section>
      </section>



      <br>
      <br>















        
      </section>
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

var todayDate = new Date().toISOString().split('T')[0];


function lordingdatatabel(todayDate) {
    $('#bookings-table').DataTable().destroy();

    $('#bookings-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('adminall.data') !!}?today_data=' + todayDate,
        columns: [
            { data: 'date', name: 'date' },
            { data: 'time_slots', name: 'time_slots' },
            { data: 'user_names', name: 'user_names' }, // Update to 'user_names'
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return '<a href="#" onclick="cancelBooking('+'\''+ row.cancel_url + '\')">Cancel</a>';
                }
            },
        ]
    });
}

function cancelBooking(cancelUrl) {
    // Show a confirmation alert
    if (confirm("Are you sure you want to cancel this booking?")) {
        // Make AJAX call to cancel the booking
        $.ajax({
            url: cancelUrl,
            type: 'GET',
            success: function(response) {
                // Reload the DataTable after successful cancellation
                lordingdatatabel(todayDate);
                alert(response.message);
            },
            error: function(error) {
                alert('An error occurred while canceling the booking.');
            }
        });
    }
}







function loadDataByDate() {
    var selectedDate = document.getElementById('selectedDate').value;
    lordingdatatabel(selectedDate);
  }
  // Set today's date as the default value
  document.getElementById('selectedDate').valueAsDate = new Date();
  // Trigger the function with the default today's date
  loadDataByDate();


    // Document ready function
    // $(document).ready(function () {
    //   // Get today's date
    
    //   // Call the function with today's date
    //   lordingdatatabel(todayDate);
    // });
</script>



  @endsection


  @section('title')
  <title>Dashbord 3 | Log in (v2)</title>
  @endsection