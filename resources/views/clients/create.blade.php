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
                  <li class="breadcrumb-item active">Clients</li>
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
         <div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header bg-info">
						<h4 class="m-b-0 text-white"><i class="mdi mdi-grease-pencil"></i> Edit Content</h4>
					</div>
					<div class="card-body">
						<form action="{{route('clients.store')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-body">
								<h3 class="card-title">Personal Info</h3>
								<hr>
								<div class="row p-t-20">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">First Name</label>
											<input type="text" name="firstname" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Last Name</label>
											<input type="text" name="lastname" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Gender</label>
											<select class="form-control custom-select" name="gender">
												<option disabled selected hidden>--Select Gender--</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Date of Birth</label>
											<input type="date" name="date_of_birth" class="form-control" placeholder="dd/mm/yyyy">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Email</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Mobile</label>
											<input type="text" name="mobile" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Company</label>
											<input type="text" name="company" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Position</label>
											<input type="text" name="position" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Type</label>
											<select class="form-control custom-select" name="type">
												<option disabled selected hidden>--Select Type--</option>
												<option value="customer">Customer</option>
												<option value="supplier">Supplier</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Hot Line</label>
											<input type="text" name="hotline" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Loyalty Card ID</label>
											<input type="text" name="card" class="form-control">
										</div>
									</div>
								</div>
								
								<h3 class="box-title m-t-40">Address</h3>
								<hr>
								<div class="row p-t-20">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Street</label>
											<input type="text" name="street" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">City</label>
											<input type="text" name="city" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Post Code</label>
											<input type="text" name="postcode" class="form-control">
										</div>
									</div>
								</div>
								<h3 class="box-title m-t-40">Passport Info</h3>
								<hr>
								<div class="row p-t-20">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Passport N.</label>
											<input type="text" name="passport_nb" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Issuance Date</label>
											<input type="date" name="issuance_date" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Expiry Date</label>
											<input type="date" name="expiry_date" class="form-control">
										</div>
									</div>
								</div>
								<h3 class="box-title m-t-40">Notes</h3>
								<hr>
								<div class="row p-t-20">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Comments</label>
											<textarea class="summernote-editor" name="comment"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								<a href="{{route('clients.index')}}" class="btn btn-inverse">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
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
	<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
	<script src="{{asset('assets/plugins/summernote/form-summernote.init.js')}}"></script>
   </body>
</html>
@endsection
