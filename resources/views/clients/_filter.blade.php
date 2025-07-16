<div class="form-body">
	<div class="row p-t-20">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('fullname', 'Full Name', ['class' => 'control-label']) !!}
				{!! Form::text('fullname', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('gender', 'Gender', ['class' => 'control-label']) !!}
				<select class="form-control custom-select" id="gender" name="gender">
					<option disabled selected hidden>-- Select Gender --</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('date_of_birth', 'Date of Birth', ['class' => 'control-label']) !!}
				{!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
				{!! Form::email('email', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('mobile', 'Mobile', ['class' => 'control-label']) !!}
				{!! Form::number('mobile', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('company', 'Company', ['class' => 'control-label']) !!}
				{!! Form::text('company', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
				<select class="form-control custom-select" id="type" name="type">
					<option disabled selected hidden>-- Select Type --</option>
					<option value="Events">Events</option>
					<option value="Subscribers">Subscribers</option>
					<option value="Others">Others</option>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
				{!! Form::text('country', null, ['class' => 'form-control']) !!}
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