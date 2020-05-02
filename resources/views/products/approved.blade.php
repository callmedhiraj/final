@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Approved Products</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Approved Products
                            {{--<a class="pull-right" href="{{ route('products.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>--}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-striped" id="products-table">
                                    <thead>
                                    <th>Title</th>
                                    <th>Featured Image</th>
                                    <th>Expiry Time</th>
                                    <th>Price</th>
                                    <th>Condition</th>
                                    <th>Used For</th>
                                    <th>Delivery</th>
                                    <th>Warranty Period</th>
                                    <th colspan="3">Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->title }}</td>
                                            <td><img src="{{imageUrl('storage/'.$product->featured_image,90,100,100)}}"></td>
                                            <td>{{ $product->expiry_time }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->condition }}</td>
                                            <td>{{ $product->used_for }}</td>
                                            <td>{{ $product->delivery }}</td>
                                            <td>{{ $product->warranty_period }}</td>
                                            <td>
                                                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                                                    {{--<a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>--}}
                                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right mr-3">



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

