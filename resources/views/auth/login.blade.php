@extends('layouts.app')

@section('Section')

<body class="hold-transition login-page" style="background: #d9af7d;">










    <div class="row" style="    width: 100%;">

        <div class="col-6">
            <div class="login-box" style="float: right; margin-top: 15%;">

                @if($errors->has('email'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Authentication failed!</h5>
                    {{ $errors->first('email') }}.
                </div>
                @endif




                <!-- /.login-logo -->
                <div class="card card-outline card-primary" style="background: #43484f;color: black;border-radius: 12px;">
                    <div class="card-header text-center">


                        <img src="http://127.0.0.1:8000/dist/img/AdminLTELogo.png" style="
    width: 50%;
    border-radius: 15px;
">


                    </div>
                    <div class="card-body" style="  background-color: #ffffff !important;">
                        <p class="login-box-msg">Sign in to start your session</p>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" required placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>


                        <!-- /.social-auth-links -->

                        <!-- <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
        </p> -->
                        <!-- <p class="mb-0">
            <a style=" color: white;" href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </p> -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="col-6">
            <img src="http://127.0.0.1:8000/dist/img/login.png" alt="waewqeqwe" srcset="" style="
    width: 100%;
">
        </div>
    </div>



    <style>

.card-primary.card-outline {
    border-top: 2px solid #ffffff00 !important
}

.card-body {
    background-color: #ffffff !important;
    border-radius: 0 0 12px 12px;
}
    </style>


    @endsection

    @section('Script')
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    @endsection