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
                  <li class="breadcrumb-item active"><a href="{{ route('packages.index') }}">Packages</a></li>
				  <li class="breadcrumb-item active">Edit Package</li>
               </ol>
            </div>
         </div>
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{session()->get('message')}}
			</div>
		@endif
		@if($errors->all())
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>			
				@endforeach
				</ul> 
			</div>
		@endif
		{!! Form::model( $package, ['route' => ['packages.update', $package->id], 'method' => 'POST', 'files' => true ]) !!}
		@method('put')
		@csrf
        <div class="row">
			<div class="col-lg-9">
				<div class="card">
					<div class="card-header bg-info">
						<h4 class="m-b-0 text-white"><i class="mdi mdi-grease-pencil"></i> Edit Content</h4>
					</div>
					<div class="card-body">
						@include('packages._form')
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
							{!! Form::submit('Update', ['class' => 'btn btn-success btn-width m-b-10']) !!}
							<a href="{{route('packages.index')}}" class="btn btn-inverse btn-width">Back</a>
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
