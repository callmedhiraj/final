@extends('layouts.app')
@section('title') Edit Role @endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('roles.index') !!}">Role</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit fa-lg"></i>
                            <strong>Edit Role</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}

                            @include('roles.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
