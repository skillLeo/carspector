<?php

namespace App\Http\Controllers;

use App\Models\AvailibiltyTime;
use App\Models\City;
use App\Models\ExaminerAvailability;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExaminerController extends Controller
{
    public function index(){
        return view('frontpages.examiner.index');
    }
    public function login(Request $request){
        $user  = User::find($request->id);
        $order = Order::find($request->order_id);

        if ($order) {
            \session()->put('url.intended', route('examiner.order', ['id' => $order->id]));
        }

        // If already authenticated, go straight to the order page (using order_id)
        if (\Auth::check() && $order) {
            return redirect()->route('examiner.order', ['id' => $order->id]);
        }

        return view('auth.examiner-login', compact('user'));
    }
    public function dashboard(){
        $user=User::find(Auth::id());

        if($user->verify_status!='verified'){
            Auth::logout();
            return redirect('/login')->with('error','Danke! Wir haben deine Bewerbung erhalten und werden dich in max. 24h freischalten.');
        }
        $examinerCities=$user->cities;
        $currentDate = Carbon::today();
        $orders=Order::where('examiner_id',Auth::id())
            ->orderBy('date','ASC')
            ->where('date','>=',$currentDate->toDateString())->orderBy('time','ASC')

            ->get();
        $totalPrice=Order::where('examiner_id',Auth::id())->where('cleared',0)->sum('price');
        $totalComission=Order::where('examiner_id',Auth::id())->where('cleared',0)->sum('commission');
        $totalPending=$totalPrice-$totalComission;
        $availablity=ExaminerAvailability::where('examiner_id',Auth::id())->get()->last();

        return view('frontpages.examiner.dashboard',compact('user','examinerCities','orders','totalPending','availablity'));
    }

    public function dashboard1(){
        $user=User::find(Auth::id());

        if($user->verify_status!='verified'){

            Auth::logout();
            return redirect('/login')->with('error','Danke! Wir haben deine Bewerbung erhalten und werden dich in max. 24h freischalten.');
        }
        $examinerCities=$user->cities;
        $currentDate = Carbon::today();
        $orders=Order::where('examiner_id',Auth::id())
            ->orderBy('date','ASC')
            ->where('date','>=',$currentDate->toDateString())->orderBy('time','ASC')->get();
        $totalPrice=Order::where('examiner_id',Auth::id())->where('cleared',0)->sum('price');
        $totalComission=Order::where('examiner_id',Auth::id())->where('cleared',0)->sum('commission');
        $totalPending=$totalPrice-$totalComission;
        $availablity=ExaminerAvailability::where('examiner_id',Auth::id())->get()->last();

        return view('frontpages.examiner.dashboard1',compact('user','examinerCities','orders','totalPending','availablity'));
    }
    public function editProfile(){
        $user=User::find(Auth::id());
        return view('frontpages.examiner.edit-profile',compact('user'));
    }
    public function updateProfile(Request $request){
//        dd($request->all());
        $this->validate($request,['about_me'=>'required|min:350|max:500']);
        $user=User::find(\auth()->id());
        $user->about_me=$request->about_me;
        $user->experience_1=$request->experience_1;
        $user->experience_2=$request->experience_2;
        $user->experience_3=$request->experience_3;
        $user->experience_4=$request->experience_4;
        $user->training_1=$request->training_1;
        $user->training_2=$request->training_2;
        $user->training_3=$request->training_3;
        $user->training_4=$request->training_4;
        $user->update();
        return redirect()->route('examiner.dashboard')->with('success','Profile updated successfully..');
    }
    public function changePrice(Request $request){
        $this->validate($request,['new_price'=>'required|numeric|min:49']);
        $examiner=User::find(Auth::user()->id);
        $examiner->price=$request->new_price;
        $examiner->update();

        return response(['success'=>true,
            'message'=>'Price updated successfully...',
            'price'=>$examiner->price,
            'user'=>$examiner
        ]);
    }
    public function deleteCity($id){
        $user=User::find(Auth::id());
        if ($user){
            $city=City::find($id);

            $user->cities()->detach($city);
            return redirect()->back()->with('success','City deleted successfully...');
        }
    }
    public function updateCities(Request $request){

        $this->validate($request,['city'=>'required']);
        $user=User::find(\auth()->id());
        if ($user){
//            $user->cities()->sync($request->cities);
            $checkCity=City::where('name',$request->city)->first();
            if ($checkCity){
                $userCity=User::whereHas('cities',function($q) use ($checkCity){
                   return $q->where('cities.id',$checkCity->id);
                })->where('users.id',Auth::id())->get()->last();

                if ($userCity) {

                return  response(['success'=>false,'message'=>'City already added with that name']);
                }else{
                    $user->cities()->attach($checkCity->id);
                    $user=User::find(\auth()->id());
                    return response(['success'=>true,'message'=>'Work area updated successfully...',
                        'cities'=>$user->cities,
                    ]);
                }


            }else{
                $newCity=new City();
                $newCity->name=$request->city;
                $newCity->save();
                $user->cities()->attach($newCity->id);
            }

        }
        $user=User::find(\auth()->id());
        return response(['success'=>true,'message'=>'Work area updated successfully...',
            'cities'=>$user->cities,
        ]);

    }
    public function updateImage(Request $request){
//        dd($request->all());
        $picture=$request->filepond;


        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('profile/pictures',['disk'=>'public']);
            $user = User::find(Auth::id());
            $user->picture = $filename;
            $user->update();
            return \response(['success' => true, 'message' => 'Profile picture uploaded successfully...',
                'user' => $user,
                'file' => $user->image,
                'url'=>url(Storage::url($user->picture))

            ]);
        }

    }
    public function availability(){

        $now=Carbon::now();
        $availabilty=ExaminerAvailability::where('examiner_id',Auth::id())
            ->where('date',$now->toDateString())->get()->last();
        if ($availabilty){

        }else{
            $availabilty=new ExaminerAvailability();
        }

        return view('frontpages.examiner.availability',compact('availabilty'));
    }
    public function fetchTimes(Request $request){
        $date=Carbon::createFromFormat('d-m-Y',$request->date);
        $checkAvailbility=ExaminerAvailability::where('examiner_id',Auth::user()->id)
            ->where('date',$date->toDateString())
            ->get()->last();
        if ($checkAvailbility){
            $times=AvailibiltyTime::where('availability_id',$checkAvailbility->id)->get();
            return \response([
                'times'=>$times,
                'date'=>$date->format('Y-m-d')
            ]);
        }
        return \response(['times'=>[],'date'=>$date->format('Y-m-d')]);
    }
