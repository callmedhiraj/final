<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{


    public function index($slug)
    {
        $subcategories=SubCategory::where('slug',$slug)->first();
        if(empty($subcategories))
        {
            return redirect()->back();
        }
        else
        {
            $products=$subcategories->product()->where('status',2)->paginate(2);
            return view('web.product.index',compact('products'));
        }

    }
    public function show($slug)
    {
        $product=Product::where('product_code',$slug)->where('status',2)->first();
        if(empty($product))
        {
            return redirect()->back();
        }

        $rating=Review::where('product_id',$product->id)->avg('rating');
        $reviews=Review::where('product_id',$product->id)->get();
        foreach($product->sub_category as $subCat)
        {
            $allproducts=$subCat->product()->where('products.id','!=',$product->id)->where('products.status',2)->get();
        }

        return view('web.product.show',compact('product','reviews','rating','allproducts'));

    }
    public function category()
    {
        $categories=Category::all();
        return view('web.product.category',compact('categories'));
    }
    public function add($slug)
    {
        $subcategory=SubCategory::where('slug',$slug)->first();

        $conditions=['New(not used)','Used Few times','Excellent','Good','Not working'];

        $delivery_area=['within my area','within my city','anywhere in Nepal'];
        return view('web.product.add',compact('conditions','delivery_area','subcategory'));
    }

    public function save(Request $request)
    {
        if ($request->hasFile('featured_image')) {
            $image = request('featured_image')->store('magazines');

        }
        else{
            $image=$request->image;

        }

        $input=$request->all();
        $input['slug']=Str::slug($input['title']);
        $input['product_code']=$input['slug'].rand(999,100000);
        $input['featured_image']=$image;
        $input['status']=1;
        $product=Product::create($input);
        $subcategory=$request->sub_category_id;
        $data=[];
        foreach($input['attribute_id'] as $key=>$attribute_id) {
            $data[$input['attribute_id'][$key]] = ['value' => $input['value'][$key]];
}
        $product->sub_category()->sync((array)$subcategory);
        $product->attribute()->sync((array)$data);
        return view('web.product.photo',compact('subcategory'));
    }
}
