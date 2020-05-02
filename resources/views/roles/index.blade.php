@extends('layouts.app')
@section('title') Roles @endsection
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">Roles</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        Roles

                            <a class="pull-right" href="{!! route('roles.create') !!}"><i class="fa fa-plus-square fa-lg"></i></a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>

                                            <a href="{!! route('roles.show', [$role->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                                                <a href="{!! route('roles.edit', [$role->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>

                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                                {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
