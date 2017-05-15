<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function googleConfirmLink()
    {
        $targetUrl = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
        return response()->json($targetUrl, 200, [], JSON_UNESCAPED_SLASHES);
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        var_dump($user);
        // $user->token;
    }
}
