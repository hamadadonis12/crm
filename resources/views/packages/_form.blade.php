<div class="form-body">
	<h3 class="card-title">Package General Info</h3>
	<hr>
	<div class="row p-t-20">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Client</label>
				{!! Form::select('client_id', [null=>'Select a client'] + $clients, null, ['class' => 'select2 form-control custom-select']) !!}
			</div>
		</div>
		<div class="col-md-6">
			{!! Form::label('name', 'Destination', ['class' => 'control-label']) !!}
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
	
	<h3 class="box-title m-t-40">Package Details</h3>
	<hr>
	<div class="row p-t-20">
		<div class="col-md-2">
			<div class="form-group">
				{!! Form::checkbox('has_hotel', 1, null, ['class' => 'filled-in chk-col-light-blue', 'id' => 'has_hotel']) !!}
				{!! Form::label('has_hotel', 'Hotel', ['class' => 'control-label']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::text('hotel_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Hotel Name']) !!}
			</div>
		</div>
	</div>

	<div class="row p-t-20">
		<div class="col-md-2">
			<div class="form-group">
				{!! Form::checkbox('has_flight_ticket', 1, null, ['class' => 'filled-in chk-col-light-blue', 'id' => 'has_flight_ticket']) !!}
				{!! Form::label('has_flight_ticket', 'Flight Ticket', ['class' => 'control-label']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::text('ticket_number', null, ['class' => 'form-control', 'placeholder' => 'Enter Ticket Number']) !!}
			</div>
		</div>
	</div>

	<div class="row p-t-20">
		<div class="col-md-2">
			<div class="form-group">
				{!! Form::checkbox('has_visa', 1, null, ['class' => 'filled-in chk-col-light-blue', 'id' => 'has_visa']) !!}
				{!! Form::label('has_visa', 'Visa', ['class' => 'control-label']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::text('visa_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Visa Name']) !!}
			</div>
		</div>
	</div>

	<div class="row p-t-20">
		<div class="col-md-2">
			<div class="form-group">
				{!! Form::checkbox('has_cruise', 1, null, ['class' => 'filled-in chk-col-light-blue', 'id' => 'has_cruise']) !!}
				{!! Form::label('has_cruise', 'Cruise', ['class' => 'control-label']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::text('cruise_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Cruise Name']) !!}
			</div>
		</div>
	</div>

	<div class="row p-t-20" style="margin-bottom: 20px">
		<div class="col-md-2">
			<div class="form-group">
				{!! Form::checkbox('has_train', 1, null, ['class' => 'filled-in chk-col-light-blue', 'id' => 'has_train']) !!}
				{!! Form::label('has_train', 'Train', ['class' => 'control-label']) !!}
			</div>
		</div>
	</div>

</div>

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/switchery/dist/switchery.min.js')}}"></script>
<script>
    $(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    });
</script>