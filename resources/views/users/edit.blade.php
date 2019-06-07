@extends('layouts.header')
	@section('content')
<div class="page-wrapper">
      <div class="container-fluid">
         <div class="row page-titles">
            <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor">Users</h3>
            </div>
            <div class="col-md-7 align-self-center">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active">Users</li>
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
         <div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header bg-info">
						<h4 class="m-b-0 text-white"><i class="mdi mdi-grease-pencil"></i> Edit Content</h4>
					</div>
					<div class="card-body">
						<form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
							@method('put')
							@csrf
							<div class="form-body">
								<div class="row p-t-20">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">First Name</label>
											<input 
												type="text" 
												value="{!! $user->first_name !!}" 
												name="first_name" 
												class="form-control"
											>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Last Name</label>
											<input type="text" value="{{ $user->last_name }}" name="last_name" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Email</label>
											<input type="email" value="{{ $user->email }}" name="email" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Password</label>
											<input type="password" value="{{ $user->password }}" name="password" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Date of Birth</label>
											<input type="date" value="{{ $user->date_of_birth }}" name="date_of_birth" class="form-control" placeholder="dd/mm/yyyy">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Phone</label>
											<input type="text" value="{{ $user->phone }}" name="phone" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Is Active</label>
										<input 
											type="checkbox" 
											name="is_active" 
											class="form-control" 
											value="1" 
											style="opacity: 1;position:relative;left: 0"
											@if($user->is_active) checked @endif
										/>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								<a href="{{route('users.index')}}" class="btn btn-inverse">Cancel</a>
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