public function saveAvailability(Request $request){
        $this->validate($request,['date'=>'required']);
        $date=Carbon::createFromFormat('d-m-Y',$request->date);
        $checkAvailbility=ExaminerAvailability::where('examiner_id',Auth::user()->id)
            ->where('date',$date->toDateString())
            ->get()->last();
        if ($checkAvailbility){
            $availability=ExaminerAvailability::find($checkAvailbility->id);
            $availability->date=$date->toDateString();
            $availability->update();
          $deleteTimes=AvailibiltyTime::where('availability_id',$availability->id)->delete();
        }else{
            $availability=new ExaminerAvailability();
            $availability->examiner_id=Auth::user()->id;
            $availability->date=$date->toDateString();
            $availability->save();

        };
        if ($request->times){
            foreach ($request->times as $time){
                $AvTime=new AvailibiltyTime();
                $AvTime->availability_id=$availability->id;
                $AvTime->time=date('H:i:s',strtotime($time));
                $AvTime->save();
            }
        }else{
            if ($checkAvailbility){
                $availability=ExaminerAvailability::find($checkAvailbility->id);
                $availability->delete();
            }
        }
        return \response(['success'=>true,'message'=>'Availability set successfully...']);
    }
    public function postWithdraw(Request $request){
        $this->validate($request,['payment_type'=>'required']);

        if (\auth()->user()->balance <=0){
            return \response(['success'=>false,'message'=>'You have not enoght balance to withdraw']);
        }
        if ($request->payment_type=='Paypal'){
            if ($request->paypal_email==''){
                return \response(['success'=>false,'message'=>'Please enter paypal email']);
            }

        }else{
            if ($request->iban==''){
                return \response(['success'=>false,'message'=>'Please enter account not / Iban']);
            }
            if ($request->account_title==''){
                return \response(['success'=>false,'message'=>'Please enter account title']);
            }
        }
        $transaction=new Transaction();
        $transaction->user_id=Auth::user()->id;
        $transaction->desc=$request->desc;
        $transaction->iban=$request->iban;
        $transaction->account_title=$request->account_title;
        $transaction->paypal_email=$request->paypal_email;
        $transaction->payment_type=$request->payment_type;
        $transaction->amount=Auth::user()->balance;
        $transaction->save();
        $updateBalance=User::find(Auth::user()->id);
        $updateBalance->balance=0;
        $updateBalance->update();
        return \response(['success'=>true,'message'=>'Withdraw successfully. Amount will be sent shortly...'],200);
    }
    public function pastBookings(){
        $currentDate = Carbon::today();
        $orders=Order::where('examiner_id',Auth::id())
            ->orderBy('date','ASC')
            ->where('date','<',$currentDate->toDateString())->orderBy('time','ASC')->get();
        $user=User::find(Auth::id());
        return view('frontpages.examiner.bookings',compact('orders','user'));
    }
    public function updateAvailability(){
        $user=User::find(Auth::id());
        if ($user){
            if ($user->available){
                $user->available=0;
            }else{
                $user->available=1;
            }
            $user->update();
            return redirect()->back()->with('success','Availability updated successfully...');
        }
        return redirect()->back()->with('error','Error while updating...');
    }
}
