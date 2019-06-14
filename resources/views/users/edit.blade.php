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
					<li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
					<li class="breadcrumb-item active">Edit User</li>
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
						{!! Form::model( $user, ['route' => ['users.update', $user->id], 'method' => 'POST', 'files' => true ]) !!}
							@method('put')
							@csrf
							<div class="form-body">
								<div class="row p-t-20">
									<div class="col-md-6">
										<div class="form-group">
											{!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
											{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											{!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
											{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
											{!! Form::email('email', null, ['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
											{!! Form::password('password', ['class' => 'form-control']) !!}
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											{!! Form::label('date_of_birth', 'Date of Birth', ['class' => 'control-label']) !!}
											{!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											{!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
											{!! Form::number('phone', null, ['class' => 'form-control']) !!}
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												{!! Form::label('avatar', 'Avatar', ['class' => 'control-label']) !!}
												{!! Form::file('avatar', ['class' => 'form-control upl-file']) !!}
											</div>
										</div>
										<div class="col-md-4">
											<img src="{{$user->getFirstMediaUrl('avatars', 'thumb')}}">
											{!! Form::checkbox('delete_existing_image', 1, null, ['class' => 'js-switch', 'data-color'=> '#009efb']) !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('is_active', 'Is Active', ['class' => 'control-label']) !!}
										<div>
											{!! Form::checkbox('is_active', 1, null, ['class' => 'js-switch', 'data-color'=> '#009efb']) !!}
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<!--<i class="fa fa-check"></i>-->
								{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
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