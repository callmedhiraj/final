@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('subCategories.index') !!}">Sub Category</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             {{--@include('coreui-templates::common.errors')--}}
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit Sub Category</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($subCategory, ['route' => ['subCategories.update', $subCategory->id], 'method' => 'patch']) !!}

                              @include('sub_categories.fields')

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
                    url: "{{route('sub_categories.attribute')}}",
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
