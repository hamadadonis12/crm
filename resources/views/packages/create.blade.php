@extends('layouts.header')
	@section('content')
<div class="page-wrapper">
      <div class="container-fluid">
         <div class="row page-titles">
            <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor">Packages</h3>
            </div>
            <div class="col-md-7 align-self-center">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active">Packages</li>
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
						<form action="{{route('packages.store')}}" method="POST">
							@csrf
							<div class="form-body">
								<h3 class="card-title">Package Info</h3>
								<hr>
								<div class="row p-t-20">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Client</label>
											<select class="select2 form-control custom-select" name="client_id" style="width: 100%; height:36px;">
													<option disabled selected hidden>-- Select Client --</option>
												@foreach($clients as $client)
													<option value="{{ $client->id }}">{{ $client->firstname }} {{ $client->lastname }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label">Package Name</label>
										<input type="text" name="name" class="form-control">
									</div>
								</div>
								

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">From</label>
											<input type="date" name="from" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">To</label>
											<input type="date" name="to" class="form-control">
										</div>
									</div>
								</div>
								
								<h3 class="box-title m-t-40">Hotel Accommodation</h3>
								<hr>
								<div class="row p-t-20">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Hotel Name</label>
											<input type="text" name="hotel" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">To</label>
											<input type="date" name="to" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								<a href="{{route('packages.index')}}" class="btn btn-inverse">Cancel</a>
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
    <script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
    $(function() {
        $(".select2").select2();
    });
    </script>
   </body>
</html>
@endsection
