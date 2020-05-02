<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        if(Auth::check())
        {
            return $request->user()->hasVerifiedEmail()
                ? redirect('verified-email')
                : view('auth.verify');
        }
        else
        {
            return redirect()->route('web.home');
        }

    }

    public function verify(Request $request)
    {
        $user = User::findOrfail($request->route('id'));

        if (! hash_equals((string) $request->route('id'), (string) $user->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($user->hasVerifiedEmail()) {
            return redirect('verified-email')->with('verified', true);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect('verified-email')->with('registered', true);
    }



    public function resend(Request $request)
    {
        if ($request->id) {
            $user = User::findOrFail($request->id);
        }
        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $user->sendEmailVerificationNotification();

        return view('auth.verify',compact('user'));
    }
}
