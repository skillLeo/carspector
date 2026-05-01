<?php

namespace App\Http\Controllers;

use App\Mail\BookingRequestMail;
use App\Mail\BookinMail;
use App\Mail\ExaminationMail;
use App\Models\AvailibiltyTime;
use App\Models\ExaminerAvailability;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class BookingController extends Controller
{
    public function step1(Request $request){
        $examiner=User::find($request->id);





        return view('frontpages.booking.step1-option-b',compact('examiner'));
    }

    public function options(){
        $stripe = new \Stripe\StripeClient(stripe_secrete());
        $price=$stripe->prices->retrieve(stripe_price(), []);
        $amount=$price->unit_amount/100;
        return view('frontpages.booking.options',compact('amount'));
    }
    public function bookingStep1(Request  $request){


//        dd($examiners);
        return view('frontpages.booking.step-1');
    }
    public function bookingStep2(Request $request){


        return view('frontpages.booking.step-2');
    }
    public function bookingStep3(Request $request){


        return view('frontpages.booking.step-3');
    }
    public function bookingStep3New()
    {
        return view('frontpages.booking.step-3-1');
    }
    public function fetchExaminers(Request $request){
        $examiners=User::where('name','LIKE','%'.$request->term.'%')->get();
        return response($examiners);
    }
    public function assignExaminer(Request $request){
        if (!auth()->check() || !in_array(auth()->user()->type, ['admin','staff'])) {
            abort(403);
        }
        $order=Order::find($request->id);
        if ($order){

            $examiner=User::where('email',$request->email)->first();
            $pass=Str::random(8);
//            $order->examiner_id=$request->examiner_id;
            if($examiner) {

                $order->examiner_id = $examiner->id;
                $updateExaminer=User::find($examiner->id);
                $updateExaminer->password=bcrypt($pass);
                $updateExaminer->save();
            }else{

                $user=new User();
                $user->name='Examiner';
                $user->email=$request->email;
                $user->password=bcrypt($pass);
                $user->save();
                $order->examiner_id=$user->id;

            }

//            Mail::to('info@carspector.de')->send(new ExaminationMail($order,$request->email));
            Mail::to($request->email)->send(new ExaminationMail($order,$request->email,$pass));
            $order->update();
            return response(['success'=>true,'message'=>'Examiner updated successfully....']);
        }
        return response(['success'=>false,'message'=>'Error while updating examiner']);
    }
    public function bookingDetail($id)
    {
        $order=Order::find($id);
        return view('frontpages.booking.detail',compact('order'));
    }

    public function step1Option(Request $request){
        $examiner=User::find($request->id);
        return view('frontpages.booking.step1-option-b',compact('examiner'));
    }
    public function getSlots(Request $request){
        $dt=Carbon::createFromFormat('d-m-Y',$request->date);
        $availabilty=ExaminerAvailability::where('examiner_id',$request->id)->where('date',$dt->toDateString())->get()->last();

        $slots=AvailibiltyTime::where('availability_id',$availabilty->id)->get()->pluck('time')->toArray();
//        $availableSlots=json_encode($slots);
        $currentDateTime = Carbon::parse($availabilty->date)->startOfDay();

// Set the start time to the current date and time (rounded up to the nearest 30 minutes)
        $startTime = $currentDateTime->ceilMinutes(30);

// Create an empty array to store the time slots
        $timeSlots = [];

// Generate 24 time slots

        for ($i = 0; $i < 48; $i++) {
            // Add the current time slot to the array
            if (!in_array($startTime->format('H:i'),$slots)) {
                $timeSlots[] = $startTime->format('H:i');
            }
            $now=Carbon::now();
            $now=$now->addHours(12);

            $timeS=Carbon::parse($dt->toDateString().' '.$startTime->format("H:i:s"));
            if ($now > $timeS){
                $timeSlots[] = $startTime->format('H:i');
            }


            $orders=Order::where('examiner_id',$request->id)->where('date',$dt->toDateString())->get();
            foreach ($orders as $order){
                if ($order){
                    $storedDate=Carbon::createFromFormat('Y-m-d H:i:s',$order->date.' '.$order->time);
                    $date=Carbon::createFromFormat('Y-m-d H:i:s',$availabilty->date.' '.$startTime->format('H:i:s'));
                    $hours=$storedDate->diffInMinutes($date,true);


                    if ($hours>= 0 && $hours < 120){
//                    dump($hours);
//                  dd($date->toDateTimeString());
//                  dump($hours);
//                  dd($timeSlots);
                        $timeSlots[] = $startTime->format('H:i');
                    }else{

                    }
                }
//                break;
            }

            // Increment the start time by 30 minutes
            $startTime->addMinutes(30);
        }

//        dd($timeSlots);
//        $timeSlots=json_encode($timeSlots);
        return response($timeSlots);
    }
    public function step2(Request $request){
//        if (auth()->user()){
//            return redirect(route('booking.step3'));
//        }
        if (true){


            return $this->postStep2($request);
        }else{
            $booking=Session::get('booking');
//            $examiner=User::find($booking['user_id']);
//            dd($booking);

            return view('frontpages.booking.step2');
        }
    }
    public function userRegister(Request $request)
    {
        $order=Order::find($request->id);
        if (!$order){
            $order=new Order();
        }
//            $examiner=User::find($booking['user_id']);
//            dd($booking);

        return view('auth.user-register',compact('order'));
    }
    public function userOrderRegister(Request $request)
    {
        $this->validate($request, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8'],
                ]);
        $order=Order::find($request->id);

                $user = User::create([
                    'first_name' => ' ',
                    'last_name' => ' ',
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                ]);
        if ($order){
            $order->user_id=$user->id;
            $order->update();
        }
                Auth::login($user);
                return redirect(route('user.dashboard'));

    }
    public function postStep2(Request $request){

//        dd($request->all());
//        dd('ok');
//        dd($request->all());
        if ($request->checkout_type!='1') {
            if (!Auth::user()) {
//                $this->validate($request, [
//                    'name' => ['required', 'string', 'max:255'],
//                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//                    'password' => ['required', 'string', 'min:8'],
////                'phone' => ['required', 'string', 'min:8'],
////            'terms_and_conditions'=>['required']
//                ]);
//
//                $user = User::create([
//
//                    'first_name' => ' ',
//                    'last_name' => ' ',
//                    'name' => $request->name,
//                    'email' => $request->email,
//                    'password' => Hash::make($request->password),
//                    'phone' => $request->phone,
//                ]);
//                Auth::login($user);
            } else {
                $user = User::find(Auth::user()->id);
            }
        }

        $booking=  Session::get('booking');;
        $examiner=User::find($booking['user_id']);
//        dd($booking);
        $title=booking_amount_calculator($booking)['title'];
        $desc=booking_amount_calculator($booking)['description'];
        $amount=booking_amount_calculator($booking)['amount'];

        // Preserve the raw category (e.g., 'elektro') and store a display label separately
        $booking['vehicle_label'] = $title;
        Session::put('booking',$booking);

        if(isset($booking['promo_code'])){
            $user=User::where('promo_code',$booking['promo_code'])->where('type','partner')->first();
            if ($user){
                $discount=$amount*(10/100);
                $amount=$amount-$discount;
            }
        }

//            \Stripe\Stripe::setApiKey('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');
        \Stripe\Stripe::setApiKey(stripe_secrete());
        $product = \Stripe\Product::create([
            'name' => $title,
            'description' =>$desc,
        ]);
        if ($examiner) {
            $price = \Stripe\Price::create([
                'product' => $product,
                'unit_amount' => $examiner->price * 100,
                'currency' => 'EUR',
            ]);
        }else{



//            if ((isset($booking['vin_chasis'])?($booking['vin_chasis']==1):false)){
//
//                //All Prices Will goes here with +VIN
//                if ($booking['option']==1) {
//                        $price='price_1PYYVKBc4wOXvSFqCEn676Rg';
//                        # test $price='price_1PIpSuBc4wOXvSFqv77kph6v';
//                }elseif ($booking['option']==2){
//                    $price='price_1PZKplBc4wOXvSFqIDppbmxk';
//                }elseif($booking['option']==4){
////                    $price='price_1PUZRUBc4wOXvSFqCMDngGCR';
//                }elseif($booking['option']==5){
////                    $price='price_1PUZZbBc4wOXvSFquAJBHvvA';
//                }else{
//
//                      $price='price_1PYYVKBc4wOXvSFqCEn676Rg';
//                }
//
//
//            }else{
//                if ($booking['option']==1) {
//                    $price = stripe_price();
//                }elseif ($booking['option']==3){
//                    $price='price_1PZsEiBc4wOXvSFqmrFfGgPt';
//                }elseif($booking['option']==4){
//                    $price='price_1PZsCJBc4wOXvSFqhLila7vR';
//                }elseif($booking['option']==5){
//                    $price='price_1PZsE0Bc4wOXvSFq1EppRWhK';
//                }else{
//
//                    $price = 'price_1PY3EzBc4wOXvSFq4O0o6DLS';
//                }
//            }



//            dd($booking);

        $mwst_satz = 19;
        $netto_amount = round($amount / (1 + $mwst_satz / 100), 2);

            $price = \Stripe\Price::create([
                'product' => $product,
                'unit_amount' => round($netto_amount * 100),
                'currency' => 'EUR',
            ]);
        }

        $YOUR_DOMAIN = url('');
        $successUrl=url('/success');

        $tax_rate_id = 'txr_1R3vr4Bc4wOXvSFqNFpLJRL8';


        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                // TODO: replace this with the `price` of the product you want to sell
                'price' => $price,
                'quantity' => 1,
                'tax_rates' => [$tax_rate_id],
            ]],
            'payment_method_types' => [
                'card','paypal', 'klarna', 'giropay',
            ],
            'mode' => 'payment',
            'billing_address_collection' => 'required', // Rechnungsadresse erforderlich
            'tax_id_collection' => [ // Aktiviert die Erfassung der USt-ID
                'enabled' => true,
            ],
            'invoice_creation' => [ // Automatische Rechnungserstellung aktivieren
                'enabled' => true,
            ],
            'success_url' => $successUrl,
            'cancel_url' => $YOUR_DOMAIN . '/booking-step-1',
        ]);
        $booking['session_id']=$checkout_session->id;
        Session::put('booking',array_merge($booking,$request->all()));
