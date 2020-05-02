<!-- Old Password Field -->
<div class="form-group col-sm-12">
    {!! Form::label('old_password', 'Old Password:') !!}
    {!! Form::password('old_password', array('placeholder' => 'Enter Old Password','class' => 'form-control')) !!}

</div>

<!-- New Password Field-->
<div class="form-group col-sm-12">
    {!! Form::label('password', 'New Password:') !!}
    {!! Form::password('password', array('placeholder' => 'Enter New Password','class' => 'form-control')) !!}

</div>

<!-- Confirm Password Field -->
<div class="form-group col-sm-12">
    {!! Form::label('password_confirmation', 'Confirm Password:') !!}
    {!! Form::password('password_confirmation', array('placeholder' => 'Re-enter New Password','class' => 'form-control')) !!}

</div>
<div class="clearfix"></div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="" class="btn btn-default">Cancel</a>
</div>
