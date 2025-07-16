<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>WorldWide Travel & Tourism CRM</title>   
	  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	  <link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
      <link rel="stylesheet" href="{{asset('assets/plugins/chartist-js/dist/chartist.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}">
      <link rel="stylesheet" href="{{asset('assets/plugins/c3-master/c3.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
	  <link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}">
	  <link rel="stylesheet" href="{{asset('assets/plugins/switchery/dist/switchery.min.css')}}">
	  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/pages/dashboard3.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/colors/default-dark.css')}}">
	  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
	  <link rel="stylesheet" href="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
   </head>
   <body class="fix-header fix-sidebar card-no-border">
      <!--<div class="preloader">
         <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">World Wide Travel</p>
         </div>
      </div>-->
	  <div id="main-wrapper">
		 <header class="topbar">
			<nav class="navbar top-navbar navbar-expand-md navbar-light">
			   <div class="navbar-header">
				  <a class="navbar-brand" href="/">
				  <b>
				  <img src="{{asset('assets/img/logo-icon.png')}}" alt="" width="80" class="dark-logo" />
				  </b>
				  <span>
				  <img src="{{asset('assets/img/logo-text.png')}}" width="130" alt="" class="dark-logo" />
				  </span> 
				  </a>
			   </div>
			   <div class="navbar-collapse">
				  <ul class="navbar-nav mr-auto">
					 <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
					 <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
				  </ul>
				  
			   </div>
			</nav>
		 </header>
		 <aside class="left-sidebar">
			<div class="scroll-sidebar">
			   <nav class="sidebar-nav">
			   </nav>
			</div>
		 </aside>
	</div>
<div class="page-wrapper">
      <div class="container-fluid">
         <div class="row page-titles">
            <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor">Clients</h3>
            </div>
            <div class="col-md-7 align-self-center">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active"><a href="{{ route('clients.index') }}">Clients</a></li>
				  <li class="breadcrumb-item active">Create Client</li>
               </ol>
            </div>
         </div>
		@if($errors->all())
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>			
				@endforeach
				</ul> 
			</div>
		@endif
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{session()->get('message')}}
			</div>
		@endif
		{!! Form::open(['route' => 'wwt.store', 'method' => 'POST', 'files' => true ]) !!}
		@csrf
        <div class="row">
			<div class="col-lg-9">
				<div class="card">
					<div class="card-header bg-info">
						<h4 class="m-b-0 text-white"><i class="mdi mdi-grease-pencil"></i> Edit Content</h4>
					</div>
					<div class="card-body">
						<div class="form-body">
							<h3 class="card-title">Personal Info</h3>
							<hr>
							<div class="row p-t-20">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('fullname', 'Full Name*') !!}
										{!! Form::text('fullname', null, ['class' => 'form-control', 'required']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
										{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('gender', 'Gender', ['class' => 'control-label']) !!}
										{!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], null, ['class' => 'form-control custom-select', 'required']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('date_of_birth', 'Date of Birth*', ['class' => 'control-label']) !!}
										{!! Form::text('date_of_birth', null, ['class' => 'form-control  singledate', 'required']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('mobile', 'Mobile*', ['class' => 'control-label']) !!}
										{!! Form::number('mobile', null, ['class' => 'form-control', 'required']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('hotline', 'Hot Line', ['class' => 'control-label']) !!}
										{!! Form::number('hotline', null, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('company', 'Company', ['class' => 'control-label']) !!}
										{!! Form::text('company', null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('position', 'Position', ['class' => 'control-label']) !!}
										{!! Form::text('position', null, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<!--<label for="type" class="control-label">Type</label>-->
										<select hidden class="form-control custom-select" name="type">
											<option value="Events">Events</option>
											<option selected value="Subscribers">Subscribers</option>
											<option value="Others">Others</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('website', 'Website', ['class' => 'control-label']) !!}
										{!! Form::text('website', null, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('miles', 'Cedar Miles', ['class' => 'control-label']) !!}
										{!! Form::number('miles', null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('avatar', 'Avatar') !!}
										{!! Form::file('avatar', ['class' => 'form-control upl-file']) !!}
									</div>
								</div>
							</div>
							
							<h3 class="box-title m-t-40">Address Info</h3>
							<hr>
							<div class="row p-t-20">
								<div class="col-md-12">
									<div class="form-group">
										{!! Form::label('country', 'Country*', ['class' => 'control-label']) !!}
										{!! Form::text('country', null, ['class' => 'form-control', 'required']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('city', 'City*', ['class' => 'control-label']) !!}
										{!! Form::text('city', null, ['class' => 'form-control', 'required']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('postcode', 'Post Code', ['class' => 'control-label']) !!}
										{!! Form::text('postcode', null, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							<h3 class="box-title m-t-40">Passport Info</h3>
							<hr>
							<div class="row p-t-20">
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('passport_nb', 'Passport N.', ['class' => 'control-label']) !!}
										{!! Form::text('passport_nb', null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('issuance_date', 'Issuance Date', ['class' => 'control-label']) !!}
										{!! Form::date('issuance_date', null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('expiry_date', 'Expiry Date', ['class' => 'control-label']) !!}
										{!! Form::date('expiry_date', null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('image', 'Passport*') !!}
										{!! Form::file('image', ['class' => 'form-control upl-file', 'required']) !!}
									</div>
								</div>
							</div>
							<h3 class="box-title m-t-40">Notes</h3>
							<hr>
							<div class="row p-t-20">
								<div class="col-md-12">
									<div class="form-group">
										{!! Form::label('comment', 'Comments', ['class' => 'control-label']) !!}
										{!! Form::textarea('comment', null, ['class' => 'summernote-editor']) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card">
					<div class="card-header bg-info">
						<h4 class="m-b-0 text-white"><i class="icon-settings"></i> Action</h4>
					</div>
					<div class="card-body">
						<div class="form-actions">
							{!! Form::submit('Save', ['class' => 'btn btn-success btn-width m-b-10']) !!}
							<a href="{{route('clients.index')}}" class="btn btn-inverse btn-width">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
      </div>
		<footer class="footer">© 2020 Copyright.</footer>
	</div>
	<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
	<script src="{{asset('assets/plugins/switchery/dist/switchery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
	<script src="{{asset('assets/plugins/summernote/form-summernote.init.js')}}"></script>
	<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
	
	<script>
    $(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    });
    </script>
	<script>
	   $('.singledate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
		locale: {
            format: 'YYYY/MM/DD'
        }
    });
	</script>
   </body>
</html>