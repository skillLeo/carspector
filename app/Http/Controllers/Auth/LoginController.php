<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * After a successful credential check, if 2FA is enabled for the user
     * redirect to the two-factor challenge instead of completing the login.
     */
    protected function authenticated(Request $request, $user)
    {
        if (($user->two_factor_enabled ?? false) && !empty($user->two_factor_secret)) {
            $remember = (bool) $request->filled('remember');
            Auth::logout();
            session(['2fa:user:id' => $user->id, '2fa:remember' => $remember]);
            return redirect()->route('two-factor.challenge');
        }

        if (in_array(strtolower($user->type ?? ''), ['admin', 'staff'])) {
            return redirect()->route('admin');
        }
    }

    protected function redirectTo()
    {
        $user = Auth::user();

        if ($user && in_array(strtolower($user->type ?? ''), ['admin', 'staff'])) {
            return route('admin');
        }

        return RouteServiceProvider::HOME;
    }
}
