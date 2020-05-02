
<!-- Feature Field -->
<div class="form-group col-sm-6">
    {!! Form::label('feature', 'Feature:') !!}
    {!! Form::text('feature', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('attributes.index') !!}" class="btn btn-default">Cancel</a>
</div>
