<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<!-- Featured Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('featured_image', 'Featured Image:') !!}
    {!! Form::file('featured_image') !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('sub_category_id', 'Sub Category:') !!}
    {!! Form::select('sub_category_id', $sub_categories, null, ['class' => 'form-control']) !!}
</div>
<!-- Expiry Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiry_time', 'Expiry Time:') !!}
    {!! Form::text('expiry_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Negotiable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_negotiable', 'Price Negotiable:') !!}
    {!! Form::select('price_negotiable', ['negotiable' => 'negotiable', ' fixed_price' => ' fixed_price'], null, ['class' => 'form-control']) !!}
</div>

<!-- Condition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condition', 'Condition:') !!}
    {!! Form::select('condition', $conditions, null, ['class' => 'form-control']) !!}
</div>

<!-- Used For Field -->
<div class="form-group col-sm-6">
    {!! Form::label('used_for', 'Used For:') !!}
    {!! Form::text('used_for', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery', 'Delivery:') !!}
    {!! Form::select('delivery', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_area', 'Delivery Area:') !!}
    {!! Form::select('delivery_area', $delivery_area, null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Charge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_charge', 'Delivery Charge:') !!}
    {!! Form::text('delivery_charge', null, ['class' => 'form-control']) !!}
</div>

<!-- Warranty Period Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warranty_period', 'Warranty Period:') !!}
    {!! Form::text('warranty_period', null, ['class' => 'form-control']) !!}
</div>


<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
</div>
