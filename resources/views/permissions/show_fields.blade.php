<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $city->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $city->name !!}</p>
</div>

<!-- Sort Order Field -->
<div class="form-group">
    {!! Form::label('sort_order', 'Sort Order:') !!}
    <p>{!! $city->sort_order !!}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <p>{!! $city->published !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $city->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $city->updated_at !!}</p>
</div>

