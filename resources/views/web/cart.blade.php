@extends('web.layouts.app')
@section('content')


    <!-- Cart Section Start -->
    <div class="cart-section section position-relative pt-90 pb-60 pt-lg-80 pb-lg-50 pt-md-70 pb-md-40 pt-sm-60 pb-sm-30 pt-xs-50 pb-xs-20 fix">
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

                    <form action="#">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb-30">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)

                                    <?php $product=\App\Models\Product::where('id',$cart->product_id)->first(); ?>
                                    <input type="hidden" value="{{$cart->id}}" id="cart-id">
                                    <input type="hidden" value="{{$product->price}}" id="cart-price">
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img src="{{imageUrl('storage/'.$product->image,90,100,100)}}" alt="Product"></a></td>
                                    <td class="pro-title"><a href="#">{{$product->title}}</a></td>
                                    <td class="pro-price"><span>Rs.{{$product->price}}</span></td>

                                    <td class="pro-quantity">
                                        <div class="pro-qty"><input type="text" value="{{$cart->quantity}}"></div></td>
                                    <td class="pro-subtotal" id="cart-total"><span>Rs.{{$cart->quantity*$product->price}}</span></td>
                                    <td class="pro-remove"><a href="{{route('web.cart.delete',['id'=>$cart->id])}}"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </form>

                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5">
                            <!-- Calculate Shipping -->
                            <div class="calculate-shipping">
                                <h4>Calculate Shipping</h4>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-25">
                                            <select class="nice-select">
                                                <option>Bangladesh</option>
                                                <option>China</option>
                                                <option>country</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <select class="nice-select">
                                                <option>Dhaka</option>
                                                <option>Barisal</option>
                                                <option>Khulna</option>
                                                <option>Comilla</option>
                                                <option>Chittagong</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="text" placeholder="Postcode / Zip">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="submit" value="Estimate">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Discount Coupon -->
                            <div class="discount-coupon">
                                <h4>Discount Coupon Code</h4>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="text" placeholder="Coupon Code">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="submit" value="Apply Code">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Cart Summary -->
                        <div class="col-lg-6 col-12 mb-30 d-flex">
                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <h4>Cart Summary</h4>
                                    <p>Sub Total <span>$296.00</span></p>
                                    <p>Shipping Cost <span>$00.00</span></p>
                                    <h2>Grand Total <span>$296.00</span></h2>
                                </div>
                                <div class="cart-summary-button">
                                    <button class="checkout-btn">Checkout</button>
                                    <button class="update-btn">Update Cart</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div><!-- Cart Section End -->

 @endsection
@section('scripts')
    <script>
        $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
        $('.pro-qty').append('<span class="inc qtybtn">+</span>');
        $('.qtybtn').on('click', function() {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            var id = $("#cart-id").val();
            var price=$("#cart-price").val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                }

                else {
                    newVal = 0;
                }
            }
            console.log(newVal)
            var total=newVal*price;
            $button.parent().find('input').val(newVal);
            $("#cart-total").html('Rs.'+total);
            $.ajax({
                url:"{!! route('web.cart.update') !!}",
                method:"GET",
                data:{id:id,total:total,qty:newVal},
                success:function(data){

                }
            });
        });
    </script>
@endsection
