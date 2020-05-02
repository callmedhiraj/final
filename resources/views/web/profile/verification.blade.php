@extends('web.layouts.app')
@section('title')
    Email Verification
@endsection
@section('content')
    <div class="cart-section section position-relative pt-90 pb-60 pt-lg-80 pb-lg-50 pt-md-70 pb-md-40 pt-sm-60 pb-sm-30 pt-xs-50 pb-xs-20 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2%">
                <div class="card mt-4" style="width: 40rem;">
                    <div class="card-body">
                        <h4 class="card-title">Email Address Verified </h4>
@if(\Illuminate\Support\Facades\Auth::check())
                            <p class="card-text">Your email is successfully verified.Now you can proceed further.Thank You!</p>
                            <a href="{{route('web.product.category')}}" class="btn btn-round btn-lg mt-10 float-right">Add Product</a>
@else
                        <p class="card-text">Your email is successfully verified.Now you can login and proceed further.Thank You!</p>
                        <a href="{{url('login-register')}}" class="btn btn-round btn-lg mt-10 float-right">Login</a>
    @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
        </div>
@endsection
