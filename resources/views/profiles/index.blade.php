@extends('layouts.app')
@section('title') Profile @endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Profile</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h3><i class="fa fa-align-right"></i>Profile Data</h3></div>
                        <div class="panel-body facts">
                            <table class="table table-striped" style="width:100%" class="toc" id="toc">
                                <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$user->email}}</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                        <div class="panel-footer">
                            <a href="{{route('profile.edit',['id'=>$user->id])}}" ><button type="button" class="btn btn-info">Update Data</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
