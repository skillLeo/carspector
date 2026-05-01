<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        \session()->put('url.intended',route('booking.step2'));
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function handleGoogleCallback()
    {
        $booking=Session::get('booking');
        try {
            //create a user using socialite driver google
            $user = Socialite::driver('google')->user();
            // if the user exits, use that user and login
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                if (session()->has('url.intended') && $booking){

                    return redirect(session('url.intended'));
                }
                return redirect('user/dashboard');
            }else{
                //user is not yet created, so create first
                $checkMail=  User::where('email',$user->email)->get()->last();
                if ($checkMail){
                    $updateUser=User::find($checkMail->id);
                    $updateUser->google_id=$user->id;
                    $updateUser->update();
                    Auth::login($updateUser);
                    if (session()->has('url.intended') && $booking){

                        return redirect(session('url.intended'));
                    }
                    return redirect('user/dashboard');
                }

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('')
                ]);

                Auth::login($newUser);
                // go to the dashboard
                if (session()->has('url.intended') && $booking){
                    return redirect(session('url.intended'));
                }
                return redirect('user/dashboard');
            }
            //catch exceptions
        } catch (Exception $e) {

            return redirect('/login');
        }
    }
}
