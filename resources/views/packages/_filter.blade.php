<div class="form-body">
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
				{!! Form::label('min_price', 'Min price', ['class' => 'control-label']) !!}
				{!! Form::text('min_price', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('max_price', 'Max Price', ['class' => 'control-label']) !!}
				{!! Form::text('max_price', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	
	<div class="row p-t-20">
		<div class="col-md-2">
			{!! Form::checkbox('has_hotel', 1, null, ['class' => 'js-switch', 'data-color'=> '#009efb']) !!}
			{!! Form::label('has_hotel', 'Hotel', ['class' => 'control-label']) !!}
		</div>
	
		<div class="col-md-3">
			{!! Form::checkbox('has_flight_ticket', 1, null, ['class' => 'js-switch', 'data-color'=> '#009efb']) !!}
			{!! Form::label('has_flight_ticket', 'Flight Ticket', ['class' => 'control-label']) !!}
		</div>
	
		<div class="col-md-2">
			{!! Form::checkbox('has_visa', 1, null, ['class' => 'js-switch', 'data-color'=> '#009efb']) !!}
			{!! Form::label('has_visa', 'Visa', ['class' => 'control-label']) !!}
		</div>
	
		<div class="col-md-2">
			{!! Form::checkbox('has_cruise', 1, null, ['class' => 'js-switch', 'data-color'=> '#009efb']) !!}
			{!! Form::label('has_cruise', 'Cruise', ['class' => 'control-label']) !!}
		</div>

		<div class="col-md-2">
			{!! Form::checkbox('has_train', 1, null, ['class' => 'js-switch', 'data-color'=> '#009efb']) !!}
			{!! Form::label('has_train', 'Train', ['class' => 'control-label']) !!}
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