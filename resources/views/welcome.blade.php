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
                                 <h6 class="text-white m-t-10 m-b-0">Total Income</h6>
                                 <h2 class="m-t-0 text-white">953,000</h2>
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
                                 <h6 class="text-white m-t-10 m-b-0">Total Expense</h6>
                                 <h2 class="m-t-0 text-white">236,000</h2>
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
                                 <h6 class="text-white m-t-10 m-b-0">Total Assets</h6>
                                 <h2 class="m-t-0 text-white">987,563</h2>
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
                                 <h6 class="text-white m-t-10 m-b-0">Total Staff</h6>
                                 <h2 class="m-t-0 text-white">987,563</h2>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6 col-md-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex">
                              <div>
                                 <h3 class="card-title m-b-5"><span class="lstick"></span>Sales Overview </h3>
                              </div>
                              <div class="ml-auto">
                                 <select class="custom-select b-0">
                                    <option selected value="">January 2019</option>
                                    <option value="1">February 2017</option>
                                    <option value="2">March 2017</option>
                                    <option value="3">April 2017</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="bg-theme stats-bar">
                           <div class="row">
                              <div class="col-lg-4 col-md-4">
                                 <div class="p-20 active">
                                    <h6 class="text-white">Total Sales</h6>
                                    <h3 class="text-white m-b-0">$10,345</h3>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-4">
                                 <div class="p-20">
                                    <h6 class="text-white">This Month</h6>
                                    <h3 class="text-white m-b-0">$7,589</h3>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-4">
                                 <div class="p-20">
                                    <h6 class="text-white">This Week</h6>
                                    <h3 class="text-white m-b-0">$1,476</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-body">
                           <div id="sales-overview2" class="p-relative" style="height:330px;"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer class="footer">© 2019 Copyright.</footer>
         </div>
      <script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
      <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="assets/js/perfect-scrollbar.jquery.min.js"></script>
      <script type="text/javascript" src="assets/js/waves.js"></script>
      <script type="text/javascript" src="assets/js/sidebarmenu.js"></script>
      <script type="text/javascript" src="assets/js/custom.min.js"></script>
      <script type="text/javascript" src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
      <script type="text/javascript" src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
      <script type="text/javascript" src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
      <script type="text/javascript" src="assets/plugins/d3/d3.min.js"></script>
      <script type="text/javascript" src="assets/plugins/c3-master/c3.min.js"></script>
      <script type="text/javascript" src="assets/js/dashboard3.js"></script>
   </body>
</html>
@endsection