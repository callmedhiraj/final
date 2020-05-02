@include('web.layouts.header')


    <div class="my-account-section section position-relative pt-90 pb-60 pt-lg-80 pb-lg-50 pt-md-70 pb-md-40 pt-sm-60 pb-sm-30 pt-xs-50 pb-xs-20 fix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($messages=Session::get('success'))

                        <div class="alert alert-success">
                            <p>{{$messages}}</p>
                        </div>

                    @endif
                    @if($messages=Session::get('danger'))
                        <div class="alert alert-danger">
                            <p>{{$messages}}</p>
                        </div>
                    @endif
                    @if(isset($message))
                        <div class="col-12">
                            <div class="alert alert-success">
                                <p>{{$message}}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div></div>
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="row">

                        <!-- My Account Tab Menu Start -->
                        <div class="col-lg-3 col-12 mb-30">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="{{route('web.my-profile')}}" class="{{ Request::is('profile') ? 'active show' : '' }}" ><i class="fa fa-user-circle"></i>
                                    My Profile</a>
                                <a href="{{route('web.product.category')}}" class="{{ Request::is('add/product*') ? 'active show' : '' }}"><i class="fa fa-key"></i>Add Product</a>
                                <a href="{{route('web.change-password')}}" class="{{ Request::is('change-password') ? 'active show' : '' }}"><i class="fa fa-key"></i> Change Password</a>

                                <a href="{{route('web.logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <!-- <div class="col-lg-9 col-12 mb-30">
                            <div class="tab-content" id="myaccountContent">
 -->
                        <!-- Single Tab Content Start -->






                        <!-- Single Tab Content Start -->
                        <!-- <div class="tab-pane fade" id="address-edit" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Billing Address</h3>

                                <address>
                                    <p><strong>Alex Tuntuni</strong></p>
                                    <p>1355 Market St, Suite 900 <br>
                                        San Francisco, CA 94103</p>
                                    <p>Mobile: (123) 456-7890</p>
                                </address>

                                <a href="#" class="btn btn-round d-inline-block"><i class="fa fa-edit"></i>Edit Address</a>
                            </div>
                        </div> -->
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                    @yield('content')
                    <!-- Single Tab Content End -->
                        <!--  </div>
                     </div> -->
                        <!-- My Account Tab Content End -->
                    </div>

                </div>
            </div>
        </div>
    </div><!-- My Account Section End -->
</div>



@include('web.layouts.footer')
