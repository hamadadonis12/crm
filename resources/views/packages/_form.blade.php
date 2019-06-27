<div class="form-body">
	<h3 class="card-title">Package Info</h3>
	<hr>
	<div class="row p-t-20">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Client</label>
				{!! Form::select('client_id', [null=>'Select a client'] + $clients, null, ['class' => 'select2 form-control custom-select']) !!}
			</div>
		</div>
		<div class="col-md-6">
			{!! Form::label('name', 'Package Name', ['class' => 'control-label']) !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('from', 'From', ['class' => 'control-label']) !!}
				{!! Form::date('from', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('to', 'To', ['class' => 'control-label']) !!}
				{!! Form::date('to', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
				{!! Form::text('price', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	
	<h3 class="box-title m-t-40">Hotel Accommodation</h3>
	<hr>
	<div class="row p-t-20">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('hotel_name', 'Hotel', ['class' => 'control-label']) !!}
				{!! Form::text('hotel_name', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6">

		</div>
	</div>
</div>