<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bardy - SHARED ON THEMELOCK.COM</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    {{--<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">--}}

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/bootstrap.min.css')}}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/font-awesome.min.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/plugins.css')}}">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/helper.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <!-- Modernizer JS -->
    @yield('styles')
    <script src="{{asset('web/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
<div class="main-wrapper">

    <!-- Header Section Start -->
    <div class="header-section section bg-theme">
        <div class="container">
            <div class="row">

                <!-- Header Logo -->
                <div class="col">
                    <div class="header-logo">
                        <a href="index.html">
                            {{--<img src="assets/images/logo.png" alt="">--}}
                        </a>
                    </div>
                </div>

                <?php $allcategories=\App\Models\Category::all(); ?>
                <!-- Main Menu -->
                <div class="col d-none d-lg-block">
                    <nav class="main-menu">
                        <ul>
                            <li><a href="{{url('/')}}">HOME</a>
                            </li>
                            <li><a href="#">ABOUT</a></li>
                            <li><a href="#" onclick="return false;">SHOP</a>
                                <ul class="mega-menu">
                                    @foreach($allcategories as $cat)

                                    <li class="col"><a href="#">{{$cat->name}}</a>
                                        <ul>
                                            @foreach($cat->subcategories as $subcat)                            <li><a href="{!! route('web.products.index',['cat_slug'=>$subcat->slug]) !!}">{{$subcat->name}}</a></li>
                                                @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            @if(!\Illuminate\Support\Facades\Auth::check())
                            <li><a href="{{route('web.login-register')}}">Login</a></li>
                                @else
                                <li><a href="{{route('web.my-profile')}}">MyAccount</a></li>
                                @endif
                        </ul>
                    </nav>
                </div>

                <!-- Header Action -->
                <div class="col">
                    <div class="header-action">

                        <!-- Wishlist -->
                        <a href="wishlist.html" class="header-wishlist"><span class="icon">wishlist</span></a>

                        <!-- Cart Wrap Start-->
                        <div class="header-cart-wrap">
                            <!-- Cart Toggle -->
                            <button class="header-cart-toggle"><span class="icon">cart</span><span class="number">2</span><span class="price">$289</span></button>

                            <!-- Header Mini Cart Start -->
                            <div class="header-mini-cart">
                                <!-- Mini Cart Head -->
                                <div class="mini-cart-head">
                                    <h3>Your cart</h3>
                                </div>
                                <!-- Mini Cart Body -->
                                <div class="mini-cart-body">
                                    <div class="mini-cart-body-inner custom-scroll">
                                        <ul>
                                            <!-- Mini Cart Product -->
                                            <li class="mini-cart-product">
                                                <div class="image">
                                                    <a href="#"><img src="assets/images/product/product-1.jpg" alt=""></a>
                                                    <button class="remove"><i class="fa fa-trash-o"></i></button>
                                                </div>
                                                <div class="content">
                                                    <a href="product-details-variable.html" class="title">Teritory Quentily</a>
                                                    <span>2 x $35.00</span>
                                                </div>
                                            </li>
                                            <!-- Mini Cart Product -->
                                            <li class="mini-cart-product">
                                                <div class="image">
                                                    <a href="#"><img src="assets/images/product/product-2.jpg" alt=""></a>
                                                    <button class="remove"><i class="fa fa-trash-o"></i></button>
                                                </div>
                                                <div class="content">
                                                    <a href="product-details-variable.html" class="title">Adurite Silocone</a>
                                                    <span>1 x $59.00</span>
                                                </div>
                                            </li>
                                            <!-- Mini Cart Product -->
                                            <li class="mini-cart-product">
                                                <div class="image">
                                                    <a href="#"><img src="assets/images/product/product-3.jpg" alt=""></a>
                                                    <button class="remove"><i class="fa fa-trash-o"></i></button>
                                                </div>
                                                <div class="content">
                                                    <a href="product-details-variable.html" class="title">Baizidale Momone</a>
                                                    <span>1 x $78.00</span>
                                                </div>
                                            </li>
                                            <!-- Mini Cart Product -->
                                            <li class="mini-cart-product">
                                                <div class="image">
                                                    <a href="#"><img src="assets/images/product/product-4.jpg" alt=""></a>
                                                    <button class="remove"><i class="fa fa-trash-o"></i></button>
                                                </div>
                                                <div class="content">
                                                    <a href="product-details-variable.html" class="title">Makorone Cicile</a>
                                                    <span>2 x $65.00</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Mini Cart Footer -->
                                <div class="mini-cart-footer">
                                    <h4>Subtotal: $272.00</h4>
                                    <div class="buttons">
                                        <a href="cart.html">View cart</a>
                                        <a href="checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div><!-- Header Mini Cart End -->

                        </div><!-- Cart Wrap End-->

                    </div>
                </div>

                <div class="col-12 d-block d-lg-none">
                    <div class="mobile-menu"></div>
                </div>

            </div>
        </div>
    </div><!-- Header Section End -->

