@extends('web.layouts.app1')
@section('styles')
    <style>
        .custom-select
        {
            height: calc(2.25rem + 7px);
            border-radius: 2.25rem;
            border: 1px solid #ebebeb;
        }
    </style>
    @endsection
@section('content')
    <?php $user=\Illuminate\Support\Facades\Auth::user();
    $cities = \App\Models\City::pluck('name','id');
    ?>
    <div class="col-lg-9 col-12 mb-30">
        <div class="myaccount-content">
            <div class="float-right">
                @if($user->image==null)
                    <img src="{{ imageUrl('web/assets/images/7.png',120,120,100) }}">
                    @else
                    <img src="{{ imageUrl('storage/'.$user->image,120,120,100) }}">
                @endif
            </div>
            <div class="welcome">
                <p>Hello&nbsp;<strong>{{$user->name}},<br></strong></p>
            </div>
                <p class="mb-0">Thank you for Login!<br>From your account dashboard, you can easily add,edit  and view your ad and purchase details and edit your password and account details.</p>
        </div>
        @include('web.profile.my-account')
    </div>
@endsection
