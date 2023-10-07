@extends('layouts.app')

@section('Section')

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

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
							<h1 class="m-0"> Send Message</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active"> Send Message</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->






			<div class="container-fluid">
				<div class="row mb-2" style="justify-content: space-around;">
					<div class="col-sm-6" style="    background-color: #d5d4d4!important;border-radius: 15px; padding: 10px;    width: 100% !important;
    max-width: 70%;">


						<form id="messageForm" action="{{ url('/Msg/create-message') }}" method="post" class="mt-4">
							@csrf

							<div class="form-group">
								<label for="lab">Select Lab:</label>
								<select id="lab" name="lab_id" class="form-control">
									@foreach($labs as $lab)
									<option value="{{ $lab->id }}">{{ $lab->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="selectUsers">Select Users:</label>
								<select id="selectUsers" name="user_ids[]" class="form-control" multiple></select>
							</div>

							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="selectAllUsers">
								<label class="form-check-label" for="selectAllUsers">Select All Users</label>
							</div>

							<div class="form-group">
								<label for="message">Message:</label>
								<textarea id="message" name="content" class="form-control" rows="4"></textarea>
							</div>





							<center style="    width: 80%;     margin: auto;">
								<button type="submit" class="btn btn-primary">Send Message</button>
							</center>
						</form>


					</div>
				</div>
			</div>


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
		$(document).ready(function() {
			$('#lab').change(function() {
				var labId = $(this).val();
				$.ajax({
					url: "{{ url('/Msg/get-users') }}",
					method: 'post',
					data: {
						lab_id: labId,
						_token: "{{ csrf_token() }}"
					},
					success: function(data) {
						var selectUsers = $('#selectUsers');
						selectUsers.empty();
						$.each(data.users, function(index, user) {
							selectUsers.append('<option value="' + user.id + '">' + user.name + '</option>');
						});
					}
				});
			});

			$('#selectAllUsers').change(function() {
				$('#selectUsers option').prop('selected', this.checked);
			});
		});
	</script>



	@endsection


	@section('title')
	<title>Dashbord 3 | Log in (v2)</title>
	@endsection