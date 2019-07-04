@extends('layouts.header')
	@section('content')
        <div class="page-wrapper">
            <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Package Details</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('packages.index') }}">Packages</a></li>
						<li class="breadcrumb-item active">Show Package</li>
                    </ol>
                </div>
            </div>
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{$package->client->getFirstMediaUrl('client', 'thumb')}}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{ $package->client->firstname }} {{ $package->client->lastname }}</h4>
                                    <h6 class="card-subtitle">{{ $package->client->position }}</h6>
                                </center>
                            </div>
                            <div class="center-btn">
								<a href="{{route('packages.edit', $package->id)}}" class="btn waves-effect waves-light btn-sm btn-info"><i class="mdi mdi-grease-pencil"></i> Edit</a>
								<a href="{{route('packages.pdf', $package->id)}}" class="btn waves-effect waves-light btn-sm btn-info"><i class="mdi mdi-grease-pencil"></i> PDF</a>
								
								<form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="post" action="{{route('packages.destroy', $package->id)}}">
									@csrf
									@method('delete')
									<button type="submit" class="btn waves-effect waves-light btn-sm btn-danger"><i class="mdi mdi-delete"></i> Delete</button>
								</form>
							</div>
							<hr class="m-t-10"> 
                            <div class="card-body"> 
								<small class="text-muted">Email address </small>
									<h6>{{ $package->client->email }}</h6> 
								<small class="text-muted p-t-30 db">Phone</small>
									<h6>{{ $package->client->phone }}</h6> 
								<small class="text-muted p-t-30 db">Address</small>
									<h6>{{ $package->client->address }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Package Name</strong>
                                                <br>
                                                <p class="text-muted">{{ $package->name }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>From</strong>
                                                <br>
                                                <p class="text-muted">{{ $package->from }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>To</strong>
                                                <br>
                                                <p class="text-muted">{{ $package->to }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Price</strong>
                                                <br>
                                                <p class="text-muted">{{ $package->price }} $</p>
                                            </div>
                                        </div>
                                        <hr>
										<br>
										<div class="row">
											<div class="col-md-2">
												<input 
													type="checkbox" 
													id="has_hotel" 
													class="filled-in chk-col-light-blue" 
													@if($package->has_hotel) checked @endif 
													disabled 
												/>
												<label for="has_hotel">Hotel</label>
											</div>
											<div class="col-md-2">
												@if($package->has_flight_ticket == 1)
													<input type="checkbox" id="has_flight_ticket" class="filled-in chk-col-light-blue" checked disabled />
												@else
													<input type="checkbox" id="has_flight_ticket" class="filled-in chk-col-light-blue" disabled />
												@endif
												<label for="has_flight_ticket">Ticket</label>
											</div>
											<div class="col-md-2">
												@if($package->has_visa == 1)
													<input type="checkbox" id="has_visa" class="filled-in chk-col-light-blue" checked disabled />
												@else
													<input type="checkbox" id="has_visa" class="filled-in chk-col-light-blue" disabled />
												@endif
												<label for="has_visa">Visa</label>
											</div>
											<div class="col-md-2">
												@if($package->has_cruise == 1)
													<input type="checkbox" id="has_cruise" class="filled-in chk-col-light-blue" checked disabled />
												@else
													<input type="checkbox" id="has_cruise" class="filled-in chk-col-light-blue" disabled />
												@endif
												<label for="has_cruise">Cruise</label>
											</div>
											<div class="col-md-2">
												@if($package->has_train == 1)
													<input type="checkbox" id="has_train" class="filled-in chk-col-light-blue" checked disabled />
												@else
													<input type="checkbox" id="has_train" class="filled-in chk-col-light-blue" disabled />
												@endif
												<label for="has_train">Train</label>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-12"><b class="font-medium">Package Details</b>
                                                <br>
                                            </div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Hotel</small>
												<h6>{{ $package->hotel_name }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Flight Ticket</small>
												<h6>{{ $package->ticket_number }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Visa</small>
												<h6>{{ $package->visa_name }}</h6>
											</div>
											<div class="col-md-6">
												<small class="text-muted p-t-30 db">Cruise</small>
												<h6>{{ $package->cruise_name }}</h6>
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