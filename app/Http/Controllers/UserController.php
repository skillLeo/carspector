<?php

namespace App\Http\Controllers;

use App\Mail\BookingRequestMail;
use App\Mail\HeardAboutMail;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function changePassword(){
        $user=User::find(Auth::id());
        return view('frontpages.change-password',compact('user'));
    }
    public function heardAbout(Request $request)
    {
        $request->validate([
            'heard_about' => ['required', 'string', 'max:255'],
        ]);

        $user=User::find(auth()->id());
        if (!$user) {
            return response(['success' => false, 'message' => 'User not found'], 404);
        }

        $user->heard_about=$request->heard_about;
        $user->update();

//        Mail::to('info@carspector.de')->send(new HeardAboutMail($user,$request->heard_about));
        try {
            Mail::to('info@carspector.de')->send(new HeardAboutMail($user,$request->heard_about));
        } catch (\Throwable $exception) {
            Log::warning('Heard about feedback email failed', [
                'user_id' => $user->id,
                'heard_about' => $request->heard_about,
                'error' => $exception->getMessage(),
            ]);
        }

        return response(['success'=>true,'message'=>'Thank you for your interest']);
    }
    public function storePassword(Request $request){
        $this->validate($request,['old_password'=>'required','password'=>'required|confirmed']);
        $user=User::find(Auth::id());
        if (Hash::check($request->old_password,$user->password)){
            $user->password=Hash::make($request->password);
            $user->update();

            if (Auth::user()->type=='examiner'){
                return redirect()->route('examiner.dashboard')->with('success','Password has been changed successfully...');
            }
            return redirect()->route('user.dashboard')->with('success','Password has been changed successfully...');

        }
        return redirect()->back()->with('error','Old password did not matched');

    }
    public function dashboard(){
        $user=User::find(Auth::user()->id);
        $orders=Order::where('user_id',$user->id)
            ->orWhere("examiner_id",\auth()->user()->id)->get();
        if ($user->type=='partner'){
            return view('frontpages.user.partner',compact('user','orders'));
        }
        return view('frontpages.user.dashboard',compact('user','orders'));

    }
    public function changePhone(Request $request){
        $user=User::find(Auth::user()->id);
        if ($user){
            $user->phone=$request->phone;
            $user->update();
        }
        if ($request->ajax()){
            return response(['success'=>true,'message'=>'User phone has been changed']);
        }else{
            return redirect()->back()->with('success','User phone has been changed');
        }

    }
    public function adjustBalance(Request $request){
        $this->validate($request,['amount'=>'required|numeric','id'=>'required']);
        $user=User::find($request->id);
        if ($user){
            $user->balance=$request->amount;
            $user->update();

            $transaction=new Transaction();
            $transaction->desc=$request->desc;
            $transaction->user_id=$user->id;
            $transaction->payment_type='Admin';
            $transaction->type='Adjusted';
            $transaction->status='Completed';
            $transaction->amount=$request->amount;
            $transaction->save();
            return response(['success'=>true,'message'=>'Balance Updated successfully....']);
        }
    }
    public function orders(){
        $sevenDaysAgo = now()->subDays(7)->toDateString();
        $orders=Order::where('cleared',0)->whereDate('created_at','<=',$sevenDaysAgo)->get();
    dd($orders);
    }
}
