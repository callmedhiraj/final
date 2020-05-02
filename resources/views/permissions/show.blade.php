@extends('layouts.app')
@section('title')Permission Details @endsection
@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('cities.index') !!}">City</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">

                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{!! route('cities.index') !!}" class="btn btn-ghost-light">Back</a>
                             </div>
                             <div class="card-body">
                                 @include('cities.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
