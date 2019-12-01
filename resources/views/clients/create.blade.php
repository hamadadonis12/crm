@extends('layouts.header')
	@section('content')
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
		{!! Form::open(['route' => 'clients.store', 'method' => 'POST', 'files' => true ]) !!}
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
										{!! Form::label('fullname', 'Full Name') !!}
										{!! Form::text('fullname', null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
										{!! Form::email('email', null, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('gender', 'Gender', ['class' => 'control-label']) !!}
										{!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], null, ['class' => 'form-control custom-select']) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('date_of_birth', 'Date of Birth', ['class' => 'control-label']) !!}
										{!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('mobile', 'Mobile', ['class' => 'control-label']) !!}
										{!! Form::number('mobile', null, ['class' => 'form-control']) !!}
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
										{!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
										<!--<select class="form-control custom-select" name="type">
											<option disabled selected hidden>--Select Type--</option>
											<option value="customer">Customer</option>
											<option value="supplier">Supplier</option>
										</select>-->
										{!! Form::select('type', ['customer' => 'Customer', 'supplier' => 'Supplier','' => 'Other',], null, ['class' => 'form-control custom-select']) !!}
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
										{!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
										{!! Form::text('country', null, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('city', 'City', ['class' => 'control-label']) !!}
										{!! Form::text('city', null, ['class' => 'form-control']) !!}
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
										{!! Form::label('image', 'Photo Passport') !!}
										{!! Form::file('image', ['class' => 'form-control upl-file']) !!}
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
		<footer class="footer">© 2019 Copyright.</footer>
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
	<script>
    $(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    });
    </script>
   </body>
</html>
@endsection
