<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function add($product_code)
   {
       if(Auth::check())
       {
           $product=Product::where('product_code',$product_code)->first();
           if($product) {
               $productID = Cart::where('user_id',Auth::user()->id)->where('product_id', $product->id)->first();
               if ($productID == null) {
                   $data['user_id']=Auth::user()->id;
                   $data['product_id']=$product->id;
                   $data['quantity'] =1;
                   $data['total_amt'] =$product->price;
                   Cart::create($data);
                   return redirect()->route('web.cart.index')->with('success','Your package is added to cart successfully');
               }
               else
               {
                   return redirect()->route('web.cart.index')->with('danger','Already added to cart');
               }
           }
       }
       else
        {
            return view('web.profile.login-register');
        }


    }

    public function update(Request $request)
    {
        if (request()->ajax()) {
            $id = $request->get('id');
            $cart=Cart::find($id);
            $data['product_id']=$cart->product_id;
            $data['user_id']=$cart->user_id;
            $data['total_amt'] = $request->get('total');
            $data['quantity']= $request->get('qty');
            $cart->update($data);
        }

    }


    public function index(){

        if(Auth::check()) {

            $carts=Cart::where('user_id',Auth::user()->id)->get();
            return view('web.cart',compact('carts'));
        }
        return view('web.profile.login-register');
    }

    public function delete($id)
    {
        $cart = Cart::find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect()->back();
        }

        $cart->delete($id);


        return redirect()->back()->with('danger','Cart deleted successfully.');
    }
}
