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


            <section class="content mr-5 ml-5">
                <div class="container-fluid " style="    background-color: #d5d4d4!important;border-radius: 15px; padding: 10px;     width: 60%;">
                    <div class="row">
                     


                        <div class="container">
                            <h2>Edit Lab</h2>
                            <form action="{{ route('labs.update', $lab->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $lab->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="capacity">Capacity:</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $lab->capacity }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="is_available">Is Available:</label>
                                    <select class="form-control" id="is_available" name="is_available" required>
                                        <option value="1" {{ $lab->is_available ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ !$lab->is_available ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                              <center>  <button type="submit" class="btn btn-primary">Update Lab</button></center>
                            </form>
                        </div>





<br>
<br><br>










                    </div>
                </div>
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
    @endsection


    @section('title')
    <title>Dashbord 3 | Log in (v2)</title>
    @endsection