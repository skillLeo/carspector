<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TotpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileSettingsController extends Controller
{
    public function edit(Request $request, TotpService $totp)
    {
        if (auth()->user()->type !== 'admin') abort(403);
        $user = auth()->user();
        $otpUri = null;
        $qrSvg = null;
        if ($user->two_factor_secret && !$user->two_factor_enabled) {
            $otpUri = $totp->otpAuthUri(config('app.name', 'Laravel'), $user->email, $user->two_factor_secret);
            if (class_exists(\SimpleSoftwareIO\QrCode\Facades\QrCode::class)) {
                $qrSvg = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($otpUri);
            }
        }
        return view('admin.profile_settings', compact('user', 'otpUri', 'qrSvg'));
    }

    public function updateEmail(Request $request)
    {
        if (auth()->user()->type !== 'admin') abort(403);
        $request->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);
        $user = auth()->user();
        $user->email = $request->email;
        $user->save();
        return back()->with('success', 'Email updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        if (auth()->user()->type !== 'admin') abort(403);
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Password updated successfully.');
    }

    public function updatePicture(Request $request)
    {
        if (auth()->user()->type !== 'admin') abort(403);
        $request->validate([
            'picture' => 'required|image|max:4096',
        ]);
        $user = auth()->user();
        if ($user->picture && Storage::disk('public')->exists($user->picture)) {
            // optional: do not delete automatically if shared images policy exists
            Storage::disk('public')->delete($user->picture);
        }
        $path = $request->file('picture')->store('users', 'public');
        $user->picture = $path;
        $user->save();
        return back()->with('success', 'Profile picture updated successfully.');
    }

    public function enableTwoFactor(Request $request, TotpService $totp)
    {
        if (auth()->user()->type !== 'admin') abort(403);
        $user = auth()->user();
        if (!$user->two_factor_secret) {
            $user->two_factor_secret = $totp->generateSecret();
        }
        $user->two_factor_enabled = false;
        $user->save();
        return back()->with('success', 'Two-factor setup started. Scan the QR and verify code.');
    }

    public function verifyTwoFactor(Request $request, TotpService $totp)
    {
        if (auth()->user()->type !== 'admin') abort(403);
        $request->validate(['code' => 'required']);
        $user = auth()->user();
        if (!$user->two_factor_secret) {
            return back()->withErrors(['code' => 'No 2FA secret found. Click Enable first.']);
        }
        if ($totp->verify($user->two_factor_secret, $request->code)) {
            $user->two_factor_enabled = true;
            $user->save();
            return back()->with('success', 'Two-factor authentication enabled.');
        }
        return back()->withErrors(['code' => 'Invalid authentication code']);
    }

    public function disableTwoFactor(Request $request)
    {
        if (auth()->user()->type !== 'admin') abort(403);
        $user = auth()->user();
        $user->two_factor_enabled = false;
        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes = null;
        $user->save();
        return back()->with('success', 'Two-factor authentication disabled.');
    }
}
