
<div class="row">
    <div class="col-md-8">
        <img src="{{asset('storage/'.$product->featured_image)}}" style="height:400px;width: 100%; display: block;">
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3><i class="fa fa-align-right"></i> Product Details</h3></div>
            <div class="panel-body facts">
                <table class="table table-striped" style="width:100%" class="toc" id="toc">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$product->title}}</td>
                    </tr>
                    @foreach($product->sub_category as $subCategory)
                    <tr>
                        <th>Sub Category</th>
                        <td>{{$subCategory->name}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th>Price</th>
                        <td>Rs.{{$product->price}}</td>
                    </tr>
                    <tr>
                        <th>Condition</th>
                        <td>{{$product->condition}}</td>
                    </tr>
                    <tr>
                        <th>Used For</th>
                        <td>{{$product->used_for}}</td>
                    </tr>
                    <tr>
                        <th>Warranty Period</th>
                        <td>{{$product->warranty_period}}</td>
                    </tr>
                    <tr>
                        <th>Expiry Time</th>
                        <td>{{$product->expiry_time}}</td>
                    </tr>
                    @if($product->delivery==1)
                    <tr>
                        <th>Delivery Area</th>
                        <td>{{$product->delivery_area}}</td>
                    </tr>
                    <tr>
                        <th>Delivery Charge</th>
                        <td>{{$product->delivery_charge}}</td>
                    </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="margin-bottom: 20px;">

        <h4>Description</h4>
        {!! $product->description !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h4>Attributes</h4>
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                Attributes
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-striped" id="categories-table">
                        <thead>
                        <th>Feature</th>
                        <th>Value</th>
                        </thead>
                        <tbody>
                        @foreach($product->attribute as $attribute)
                            <tr>
                                <td>{{ $attribute->feature }}</td>
                                <td>{{ $attribute->pivot->value }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pull-right mr-3">


                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @if($product->status==1)
                <a  href="{!! route('product.approval', $product->id) !!}"><span class="btn btn-success">Approved</span> </a>
            @endif
    </div>
</div>
