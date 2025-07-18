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
				  <ul class="navbar-nav my-lg-0">
				  	<li>
				  		<a class="nav-link" href="{!! route('notifications.index') !!}">
				  			Notifications 
				  			@if(auth()->user()->unreadNotifications->count())
				  				<span class="badge badge-danger">{!! auth()->user()->unreadNotifications->count() !!}</span>
				  			@endif
				  		</a>
				  	</li>
					 <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ Auth::user()->getFirstMediaUrl('avatars', 'thumb') }}" alt="user" class="profile-pic" /></a>
						<div class="dropdown-menu dropdown-menu-right animated flipInY">
						   <ul class="dropdown-user">
							  <li>
								 <div class="dw-user-box">
									<div class="u-img"><img src="{{ Auth::user()->getFirstMediaUrl('avatars', 'thumb') }}" alt="user"></div>
									<div class="u-text">
									   <h4>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
									   <p class="text-muted">{{ Auth::user()->email }}</p>
									</div>
								 </div>
							  </li>
							  <li role="separator" class="divider"></li>
							  <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
							  <li role="separator" class="divider"></li>
							  <li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> {{ __('Logout') }}</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							  </li>
						   </ul>
						</div>
					 </li>
				  </ul>
			   </div>
			</nav>
		 </header>
		 <aside class="left-sidebar">
			<div class="scroll-sidebar">
			   <nav class="sidebar-nav">
				  <ul id="sidebarnav">
					 <li class="user-profile">
						<a class="has-arrow waves-effect waves-dark" aria-expanded="false"><img src="{{ Auth::user()->getFirstMediaUrl('avatars', 'thumb') }}" alt="user" /><span class="hide-menu">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></a>
						<ul aria-expanded="false" class="collapse">
						   <li><a href="#">My Profile</a></li>
						   <li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> {{ __('Logout') }}</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
						</ul>
					 </li>
					 <li class="nav-devider"></li>
					 <li class="nav-small-cap"><a href="/" style="font-size:12px;padding:0">DASHBOARD</a></li>
					 <li>
                                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Administration</span></a>
						<ul aria-expanded="false" class="collapse">
						   <li><a href="{!! route('users.index') !!}">User Management </a></li>
						   <li><a href="#">Group</a></li>
						   <li><a href="#">Group Privileges</a></li>
						</ul>
					 </li>   
					 <li>
                                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
						<ul aria-expanded="false" class="collapse">
						   <li><a href="{!! route('clients.index') !!}">Clients</a></li>
						   <li><a href="{!! route('packages.index') !!}">Packages</a></li>
						   <li><a href="{!! route('sales.index') !!}">Sales</a></li>
						</ul>
					 </li>
					 <li>
                                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="fa fa-map"></i><span class="hide-menu">Countries </span></a>
						<ul aria-expanded="false" class="collapse">
						   <li><a href="{!! route('countries.index') !!}">Countries</a></li>
						   <li><a href="{!! route('cities.index') !!}">Cities</a></li>
						</ul>
					 </li>					 
				  </ul>
			   </nav>
			</div>
		 </aside>
	</div>
        @yield('content')