//            return response(['url' => $checkout_session->url, $checkout_session]);

        return redirect($checkout_session->url);

    }
    public function step3(){
        $booking=Session::get('booking');

        $examiner=User::find($booking['user_id']);
        $booking['price']=$examiner->price;
        Session::put('booking',$booking);
        Session::remove('url.intended');
//        dd($booking);
        return view('frontpages.booking.step3',compact('booking','examiner'));
    }
    public function postStep1(Request $request){

//        dd($request->all());


        if($request->inputs_type=='auto'){
        $this->validate($request, [
                'advertisement_link' => 'required',
//            'vehicle_make_model' => 'required',
//            'address'=>'required',
            'email'=>'required',
//                'seller_phone'=>'required_if:id,null'
        ]);
            }else{
            $this->validate($request, [
//                'advertisement_link' => 'required',
            'vehicle_make_model' => 'required',
            'address'=>'required',
                'email'=>'required',
                'seller_phone'=>'required_if:id,null'
            ]);
        }
//        dd($request->all());




//            dd($request->all());
        $examiner=User::find($request->id);
        Session::put('booking',array_merge($request->all(),['user_id'=>$request->id]));
        Session::put('payment_type','Card');

        if (Auth::user()){
            return redirect(route('booking.step2',array_merge(['is_booking'=>1],$request->all())));
        }else{
//            \session()->put('url.intended',route('booking.step2',array_merge($request->all(),['user_id'=>$request->id,'is_booking'=>1])));
            return redirect(route('booking.step2',array_merge(['is_booking'=>1],$request->all())));
        }



    }
    public function calculatePrice(Request  $request)
    {
        $amount=booking_amount_calculator($request->all())['amount'];
        return response(['amount'=>$amount]);
    }
    public function toLogin(Request $request){
//        \session('url.intended',route('booking.step2'));
        \session()->put('url.intended',route('booking.step2',$request->all()));
        return redirect('/login');
    }
    public function register(Request $request){
//        \session()->put('url.intended',route('booking.step2',$request->all()));
        return view('frontpages.booking.register');
    }
    public function bookingRequest(){
        return view('frontpages.booking.request');
    }
    public function bookingPostRequest(Request $request){

        $this->validate($request, [
            'vehicle_make_model' => 'required',
            'city'=>'required',
            'email'=>'required',
            'name'=>'required'

        ]);

        Mail::to('info@carspector.de')->send(new BookingRequestMail($request));
        return redirect()->back()->with('success','Danke für deine Anfrage! Wir melden uns in Kürze.');
    }
}
