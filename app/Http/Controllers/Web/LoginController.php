<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'profile';

    public function login_form(){
        if (!Auth::check()) {
            return view('web.profile.login-register');
        }

    }


    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'register_name' => 'required',
            'register_email' => 'required|email|unique:users,email',
            'register_password' => 'required|string|min:8|max:15|same:confirm-password',


        ]);

        $input = $request->all();
        $input = array(
        'name'  => $request->register_name,
        'email' => $request->register_email,
       'password' => Hash::make($request->register_password),
            'phone'=>$request->phone,
            'city_id'=>$request->city_id,
            'address1'=>$request->address1,
            'address2'=>$request->address2,
        );
        $user = User::create($input);
        $user->assignRole([2]);
      $user->sendEmailVerificationNotification();
        return view('auth.verify',compact('user'));




    }

    public function logout(){
        Auth::logout();

        return redirect()->route('web.home');
    }

    public function verified()
    {
        if(Session::get('registered')==true || Session::get('verified')==true)
        {
            return view('web.profile.verification');
        }
        else
        {
            return redirect('/');
        }

    }

}
