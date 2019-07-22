@extends('layouts.header')
	@section('content')
        <div class="page-wrapper">
            <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Client Details</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('clients.index') }}">Clients</a></li>
						<li class="breadcrumb-item active">Show Client</li>
                    </ol>
                </div>
            </div>
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{$client->getFirstMediaUrl('client-avatar', 'thumb')}}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{ $client->firstname }} {{ $client->lastname }}</h4>
                                    <h6 class="card-subtitle">{{ $client->position }}</h6>
                                </center>
                            </div>
                            <div class="center-btn">
								<a href="{{route('clients.edit', $client->id)}}" class="btn waves-effect waves-light btn-sm btn-info"><i class="mdi mdi-grease-pencil"></i> Edit</a>
								<form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="post" action="{{route('clients.destroy', $client->id)}}">
									@csrf
									@method('delete')
									<button type="submit" class="btn waves-effect waves-light btn-sm btn-danger"><i class="mdi mdi-delete"></i> Delete</button>
								</form>
								<button type="button" class="btn waves-effect waves-light btn-sm btn-primary"><i class="mdi mdi-account-card-details"></i> Generate Card</button>
							</div>
							<br>
							<!--<hr class="m-t-10"> 
                            <div class="card-body"> 
								<small class="text-muted">Email address </small>
									<h6>{{ $client->email }}</h6> 
								<small class="text-muted p-t-30 db">Phone</small>
									<h6>{{ $client->mobile }}</h6> 
								<small class="text-muted p-t-30 db">Address</small>
									<h6>{{ $client->street }}</h6>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"><strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">{{ $client->full_name }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">{{ $client->mobile }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{ $client->email }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Street</strong>
                                                <br>
                                                <p class="text-muted">{{ $client->street }}</p>
                                            </div>
                                        </div>
                                        <hr>
										<div class="row">
											<div class="col-md-12"><b class="font-medium">Personal Info</b>
                                                <br>
                                            </div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Gender</small>
												<h6>{{ $client->gender }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Date of Birth</small>
												<h6>{{ $client->date_of_birth }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Company</small>
												<h6>{{ $client->company }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Type</small>
												<h6>{{ $client->type }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Hot Line</small>
												<h6>{{ $client->hotline }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Loyalty Card ID </small>
												<h6>{{ $client->card }}</h6>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-12"><b class="font-medium">Address Info</b>
                                                <br>
                                            </div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">City</small>
												<h6>{{ $client->city }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Post Code </small>
												<h6>{{ $client->postcode }}</h6>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-12"> <b class="font-medium">Passport Info</b>
                                                <br>
                                            </div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Passport N. </small>
												<h6>{{ $client->passport_nb }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Issuance Date</small>
												<h6>{{ $client->issuance_date }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Expiry Date</small>
												<h6>{{ $client->expiry_date }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Photo Passport</small>
												<h6>{{ $client->type }}</h6>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-12"><b class="font-medium">Notes</b>
												<br>
											</div>
											<div class="col-md-12"> 
												<p class="m-t-30">{!! $client->comment !!}</p>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
            <footer class="footer">© 2019 Copyright.</footer>
        </div>
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
</body>
</html>
@endsection