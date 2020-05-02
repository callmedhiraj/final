<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Countries;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Socialite;
use Auth;

class SocialAuthController extends Controller
{
    public function redirect($service) {
        return Socialite::driver( $service)->redirect();
    }
    public function callback($service) {
        $user = Socialite::with ( $service )->stateless()->user();
        $users =   User::where(['provider' => $service,'provider_id' => $user->getId()])->first();

        if($users)
        {
          Auth::login($users);
            return redirect('profile')->with('success','You are successfully logged in.');
        }
        else{
            $cities = City::pluck('name','id');
           return view('web.profile.social-register',compact('user','service','cities'))->with('message','Fill up form for further proceed in social Login. Thank You!');
        }
	}
    public function register(Request $request)
    {
        $input = $request->all();
        $users = User::where(['email' => $input['email']])->first();
        if ($users) {
            $user = User::where('id', $users->id)->update(['name' => ($input['name']) ? $input['name'] : $users->name, 'email' => ($input['email']) ? $input['email'] : $users->email, 'phone' => ($input['phone']) ? $input['phone'] : $users->phone,'address1' => ($input['address1']) ? $input['address1'] : $users->address1,'address2' => ($input['address2']) ? $input['address2'] : $users->address2,'image' => ($input['image']) ? $input['image'] : $users->image,'city_id' => ($input['city_id']) ? $input['city_id'] : $users->city_id,'provider_id' => $input['provider_id'], 'provider' => $input['provider']]);


            Auth::login($user);
            return redirect('profile')->with('success','You are successfully logged in.');
        } else {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'address1' => $input['address1'],
                'address2' => $input['address2'],
                'city_id' => $input['city_id'],
                'image' => $input['image'],
                'provider_id' => $input['provider_id'],
                'provider' => $input['provider'],
            ]);
            $user->assignRole([2]);
            Auth::login($user);
            return redirect('profile')->with('success','You are successfully logged in.');
        }
    }
}
