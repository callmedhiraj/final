@extends('web.layouts.app')
@section('styles')
    <style>
        .starrating > input {display: none;}  /* Remove radio buttons */

        .starrating > label:before {
            content: "\f005"; /* Star */
            margin: 2px;
            font-size:16px;
            font-family: 'FontAwesome';
            font-weight:bold;
            display: inline-block;
        }

        .starrating > label
        {
            color: #222222; /* Start color when not clicked */
        }

        .starrating > input:checked ~ label
        { color: #d0a97e ; } /* Set yellow color when star checked */

        .starrating > input:hover ~ label
        { color: #d0a97e ;  } /* Set yellow color when star hover */

        .rating{
            font-size:46px;
            font-weight:bold;
        }
        .btn {
            height: 26px;
            line-height: 18px;
            padding: 1px 9px;
            margin-top: -52px;
        }
        .done_btn
        {
            height: 26px;
            line-height: 18px;
            padding: 3px 7px 12px 20px;
            margin-top: -19px;
        }
    </style>
@endsection

@section('content')
    <!-- Product Section Start -->
    <div class="product-section section pt-90 pb-90 pt-lg-80 pb-lg-80 pt-md-70 pb-md-70 pt-sm-60 pb-sm-60 pt-xs-50 pb-xs-50">
        <div class="container">
            <div class="row">

                <div class="col-12">

                    <div class="product-details mb-50">
                        <!-- Image -->
                        <div class="product-image right-thumbnail mb-xs-20">
                            <!-- Image -->
                            <div class="product-slider single-product-slider-syn">
                                <div class="item"><img src="assets/images/product/product-1.jpg" alt=""></div>
                                <div class="item"><img src="assets/images/product/product-2.jpg" alt=""></div>
                                <div class="item"><img src="assets/images/product/product-3.jpg" alt=""></div>
                                <div class="item"><img src="assets/images/product/product-4.jpg" alt=""></div>
                                <div class="item"><img src="assets/images/product/product-5.jpg" alt=""></div>
                            </div>
                            <div class="product-slider single-product-thumb-slider-syn" data-vertical="true">
                                <div class="item"><img src="assets/images/product/product-1.jpg" alt=""></div>
                                <div class="item"><img src="assets/images/product/product-2.jpg" alt=""></div>
                                <div class="item"><img src="assets/images/product/product-3.jpg" alt=""></div>
                                <div class="item"><img src="assets/images/product/product-4.jpg" alt=""></div>
                                <div class="item"><img src="assets/images/product/product-5.jpg" alt=""></div>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="product-content">
                            <div class="product-content-inner">
                                <div class="head">
                                    <!-- Title-->
                                    <div class="top">
                                        <h4 class="title">{{$product->title}}</h4>
                                    </div>
                                    <!-- Price & Ratting -->
                                    <div class="bottom">
                                        <span class="price">Rs.{{$product->price}}</span>
                                        <span class="ratting">
                                           @for($x = 5; $x > 0; $x--)
                                                @php
                                                    if($rating > 0.5){
                                                        echo ' <i class="fa fa-star"></i>';
                                                    }elseif($rating <= 0 ){
                                                        echo '<i class="fa fa-star-o"></i>';
                                                    }else{
                                                        echo '<i class="fa fa-star-half-o"></i>';
                                                    }
                                                    $rating--;
                                                @endphp
                                            @endfor
                                        </span>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>{{$product->description}}</p>

                                    <div class="size">
                                        <h4>Used For:</h4>
                                        <button>{!! $product->used_for !!}</button>
                                        <h4>Condition:</h4>
                                        <button>{!! $product->condition !!}</button>
                                        <h4>Expiry Time:</h4>
                                        <button>{!! $product->expiry_time !!}</button>
                                    </div>
                                    <div class="vitamin">
                                        <h4>Warranty:</h4>
                                        <button>{!! $product->warranty_period !!}</button>
                                    </div>

                                    {{--<div class="quantity">--}}
                                        {{--<h4>Quantity:</h4>--}}
                                        {{--<div class="pro-qty"><input type="text" value="1"></div>--}}
                                    {{--</div>--}}

                                    <!-- Product Action -->
                                    <div class="product-action">
                                        <a href="{{route('web.cart.add',['product_code'=>$product->product_code])}}" class="cart"><span></span></a>
                                        <a href="#" class="compare"><span></span></a>
                                        <a href="#" class="wishlist"><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="product-details-tab-list nav">
                        <li><a class="active" data-toggle="tab" href="#description">Description</a></li>
                        <li><a data-toggle="tab" href="#specification">Specification</a></li>
                        <li><a data-toggle="tab" href="#reviews">Reviews(15)</a></li>
                    </ul>
                    <div class="product-details-tab-content tab-content">
                        <div class="tab-pane active" id="description">
                            <p>{{$product->description}}</p>
                        </div>
                        <div class="tab-pane" id="specification">
                            <ul class="specification">
                                @foreach($product->attribute as $attribute)
                                <li>{!! $attribute->feature !!}:{!! $attribute->pivot->value !!}</li>
                                    @endforeach
                            </ul>
                        </div>

                        <div class="tab-pane" id="reviews">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <?php $user=\Illuminate\Support\Facades\Auth::user();
                                $userIDs=\App\Models\Review::where('product_id',$product->id)->pluck('user_id')->toArray();?>

                                @if(count($reviews)!=0)
                                    <div class="review-list">
                                        @if(in_array($user->id,$userIDs))
                                            @foreach($reviews as $review)
                                                @if($review->user_id==$user->id)
                                                    <div class="review">
                                                        <h4 class="name">{!! $review->users->name !!} <span>{!! $review->date->format('M d, Y') !!}</span></h4>
                                                        <div class="ratting no_form">
                                                            @for($i=1;$i<=$review->rating;$i++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                            @for($i=1;$i<=(5-$review->rating);$i++)
                                                                <i class="fa fa-star-o"></i>
                                                            @endfor
                                                        </div>
                                                        <div class="desc no_form">
                                                            <p>{!! $review->description !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="review yes_form">
                                                        {!! Form::open( ['route' => ['web.review.update', $review->id], 'method' => 'post']) !!}
                                                        <input type="hidden" name="product_code" value="{{$product->product_code}}">


                                                        <div class="starrating risingstar d-flex justify-content-end flex-row-reverse">
                                                            @for($i=5; $i>=1;$i--)
                                                                <input type="radio" id="star{{$i}}" name="rating" value="{{$i}}" <?php if ($i == $review->rating) { echo 'checked'; } ?>/><label for="star{{$i}}" title="{{$i}}star"></label>
                                                            @endfor
                                                        </div>


                                                        <div class="row row-10">
                                                            <div class="col-12 mb-20"><textarea placeholder="Review" name="description">{{$review->description}}</textarea></div>
                                                            <button type="submit" class="btn btn-primary done_btn">Done</button>
                                                        </div>

                                                        {!! Form::close() !!}
                                                    </div>
                                                    <button id="Mybtn" class="btn btn-primary">Edit</button>

                                                    <a href="{{route('web.review.delete', $review->id)}}">  <button id="del_btn" class="btn btn-primary">Delete</button></a>



                                                @else
                                                    <div class="review">
                                                        <h4 class="name">{!! $review->users->name !!} <span>{!! $review->date->format('M d, Y') !!}</span></h4>
                                                        <div class="ratting">
                                                            @for($i=1;$i<=$review->rating;$i++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                            @for($i=1;$i<=(5-$review->rating);$i++)
                                                                <i class="fa fa-star-o"></i>
                                                            @endfor
                                                        </div>
                                                        <div class="desc">
                                                            <p>{!! $review->description !!}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        @else
                                            @foreach($reviews as $review)
                                                <div class="review">
                                                    <h4 class="name">{!! $review->users->name !!} <span>{!! $review->date->format('M d, Y') !!}</span></h4>
                                                    <div class="ratting">
                                                        @for($i=1;$i<=$review->rating;$i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                        @for($i=1;$i<=(5-$review->rating);$i++)
                                                            <i class="fa fa-star-o"></i>
                                                        @endfor
                                                    </div>
                                                    <div class="desc">
                                                        <p>{!! $review->description !!}</p>
                                                    </div>
                                                </div>

                                            @endforeach
                                            <div class="review-form">
                                                <h3>Give your Review:</h3>
                                                <form action="{{route('web.review.store')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_code" value="{{$product->product_code}}">


                                                    <div class="starrating risingstar d-flex justify-content-end flex-row-reverse">
                                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                                                        <input type="radio" id="star1" name="rating" value="1" checked/><label for="star1" title="1 star"></label>
                                                    </div>


                                                    <div class="row row-10">
                                                        <div class="col-12 mb-20"><textarea placeholder="Review" name="description"></textarea></div>
                                                        <div class="col-12"><input type="submit" value="Submit"></div>
                                                    </div>

                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="review-list">
                                        <div class="review-form">
                                            <h3>Give your Review:</h3>
                                            <form action="{{route('web.review.store')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_code" value="{{$product->product_code}}">


                                                <div class="starrating risingstar d-flex justify-content-end flex-row-reverse">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" checked/><label for="star1" title="1 star"></label>
                                                </div>


                                                <div class="row row-10">
                                                    <div class="col-12 mb-20"><textarea placeholder="Review" name="description"></textarea></div>
                                                    <div class="col-12"><input type="submit" value="Submit"></div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                @endif















                            @else
                                <div class="review-list">
                                    @if(count($reviews)!=0)
                                        @foreach($reviews as $review)
                                            <div class="review">
                                                <h4 class="name">{!! $review->users->name !!} <span>{!! $review->date->format('M d, Y') !!}</span></h4>
                                                <div class="ratting">
                                                    @for($i=1;$i<=$review->rating;$i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for($i=1;$i<=(5-$review->rating);$i++)
                                                        <i class="fa fa-star-o"></i>
                                                    @endfor
                                                </div>
                                                <div class="desc">
                                                    <p>{!! $review->description !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif




                        </div>

                    </div>

                    <!-- Product Slider 4 Column Start-->
                    <div class="row mt-50">

                        <div class="section-title left section col mb-40 mb-xs-30">
                            <h1>Related Product</h1>
                        </div>

                        <div class="product-slider product-slider-4 section">
                            @foreach($allproducts as $allproduct)
                                <?php  $product_rating=\App\Models\Review::where('product_id',$allproduct->id)->avg('rating');?>
                                <!-- Product Item Start -->

                            <div class="col">
                                <div class="product-item">
                                    <!-- Image -->
                                    <div class="product-image">
                                        <!-- Image -->
                                        <a href="{!! route('web.product.show',['slug'=>$allproduct->product_code]) !!}" class="image"><img src="{{imageUrl('storage/'.$allproduct->featured_image,230,278,100)}}" alt=""></a>
                                        <!-- Product Action -->
                                        <div class="product-action">
                                            <a href="{{route('web.cart.add',['product_code'=>$allproduct->product_code])}}" class="cart"><span></span></a>
                                            <a href="#" class="wishlist"><span></span></a>
                                            <a href="#" class="quickview"><span></span></a>
                                        </div>
                                    </div>
                                    <!-- Content -->
                                    <div class="product-content">
                                        <div class="head">
                                            <!-- Title-->
                                            <div class="top">
                                                <h4 class="title"><a href="{!! route('web.product.show',['slug'=>$allproduct->product_code]) !!}">{!! $allproduct->title !!}</a></h4>
                                            </div>
                                            <!-- Price & Ratting -->
                                            <div class="bottom">
                                                <span class="price">Rs.{!! $allproduct->price !!}</span>
                                                <span class="ratting">
                                                    @for($y = 5; $y > 0; $y--)
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
                    </div><!-- Product Slider 4 Column End-->

                </div>

            </div>
        </div>
    </div><!-- Product Section End -->
@endsection
@section('scripts')
    <script>
        $('.yes_form').hide();
    </script>
    <script>
        $(document).ready(function(){
            $('#Mybtn').click(function(){
                $('.no_form').hide();
                $('#Mybtn').hide();
                $('#del_btn').hide();
                $('.yes_form').show();
            });
        });
    </script>
    @endsection
