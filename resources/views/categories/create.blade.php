@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('categories.index') !!}">Category</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create Category</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'categories.store']) !!}

                                   @include('categories.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
@section('scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $('.js-multiple').select2({
                theme:'bootstrap',
                tags: true,
                tokenSeparators: [",", "/t"],
                createTag: function(newTag) {
                    return {
                        id: 'new:' + newTag.term,
                        text: newTag.term + ' (new)'
                    };
                },
                ajax: {
                    url: "{{route('categories.subcategory')}}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });



        });
    </script>
    @endsection
