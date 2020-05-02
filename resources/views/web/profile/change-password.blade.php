@extends('web.layouts.app1')
@section('title')
    Change Password
@endsection
@section('content')

                                <!-- Single Tab Content Start -->
                                <div class="col-lg-9 col-12 mb-30">
                                    <div class="myaccount-content">
                                        <!-- <h3>Account Details</h3>-->
                                        <div class="account-details-form">
                                            <form action="{{route('web.update-password')}}" method="post">
                                                @csrf
                                                @foreach ($errors->all() as $error)
                                                    <p class="text-danger">{{ $error }}</p>
                                                @endforeach
                                                <div class="row">
                                                    <div class="col-12 mb-30"><h3>Password change</h3></div>

                                                    <div class="col-6 mb-30">
                                                        <input id="current-pwd" placeholder="Current Password" type="password" name="current_password">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <input id="new-pwd" placeholder="New Password" type="password" name="new_password">
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-30">
                                                        <input id="confirm-pwd" placeholder="Confirm Password" type="password" name="confirm_password">
                                                    </div>
                                                </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-round btn-lg">Save Changes</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
@endsection
