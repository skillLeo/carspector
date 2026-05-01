<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminerRegisterController extends Controller
{
    public function register(Request $request){
        $this->validate($request,['name'=>'required|min:3',
            'email'=>'required|unique:users,email','password'=>'required|min:6',
            'phone'=>'required','terms_and_conditions'=>'required'
        ],
        );
        $examiner=new User();
        $examiner->name=$request->name;
//        $examiner->last_name=$request->last_name;
        $examiner->first_name="";
        $examiner->last_name="";
        $examiner->email=$request->email;
        $examiner->password=bcrypt($request->password);
        $examiner->phone=$request->phone;
        $examiner->type='examiner';
        $examiner->save();

        Auth::login($examiner);

        return redirect()->route('examiner.dashboard')->with('success','You have been registered successfully.');
    }
}
