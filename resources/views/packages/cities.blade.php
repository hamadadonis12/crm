<div class="form-group">
	<label class="control-label">City</label>
	{!! Form::select('city_id', 
		[null=>'Select a city'] + $cities, null, 
		['class' => 'select2 form-control custom-select', 'id' => 'city_picker']) 
	!!}
</div>
