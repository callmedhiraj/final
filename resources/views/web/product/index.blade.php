@extends('web.layouts.app')
@section('content')
    <!-- Product Section Start -->
    <div class="product-section section pt-90 pb-90 pt-lg-80 pb-lg-80 pt-md-70 pb-md-70 pt-sm-60 pb-sm-60 pt-xs-50 pb-xs-50">
        <div class="container">
            <div class="row">

                <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2">

                    <!-- Shop Toolbar Start -->
                    <div class="row">
                        <div class="col">
                            <div class="shop-toolbar">
                                <div class="product-showing mr-auto">
                                    <p>Showing 9 of 72</p>
                                </div>
                                <div class="product-short">
                                    <p>Short by</p>
                                    <select class="nice-select">
                                        <option value="trending">Trending items</option>
                                        <option value="sales">Best sellers</option>
                                        <option value="rating">Best rated</option>
                                        <option value="date">Newest items</option>
                                        <option value="price-asc">Price: low to high</option>
                                        <option value="price-desc">Price: high to low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!-- Shop Toolbar End -->

                    <div class="shop-product-wrap grid row">

                        @foreach($products as $product)
                            <?php  $product_rating=\App\Models\Review::where('product_id',$product->id)->avg('rating');?>
                        <!-- Product Item Start -->
                        <div class="col-xl-4 col-sm-6 col-12 mb-30">
                            <div class="product-item grid">
                                <!-- Image -->
                                <div class="product-image">
                                    <!-- Image -->
                                    <a href="{!! route('web.product.show',['slug'=>$product->product_code]) !!}" class="image"><img src="{{imageUrl('storage/'.$product->featured_image,230,278,100)}}" alt=""></a>
                                    <!-- Product Action -->
                                    <div class="product-action">
                                        <a href="{{route('web.cart.add',['product_code'=>$product->product_code])}}" class="cart"><span></span></a>
                                        <a href="#" class="wishlist"><span></span></a>
                                        <a href="#" class="quickview"><span></span></a>
                                    </div>
                                </div>
                                <!-- Content -->
                                <div class="product-content">
                                    <div class="head">
                                        <!-- Title-->
                                        <div class="top">
                                            <h4 class="title"><a href="{!! route('web.product.show',['slug'=>$product->product_code]) !!}">{!! $product->title !!}</a></h4>
                                        </div>
                                        <!-- Price & Ratting -->
                                        <div class="bottom">
                                            <span class="price">Rs.{!! $product->price !!}</span>
                                            <span class="ratting">
                                               @for($x = 5; $x > 0; $x--)
                                                    @php
                                                        if($product_rating > 0.5){
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }elseif($product_rating <= 0 ){
                                                            echo '<i class="fa fa-star-o"></i>';
                                                        }else{
                                                            echo '<i class="fa fa-star-half-o"></i>';
                                                        }
                                                        $product_rating--;
                                                    @endphp
                                                @endfor
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Product Item End -->

                     @endforeach

                    </div>

                    <div class="row mt-20">
                        <div class="col">

                           {!! $products->links()!!}

                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-md-15 pr-xs-15">

                    <div class="sidebar">
                        <h4 class="sidebar-title">Search</h4>
                        <div class="sidebar-search">
                            <form action="#">
                                <input type="text" placeholder="Enter key words">
                                <input type="submit" value="search">
                            </form>
                        </div>
                    </div>

                    <div class="sidebar">
                        <h4 class="sidebar-title">Brand</h4>
                        <ul class="sidebar-list">
                            <li><a href="#">Baizidale Momone</a></li>
                            <li><a href="#">Murikhete Paris</a></li>
                            <li><a href="#">Vortahole Valohoi</a></li>
                            <li><a href="#">Origeno Veledita</a></li>
                            <li><a href="#">Buffekhete Parbi</a></li>
                            <li><a href="#">Makorone Cicile</a></li>
                        </ul>
                    </div>

                    <div class="sidebar">
                        <h4 class="sidebar-title">Price</h4>
                        <div id="price-range"></div>
                    </div>

                    <div class="sidebar">
                        <div class="banner"><a href="#"><img src="assets/images/banner/banner-3.jpg" alt=""></a></div>
                    </div>

                    <div class="sidebar">
                        <h4 class="sidebar-title">Tags</h4>
                        <div class="tag-cloud">
                            <a href="#">Oil</a>
                            <a href="#">Beard oil</a>
                            <a href="#">Beard</a>
                            <a href="#">Stylish</a>
                            <a href="#">Ecommerce</a>
                            <a href="#">Shop</a>
                            <a href="#">Shopping</a>
                            <a href="#">Store</a>
                            <a href="#">Online Store</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div><!-- Product Section End -->
@endsection
