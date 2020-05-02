@extends('layouts.app')
@section('title') Update Data @endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">User</a>
        </li>
        <li class="breadcrumb-item active">Update</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit fa-lg"></i>
                            <strong>Update Data</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'post']) !!}


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
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
