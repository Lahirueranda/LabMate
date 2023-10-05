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
                            <h1 class="m-0"> Register a new User </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Register a new User </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="register-box">
                <div class="card card-outline card-primary">
                    <!-- <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
            </div> -->
                    <div class="card-body">
                        <p class="login-box-msg">Register a new membership</p>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <select class="form-control" name="lab_id">
                                    <option value="" disabled selected>Select Lab</option>
                                    @foreach($labs as $lab)
                                    <option value="{{ $lab->id }}" {{ old('lab_id') == $lab->id ? 'selected' : '' }}>{{ $lab->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-flask"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="nic" class="form-control" placeholder="NIC (National Identity Card)" value="{{ old('nic') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="course_name" class="form-control" placeholder="Course Name" value="{{ old('course_name') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-book"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="university_program" class="form-control" placeholder="University Program" value="{{ old('university_program') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-graduation-cap"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="degree_name" class="form-control" placeholder="Degree Name" value="{{ old('degree_name') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-certificate"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="faculty_name" class="form-control" placeholder="Faculty Name" value="{{ old('faculty_name') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-university"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Retype Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div> -->
                        <center style="    width: 80%;     margin: auto;">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </center>
                            </div>
                        </form>

                        <!-- <a href="{{ route('login') }}" class="text-center">I already have a membership</a> -->
                    </div>
                </div><!-- /.card -->
            </div><!-- /.register-box -->



            <br>


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

    <style>
        .login-box,
        .register-box {
            width: 80% !important;
            margin: auto !important;
        }
    </style>
    @endsection

    @section('Script')
    @endsection


    @section('title')
    <title>Dashbord 3 | Log in (v2)</title>
    @endsection