@extends('layouts.header')
@section('content')
         <div class="page-wrapper">
            <div class="container-fluid">
               <div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                     <h3 class="text-themecolor">Dashboard</h3>
                  </div>
                  <div class="col-md-7 align-self-center">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                     </ol>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-3">
                     <div class="card bg-info">
                        <div class="card-body">
                           <div class="d-flex no-block">
                              <div class="m-r-20 align-self-center"><img src="assets/img/icon/income-w.png" alt="Income" /></div>
                              <div class="align-self-center">
                                 <h6 class="text-white m-t-10 m-b-0">Total Packages</h6>
                                 <h2 class="m-t-0 text-white">{!! $packageCount !!}</h2>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="card bg-success">
                        <div class="card-body">
                           <div class="d-flex no-block">
                              <div class="m-r-20 align-self-center"><img src="assets/img/icon/expense-w.png" alt="Income" /></div>
                              <div class="align-self-center">
                                 <h6 class="text-white m-t-10 m-b-0">Total Clients</h6>
                                 <h2 class="m-t-0 text-white">{!! $clientCount !!}</h2>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="card bg-primary">
                        <div class="card-body">
                           <div class="d-flex no-block">
                              <div class="m-r-20 align-self-center"><img src="assets/img/icon/assets-w.png" alt="Income" /></div>
                              <div class="align-self-center">
                                 <h6 class="text-white m-t-10 m-b-0">Total Income</h6>
                                 <h2 class="m-t-0 text-white">{!! $packageSum !!}</h2>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="card bg-danger">
                        <div class="card-body">
                           <div class="d-flex no-block">
                              <div class="m-r-20 align-self-center"><img src="assets/img/icon/staff-w.png" alt="Income" /></div>
                              <div class="align-self-center">
                                 <h6 class="text-white m-t-10 m-b-0">Total Users</h6>
                                 <h2 class="m-t-0 text-white">{!! $usersCount !!}</h2>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Line Chart</h4>
                                <div>
                                    <canvas id="chart1" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bar Chart</h4>
                                <div>
                                    <canvas id="chart2" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
            <footer class="footer">© 2020 Copyright.</footer>
         </div>
      <script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/js/waves.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/js/sidebarmenu.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/js/custom.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
	  <script type="text/javascript" src="{{asset('assets/plugins/Chart.js/chartjs.init.js')}}"></script>
	  <script type="text/javascript" src="{{asset('assets/plugins/Chart.js/Chart.min.js')}}"></script>
	 <script>
	  $(function() {
    
		/*<!-- ============================================================== -->*/
		/*<!-- Line Chart -->*/
		/*<!-- ============================================================== -->*/
		new Chart(document.getElementById("chart1"),
			{
				"type":"line",
				"data":{"labels": <?php echo json_encode($labels) ?>,
				"datasets":[{
								"label":"My First Dataset",
								"data":[
									@foreach($packages as $package)
										{{ $package->totalPrice }},
									@endforeach
									],
								"fill":false,
								"borderColor":"rgb(86, 192, 216)",
								"lineTension":0.1
							}]
			},"options":{}});
		
		/*<!-- ============================================================== -->*/
		/*<!-- Bar Chart -->*/
		/*<!-- ============================================================== -->*/
		new Chart(document.getElementById("chart2"),
			{
				"type":"bar",
				"data":{"labels": <?php echo json_encode($labels) ?>,
				"datasets":[{
								"label":"Monthy",
								"data":[
									@foreach($packages as $package)
										{{ $package->totalPrice }},
									@endforeach
									],
								"fill":false,
								"backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)"],
								"borderColor":["rgb(239, 83, 80)","rgb(255, 159, 64)","rgb(255, 178, 43)","rgb(86, 192, 216)","rgb(57, 139, 247)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
								"borderWidth":1}
							]},
				"options":{
					"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
				}
			});
	});
	</script>
   </body>
</html>
@endsection
