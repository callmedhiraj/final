<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Name:</strong>
        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Permission:</strong>
        <br/>
        @foreach($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, isset($rolePermissions) ? (in_array($value->id, $rolePermissions) ? true : false) : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
        @endforeach
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
