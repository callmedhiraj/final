@extends('web.layouts.app')

@section('content')
    <div class="cart-section section position-relative pt-90 pb-60 pt-lg-80 pb-lg-50 pt-md-70 pb-md-40 pt-sm-60 pb-sm-30 pt-xs-50 pb-xs-20 fix">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(\Illuminate\Support\Facades\Auth::check())
                <?php $user=\Illuminate\Support\Facades\Auth::user();?>
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('You should Verfied your email to post ad.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request') }}</button>.
                        </form>
                    </div>
                </div>
                @else
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
                @endif
        </div>
    </div>
</div>
    </div>
@endsection
