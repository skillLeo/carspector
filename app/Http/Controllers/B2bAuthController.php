<?php

namespace App\Http\Controllers;

use App\Http\Requests\B2bLoginRequest;
use App\Http\Requests\B2bRegisterRequest;
use App\Models\B2bPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class B2bAuthController extends Controller
{
    public function showLogin()
    {
        if (auth()->guard('b2b')->check()) {
            return redirect()->route('b2b.dashboard');
        }
        return view('b2b.auth.login');
    }

    public function login(B2bLoginRequest $request)
    {
        // Rate limit: max 5 attempts per minute per IP
        $key = 'b2b-login:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->with('error', "Too many login attempts. Please try again in {$seconds} seconds.");
        }

        $credentials = $request->only('email', 'password');

        if (auth()->guard('b2b')->attempt($credentials)) {
            RateLimiter::clear($key);
            $partner = auth()->guard('b2b')->user();

            if (!$partner->isActive()) {
                auth()->guard('b2b')->logout();
                return back()->with('error', 'Your account has been deactivated. Please contact Carspector.');
            }

            $partner->update(['last_login_at' => now()]);
            $request->session()->regenerate();

            return redirect()->intended(route('b2b.dashboard'));
        }

        RateLimiter::hit($key, 60);
        return back()->with('error', 'Invalid email or password.')->withInput($request->only('email'));
    }

    public function logout()
    {
        auth()->guard('b2b')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('b2b.login')->with('success', 'You have been logged out.');
    }

    public function showRegister(string $token)
    {
        $partner = B2bPartner::where('registration_token', $token)->first();

        if (!$partner) {
            abort(404, 'Invalid or expired registration link.');
        }

        if (!$partner->isTokenValid()) {
            return view('b2b.auth.link-expired', compact('partner'));
        }

        if ($partner->status === 'active') {
            return redirect()->route('b2b.login')
                ->with('success', 'Your account is already set up. Please log in.');
        }

        return view('b2b.auth.register', compact('partner', 'token'));
    }

    public function register(string $token, B2bRegisterRequest $request)
    {
        $partner = B2bPartner::where('registration_token', $token)->first();

        if (!$partner) {
            abort(404, 'Invalid or expired registration link.');
        }

        if (!$partner->isTokenValid()) {
            return view('b2b.auth.link-expired', compact('partner'));
        }

        $partner->update([
            'password'           => Hash::make($request->password),
            'status'             => 'active',
            'registration_token' => null,
            'token_expires_at'   => null,
            'last_login_at'      => now(),
        ]);

        auth()->guard('b2b')->login($partner);
        $request->session()->regenerate();

        return redirect()->route('b2b.dashboard')
            ->with('success', 'Welcome to Carspector Partner Portal, ' . $partner->company_name . '!');
    }
}
