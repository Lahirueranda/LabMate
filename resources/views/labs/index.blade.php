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
                <div class="container-fluid " style="    background-color: #d5d4d4!important;border-radius: 15px; padding: 10px;     width: 70%;">
                    <div class="row">
                        <div class="container">
                            <h2>Labs</h2><hr>
                           <center> <a href="{{ route('labs.create') }}" class="btn btn-success">Create Lab</a></center>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Capacity</th>
                                        <th>Is Available</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($labs as $lab)
                                    <tr>
                                        <td>{{ $lab->id }}</td>
                                        <td>{{ $lab->name }}</td>
                                        <td>{{ $lab->capacity }}</td>
                                        <td>{{ $lab->is_available ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <a href="{{ route('labs.edit', $lab->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('labs.destroy', $lab->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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