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
			<div class="form-group input-group">
				{!! Form::label('from', 'From', ['class' => 'control-label twitter-typeahead']) !!}
				{!! Form::text('from', null, ['class' => 'form-control datepicker-autoclose']) !!}
				<div class="input-group-append">
					<span class="input-group-text"><i class="icon-calender"></i></span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group input-group">
				{!! Form::label('to', 'To', ['class' => 'control-label twitter-typeahead']) !!}
				{!! Form::text('to', null, ['class' => 'form-control datepicker-autoclose']) !!}
				<div class="input-group-append">
					<span class="input-group-text"><i class="icon-calender"></i></span>
				</div>
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




<link href="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/switchery/dist/switchery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
    $(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    });
</script>
<script>
// Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('.datepicker-autoclose').datepicker({
        autoclose: true,
		format: "yyyy/mm/dd",
        todayHighlight: true
    });
	</script>