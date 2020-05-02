@extends('layouts.app')
@section('title') Profile | Change Password @endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Profile</li>
        <li class="breadcrumb-item">Change Password</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-plus-square-o fa-lg"></i>
                            <strong>Change Password</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'profile.store_password']) !!}

                            @include('profiles.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
