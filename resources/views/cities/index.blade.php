@extends('layouts.header')
	@section('content')
<div class="page-wrapper">
      <div class="container-fluid">
         <div class="row page-titles">
            <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor">Cities</h3>
            </div>
            <div class="col-md-7 align-self-center">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active">Cities</li>
               </ol>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <div class="table-responsive">
					 	@if(session()->has('message'))
							<div class="alert alert-success">
								{{session()->get('message')}}
							</div>
						@endif
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                           <thead>
                              <tr>
								 <th>Countries</th>
								 <th>Cities</th>
								 <th>Action</th>
                              </tr>
                           </thead>
                           <tfoot>
                              <tr>
								 <th>Countries</th>
								 <th>Cities</th>
								 <th>Action</th>
                              </tr>
                           </tfoot>
                           <tbody>
							@foreach($cities as $city)
                              <tr>
                                 <td>{{ $city->country['name'] }}</td>
                                 <td>{{ $city->name }}</td>
								 <td>
								 	<a href="{{route('cities.edit', $city->id)}}" class="btn waves-effect waves-light btn-sm btn-info"><i class="mdi mdi-grease-pencil"></i> Edit</a>
									<form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="post" action="{{route('cities.destroy', $city->id)}}">
										@csrf
										@method('delete')
										<button type="submit" class="btn waves-effect waves-light btn-sm btn-danger"><i class="mdi mdi-delete"></i> Delete</button>
									</form>
								 </td>
                              </tr>
							@endforeach
                           </tbody>
                        </table>
                     </div>
						<a href="{{route('cities.create')}}" class="btn btn-info btn-rounded m-t-10 float-left m-l-20">Add New</a>
                  </div>
               </div>
            </div>
         </div>				
      </div>
		<footer class="footer">© 2020 Copyright.</footer>
	  </div>
      <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
      <script src="{{asset('assets/js/waves.js')}}"></script>
      <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
      <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
      <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
      <script src="{{asset('assets/js/custom.min.js')}}"></script>
      <script src="{{asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('assets/js/buttons.flash.min.js')}}"></script>
      <script src="{{asset('assets/js/jszip.min.js')}}"></script>
      <script src="{{asset('assets/js/pdfmake.min.js')}}"></script>
      <script src="{{asset('assets/js/vfs_fonts.js')}}"></script>
      <script src="{{asset('assets/js/buttons.html5.min.js')}}"></script>
      <script src="{{asset('assets/js/buttons.print.min.js')}}"></script>
      <script>
         $(function() {
         $('#myTable').DataTable();
         $(document).ready(function() {
         var table = $('#example').DataTable({
         "columnDefs": [{
         "visible": false,
         "targets": 2
         }],
         "order": [
         [2, 'asc']
         ],
         "displayLength": 25,
         "drawCallback": function(settings) {
         var api = this.api();
         var rows = api.rows({
         page: 'current'
         }).nodes();
         var last = null;
         api.column(2, {
         page: 'current'
         }).data().each(function(group, i) {
         if (last !== group) {
         $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
         last = group;
         }
         });
         }
         });
         });
         });
         $('#example23').DataTable({
         dom: 'Bfrtip',
		 "displayLength":20,
		 "ordering": false,
         buttons: []
         });
         $().addClass('btn btn-primary mr-1');
      </script>
   </body>
</html>
	@endsection
