<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\TotpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function showChallenge()
    {
        if (!session()->has('2fa:user:id')) {
            return redirect()->route('login');
        }
        return view('auth.two_factor_challenge');
    }

    public function verifyChallenge(Request $request, TotpService $totp)
    {
        $request->validate(['code' => 'required']);
        $userId = session('2fa:user:id');
        $remember = session('2fa:remember', false);
        $user = User::find($userId);
        if (!$user || !$user->two_factor_enabled || !$user->two_factor_secret) {
            return redirect()->route('login')->withErrors(['email' => 'Invalid 2FA session']);
        }
        if ($totp->verify($user->two_factor_secret, $request->code)) {
            session()->forget(['2fa:user:id', '2fa:remember']);
            Auth::login($user, $remember);
            return redirect()->intended(route('admin'));
        }
        return back()->withErrors(['code' => 'Invalid authentication code']);
    }
}

