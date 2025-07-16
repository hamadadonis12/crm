	<div class="table-responsive">
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{session()->get('message')}}
			</div>
		@endif
		<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
		   <thead>
			  <tr>
				 <th>Name</th>
				 <th>Email</th>
				 <th>Phone</th>
				 <th>Type</th>
			  </tr>
		   </thead>
		   <tfoot>
			  <tr>
				 <th>Name</th>
				 <th>Email</th>
				 <th>Phone</th>
				 <th>Type</th>
			  </tr>
		   </tfoot>
		   <tbody>
			@foreach($clients as $client)
			  <tr>
				 <!--<td><a href="{{route('clients.show', [$client->id, $client->slug])}}">{{ $client->fullname }}</a></td>-->
				 <td><a href="{{route('clients.show', $client->id)}}">{{ $client->fullname }}</a></td>
				 <td class="email-lowercase">{{ $client->email }}</td>
				 <td>{{ $client->mobile }}</td>
				 <!--<td>{!! $client->type == 'Supplier' ? '<span class="label label-warning">Supplier</span>' : ($client->type == 'Customer' ? '<span class="label label-success">Customer</span>' : '<span class="label label-danger">MICE</span>') !!}</td>-->
				@if($client->type =='Events')
					<td><span class="label label-warning">Events</span></td>
				@elseif($client->type =='Subscribers')
					<td><span class="label label-success">Subscribers</span></td>
				@else
					<td><span class="label label-primary">Others</span></td>
				@endif
			  </tr>
			@endforeach
		   </tbody>
		   <tbody>

       </tbody>
		</table>
		{!! $clients->appends(request()->query())->links() !!}
	</div>
