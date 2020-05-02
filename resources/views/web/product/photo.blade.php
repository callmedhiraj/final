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
