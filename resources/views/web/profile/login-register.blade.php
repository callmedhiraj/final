@extends('web.layouts.app')
@section('title')
    Login & Register
@endsection
@section('content')
<style>
    .custom-select {
        height: calc(3.25rem + -7px);
        border-radius: 3.25rem;
        border: 1px solid #ebebeb;
    }

    .textred{
        color:red;
    }
    .facebook_btn
    {
        background-color: #3b5998;
        border-color: #3b5998;
    }
    .facebook_btn:focus
    {
        background-color: #3b5998;
        border-color: #3b5998;
    }
    .facebook_btn:hover
    {
        background-color: #1B3968;
        border-color: #3b5998;
        color:#fff;
    }
    .goggle_btn
    {
        background-color: #4285F4;
        border-color: #4285F4;
    }
    .goggle_btn:focus
    {
        background-color: #4285F4;
        border-color:#4285F4;
    }
    .goggle_btn:hover
    {
        background-color: #2366D5;
        border-color: #2366D5;
        color:#fff;
    }
</style>
<?php $cities=\App\Models\City::pluck('name','id')->toArray(); ?>
    <div class="login-register-section section position-relative pt-90 pb-60 pt-lg-80 pb-lg-50 pt-md-70 pb-md-40 pt-sm-60 pb-sm-30 pt-xs-50 pb-xs-20 fix">
        <div class="container">
            <div class="row">
                <!-- Login Form Start -->
                <div class="col-lg-4 col-md-6 col-12 mr-auto mb-30">
                    <div class="login-register-form">
                        <h3>Already a Member?</h3>
                        <form action="{{route('web.login')}}" method="post">
                            @csrf
                                <div class="row">
                                <div class="col-12 mb-20">
                                    <input placeholder="Email or Username" type="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <span class="textred">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-12 mb-20">
                                    <input placeholder="Password" type="password" name="password">
                                    @if ($errors->has('password'))
                                    <span class="textred">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-round btn-lg">Login</button>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/password/reset') }}" class="btn btn-round btn-lg"><i class="fas fa-key" style="font-size: 15px;margin-right: 0px;"></i>&nbsp;Forgot Password</a>
                                </div>
                                <div class="col-6">
                                    <a href="{{url('/redirect/facebook')}}" class="btn btn-round btn-lg mt-10 facebook_btn">
                                        <i class="fab fa-facebook-f"></i>&nbsp;Login
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login Form End -->
                <!-- Login Form Start -->
                <div class="col-lg-7 col-md-6 col-12 mb-30">
                    <div class="login-register-form">
                        <h3>Register Form</h3>
                        <form action="{{route('web.register')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12 mb-20">
                                    <input placeholder="Name" type="text" name="register_name" value="{{old('register_name')}}">
                                    @if ($errors->has('register_name'))
                                    <span class="textred">
                                        {{ $errors->first('register_name') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-12 mb-20">
                                    <input placeholder="Enter your email" type="email" name="register_email"  value="{{old('register_email')}}">
                                    @if ($errors->has('register_email'))
                                    <span class="textred">
                                        {{ $errors->first('register_email') }}
                                    </span>
                                    @endif
                                </div>
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
                                    <input placeholder="Password" type="password" name="register_password" value="{{old('register_password')}}">
                                    @if ($errors->has('register_password'))
                                    <span class="textred">
                                        {{ $errors->first('register_password') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-12 mb-20">
                                    <input placeholder="Repeat Password" type="password" name="confirm-password" value="{{old('confirm-password')}}">
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
