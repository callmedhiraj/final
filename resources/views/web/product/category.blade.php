@extends('web.layouts.app1')


@section('content')
    <div class="col-lg-9 col-12 mb-30">
        <div class="myaccount-content">
            <h3 style="font-size: 40px;">Choose Category</h3>

            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3>{{$category->name}}</h3>
                            <ul>
                                @foreach($category->subcategories as $subcategory)
                                    <li><a href="{!! route('web.product.add',['slug'=> $subcategory->slug]) !!}" style="color:#000;">{!! $subcategory->name !!}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Single Tab Content End -->



@endsection
