<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (auth()->user()->type=='admin'){
            return redirect(route('admin'));
        }
        if (auth()->user()){
            if (auth()->user()->type=='examiner'){
//                return redirect()->route('examiner.dashboard');
            return redirect(route('examiner.dashboard'));
            }
        }

        return redirect(route('user.dashboard'));
//        return redirect('/login');
    }
}
