<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_categories_id', 'Sub Category') !!}
    @if(isset($category))
        {!! Form::select('sub_categories_id[]',$sub_categories,$selected_subcategories, ['class' => 'form-control js-multiple','multiple'=>'multiple']) !!}
    @else
        {!! Form::select('sub_categories_id[]',$sub_categories, null, ['class' => 'form-control js-multiple','multiple'=>'multiple']) !!}
    @endif

</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
</div>
