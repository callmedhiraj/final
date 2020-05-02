<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('attribute_id', 'Attribute') !!}
    @if(isset($subCategory))
        {!! Form::select('attribute_id[]',$attributes,$selected_attributes, ['class' => 'form-control js-multiple','multiple'=>'multiple']) !!}
    @else
        {!! Form::select('attribute_id[]',$attributes, null, ['class' => 'form-control js-multiple','multiple'=>'multiple']) !!}
    @endif

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('subCategories.index') }}" class="btn btn-secondary">Cancel</a>
</div>
