<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Role:</strong>
        {!! Form::select('roles[]', $roles,isset($userRole) ? $userRole : [], array('class' => 'form-control','required', 'placeholder'=>'Select Role', 'id'=>'selectRole')) !!}
    </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Name:</strong>
        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Email:</strong>
        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Password:</strong>
        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Confirm Password:</strong>
        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
    </div>
</div>
{{--<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Phone Number:</strong>
        {!! Form::text('phone', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Country:</strong>
        {!! Form::select('country[]', $countries,null, array('class' => 'form-control','required', 'placeholder'=>'Select Country', 'id'=>'selectCountry')) !!}
    </div>
</div>--}}
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
