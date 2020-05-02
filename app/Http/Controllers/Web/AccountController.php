<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-dashboard');
    }

    public function index(){
        return view('web.profile.my-profile')->with('success','You are successfully logged in.');
    }


    public function update(Request $request){
        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = request('image')->store('users');

        }
        else{
            $image=$request->image;

        }
        $input['image']=$image;
        $user=Auth::user();;
        $user->update($input);

    	return redirect()->route('web.my-profile')->with('success','Account detail updated successfully');
    }

    public function changePassword(){
        return view('web.profile.change-password');
    }

    public function updatePassword(Request $request){
        $user=Auth::user();
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6'
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('web.change-password')->with('danger','Your old password is incorrect.Please write correct Password');
        }
        else
        {
            $new_password=Hash::make($request->new_password);
            User::where('id',$user->id)->update(['password'=>$new_password]);
            return redirect()->route('web.change-password')->with('success','Password changes successfully');
        }
    }

}
