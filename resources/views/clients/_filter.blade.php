<div class="form-body">
	<div class="row p-t-20">
		<div class="col-md-6">
			{!! Form::label('fullname', 'Full Name', ['class' => 'control-label']) !!}
			{!! Form::text('fullname', null, ['class' => 'form-control']) !!}
		</div>
		<div class="col-md-6">
			{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="row  p-t-20">
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