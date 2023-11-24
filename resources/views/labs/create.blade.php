@extends('layouts.app')

@section('Section')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('/dist/img/AdminLTELogo.png') }} " alt="AdminLTELogo" height="100" width="auto">
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
                            <h1 class="m-0"> Add/Remove Computer</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"> Add/Remove Computer </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->


            <section class="content m-5">
                <div class="container-fluid " style="    background-color: #d5d4d4!important;border-radius: 15px; padding: 10px;     width: 60%;">
                    <div class="row">


                        <div class="container">
                            <h2>Create Lab</h2>
                            <form action="{{ route('labs.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="capacity">Capacity:</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity" required>
                                </div>



                                <div class="form-group">
                                    <label for="capacity">With Internet:</label>
                                    <input type="number" class="form-control" id="capacity" name="internet" required>
                                </div>




                                <div class="form-group">
                                    <label for="capacity">Without Internet:</label>
                                    <input type="number" class="form-control" id="capacity" name="Without_nternet" required>
                                </div>



                                <div class="form-group">
                                    <label for="is_available">Is Available:</label>
                                    <select class="form-control" id="is_available" name="is_available" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <center style="    width: 80%;     margin: auto;">
                                    <button type="submit" class="btn btn-primary">Create Lab</button>
                                </center>



                            </form>
                        </div>
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