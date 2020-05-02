@extends('web.layouts.app')
@section('title')
   Social Auth Register
@endsection
@section('content')
    <style>
        .textred{
            color:red;
        }
    </style>
    <div class="login-register-section section position-relative pt-90 pb-60 pt-lg-80 pb-lg-50 pt-md-70 pb-md-40 pt-sm-60 pb-sm-30 pt-xs-50 pb-xs-20 fix">
        <div class="container">
            <div class="row">
                <!-- Login Form Start -->
                <div class="col-lg-7 col-md-6 col-12 mb-30">
                    <div class="login-register-form">
                        <h3>Register Form</h3>
                        <form action="{{route('social-register')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12 mb-20">
                                    @if(isset($user->name))
                                    <input placeholder="Name" type="text" name="name" value="{{$user->name}}">
                                    @else
                                        <input placeholder="Name" type="text" name="name">
                                    @endif
                                    @if ($errors->has('name'))
                                        <span class="textred">
                                        {{ $errors->first('name') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-12 mb-20">
                                    @if(isset($user->email))
                                        <input placeholder="Enter your email" type="email" name="email" value="{{$user->email}}">
                                    @else
                                        <input placeholder="Enter your email" type="email" name="email">
                                    @endif

                                    @if ($errors->has('email'))
                                        <span class="textred">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                                <input type="hidden" name="provider" value="{{$service}}">
                                <input type="hidden" name="provider_id" value="{{$user->getId()}}">

                                <div class="col-lg-6 col-12 mb-20">
                                    <input placeholder="Phone Number " type="text" name="phone"  value="{{old('phone')}}">
                                    @if ($errors->has('phone'))
                                        <span class="textred">
                                        {{ $errors->first('phone') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-12 mb-20">
                                    {{ Form::select('city_id', $cities,null, array('class' => 'browser-default custom-select')) }}
                                    @if ($errors->has('city_id'))
                                        <span class="textred">
                                        {{ $errors->first('city_id') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-12 mb-20">
                                    <input placeholder="Address1" type="text" name="address1"  value="{{old('address1')}}">
                                    @if ($errors->has('address1'))
                                        <span class="textred">
                                        {{ $errors->first('address1') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-12 mb-20">
                                    <input placeholder="Address2" type="text" name="address2"  value="{{old('address2')}}">
                                    @if ($errors->has('address2'))
                                        <span class="textred">
                                        {{ $errors->first('address2') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-12 mb-20">
                                    <input  type="file" name="image">
                                </div>

                                <div class="col-12">
                                    <button  class="btn btn-round btn-lg" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login Form End -->
            </div>
        </div>
    </div><!-- Login & Register Section End -->
    </div>
@endsection
