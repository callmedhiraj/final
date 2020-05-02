<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm($token){
        $email = $_GET['email'];
        return view('auth.passwords.reset')->with('token',$token)->with('email',$email);
//        dd($token);
    }

    public function reset(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required|confirmed'
        ]);

        $reset = DB::table("password_resets")->where('email', $request->email)->first();

        if($reset){
            if(Hash::check($request->token, $reset->token)) {
                $password = $request->password;
                $user = User::where('email', $reset->email)->first();
                // Redirect the user back if the email is invalid
                if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
                //Hash and update the new password
                $user->password = bcrypt($password);
                $user->update(); //or $user->save();
                //login the user immediately they change password successfully
//                Auth::login($user);

                //Delete the token
                DB::table('password_resets')->where('email', $user->email)
                    ->delete();

                return redirect('/login-register')->with('success','Password Reset Success. Please proceed to login.');
            }else{
                // Redirect the user back to the password reset request form if the token is invalid
                return view('auth.passwords.email');
            }
        }else{
            return redirect('/login-register');
        }
    }
}
