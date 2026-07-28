<?php

namespace App\Http\Controllers;

use App\Models\Inspector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class InspectorAuthController extends Controller
{
    public function showLogin()
    {
        if (auth()->guard('inspector')->check()) {
            return redirect()->route('inspector.requests');
        }
        return view('inspector.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $key = 'inspector-login:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->with('error', "Too many login attempts. Please try again in {$seconds} seconds.");
        }

        $credentials = $request->only('email', 'password');

        if (auth()->guard('inspector')->attempt($credentials)) {
            RateLimiter::clear($key);
            $inspector = auth()->guard('inspector')->user();

            if (!$inspector->isActive()) {
                auth()->guard('inspector')->logout();
                return back()->with('error', 'Your account is not yet active. Please complete registration via the invitation email.');
            }

            $inspector->update(['last_login_at' => now()]);
            $request->session()->regenerate();

            return redirect()->intended(route('inspector.requests'));
        }

        RateLimiter::hit($key, 60);
        return back()->with('error', 'Invalid email or password.')->withInput($request->only('email'));
    }

    public function logout()
    {
        auth()->guard('inspector')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('inspector.login')->with('success', 'You have been logged out.');
    }

    public function showRegister(string $token)
    {
        $inspector = Inspector::where('invitation_token', $token)->first();

        if (!$inspector) {
            abort(404, 'Invalid or expired registration link.');
        }

        if (!$inspector->isTokenValid()) {
            return view('inspector.auth.link-expired', compact('inspector'));
        }

        if ($inspector->status === 'active') {
            return redirect()->route('inspector.login')
                ->with('success', 'Your account is already set up. Please log in.');
        }

        return view('inspector.auth.register', compact('inspector', 'token'));
    }

    public function register(string $token, Request $request)
    {
        $request->validate([
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $inspector = Inspector::where('invitation_token', $token)->first();

        if (!$inspector) {
            abort(404, 'Invalid or expired registration link.');
        }

        if (!$inspector->isTokenValid()) {
            return view('inspector.auth.link-expired', compact('inspector'));
        }

        $inspector->update([
            'password'         => Hash::make($request->password),
            'status'           => 'active',
            'invitation_token' => null,
            'token_expires_at' => null,
            'last_login_at'    => now(),
        ]);

        auth()->guard('inspector')->login($inspector);
        $request->session()->regenerate();

        return redirect()->route('inspector.requests')
            ->with('success', 'Welcome to Carspector Inspector Portal, ' . $inspector->name . '!');
    }
}
