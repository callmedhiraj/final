<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
public function store(Request $request)
{
    if(Auth::check())
        $user=Auth::user();
    $product=Product::where('product_code',$request->product_code)->first();    $input['description']=$request->description;
    $input['rating']=$request->rating;
    $input['product_id']=$product->id;
    $input['user_id']=$user->id;
    $input['date']=Carbon::now();
    Review::create($input);
    return redirect()->back();
}
    public function update(Request $request,$id)
    {
        $input=$request->all();
        $review=Review::find($id);
        $review->update($input);
        return redirect()->back();


    }
    public function delete($id)
    {
        $review = Review::find($id);
        if (empty($review)) {
            Flash::error('Cart not found');

            return redirect()->back();
        }

        $review->delete($id);

        return redirect()->back();
    }
}
