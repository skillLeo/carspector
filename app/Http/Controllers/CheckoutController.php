<?php

namespace App\Http\Controllers;

use App\Mail\BookinMail;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Hofmannsven\Brevo\Facades\Brevo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;



class CheckoutController extends Controller
{
    public function payNow(Request $request){
        if($request->type=='stripe') {
            Session::put('payment_type','Card');

            \Stripe\Stripe::setApiKey(stripe_secrete());
            $product = \Stripe\Product::create([
                'name' => 'Gebrauchtwagenprüfung',
            ]);
            $price = \Stripe\Price::create([
                'product' => $product,
                'unit_amount' => $request->amount * 100,
                'currency' => 'EUR',
            ]);
            $YOUR_DOMAIN = url('');
            $successUrl=url('/success');


            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    // TODO: replace this with the `price` of the product you want to sell
                    'price' => $price,
                    'quantity' => 1,
                ]],
                'payment_method_types' => [
                    'card','paypal'
                ],
                'mode' => 'payment',
                'success_url' => $successUrl,
                'cancel_url' => $YOUR_DOMAIN . '/cancel',
            ]);
//            return response(['url' => $checkout_session->url, $checkout_session]);


            return redirect($checkout_session->url);
        }elseif ($request->type=='paypal'){
            Session::put('payment_type','Paypal');
            $paypalProvider = new PayPalClient([]);
//            $paypalProvider->setApiCredentials(config('paypal'));
//            return $paypalProvider->getAccessToken();
            $paypalProvider->setAccessToken($paypalProvider->getAccessToken());
            $paypalProvider->setCurrency('EUR');
//            return $paypalProvider->getAccessToken();
            $response = $paypalProvider->createOrder([
                "intent"=> "CAPTURE",
                "purchase_units"=> [[
                    "amount"=> [
                        "currency_code"=> "EUR",
                        "value"=> $request->amount
                    ]
                ],
                ],
                'application_context' => [
                    'cancel_url' => url('cancel'),
                    'return_url' => url('success')
                ]
            ]);
//            dd($response);
//            return response(['url'=>$response['links'][1]['href'],$response]);
        return  redirect($response['links'][1]['href']);


        }
    }

    public function vortileSuccess()
    {
        return view('frontpages.booking.success');
    }

    public function success(Request $request){

//        dd(Session::get('booking'));
        $booking=Session::get('booking');

//        dd($booking);
        if (Session::get('payment_type')=='Paypal'){
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            $response = $provider->capturePaymentOrder($request['token']);

            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                $order=new Order();
                $order->examiner_id=$booking['id'];
                $order->user_id=Auth::user()->id;
                $order->brand=$booking['brand']?$booking['brand']:'';
                $order->make_year=$booking['make_year']?$booking['make_year']:'';
                $order->link=$booking['link']?$booking['link']:'';
                $order->desc=$booking['desc']?$booking['desc']:'';
                $order->street=$booking['street']?$booking['street']:'';
                $order->vehicle_make_model=$booking['vehicle_model']?$booking['vehicle_model']:'';
//        $order->house_no=$booking['house_no'];
                $order->postal_code=$booking['postal_code']?$booking['postal_code']:'';
                $order->city=$booking['city']?$booking['city']:'';
                $order->addition=$booking['addition']?$booking['addition']:'';
                $order->phone=$booking['phone']?$booking['phone']:'';
                $order->date=  Carbon::createFromFormat('d-m-Y',$booking['date'])->toDateString();
                $order->time=Carbon::createFromTimeString($booking['time'])->toTimeString();
                $order->price=$booking['price']?$booking['price']:'';
                $order->payment_type=Session::get('payment_type');
                $order->commission=20;
                $request->total_amount=$booking['price']-20;
                $order->save();

                $user=User::find($order->user_id);
                $user->phone=$order->phone;
                $user->update();
            }else{
                redirect('/error');
            }
        }else if (Session::get('payment_type')=='Card'){
//            dd($booking);;
//            dd($booking);
            $stripe = new \Stripe\StripeClient(stripe_secrete());

//            dd($booking);
           $userid='';
           if (false){
               $userid=\auth()->user()->id;
           }else{
               $session= $stripe->checkout->sessions->retrieve(
                   $booking['session_id'],
                   []
               );
//               dd($session->amount_total);
//               $oldUser=User::where('email',$session->customer_details->email)->first();
//               if ($oldUser){
//                   $userid=$oldUser->id;
//               }else{
//                   $user=new User();
//                   $user->name=$session->customer_details->name;
//                   $user->email=$session->customer_details->email;
//                   $user->password=bcrypt(Str::random(10));
//                   $user->type='user';
//                   $user->save();
//                   $userid=$user->id;
//               }

           }
           if (\auth()->user()){
               $userid=\auth()->user()->id;
           }else{
               if(isset($booking['email'])) {
                   $user = User::where('email', $booking['email'])->first();
                    if ($user){
                        $userid=$user->id;
                    }
               }
           }

//            $examiner=User::find($booking['id']);
            $order=new Order();
//            $order->examiner_id=$booking['id']?$booking['id']:'';
            $order->user_id=$userid;
            $order->brand=isset($booking['brand'])?$booking['brand']:'';
            $order->make_year=isset($booking['make_year'])?$booking['make_year']:'';
            $order->link=isset($booking['link'])?$booking['link']:'';
            $order->desc=isset($booking['desc'])?$booking['desc']:'';
            $order->street=isset($booking['address'])?$booking['address']:'';
            $order->vehicle_make_model=isset($booking['vehicle_make_model'])?$booking['vehicle_make_model']:'';
//        $order->house_no=$booking['house_no'];
//            $order->postal_code=$booking['postal_code'];
            $order->city=isset($booking['city'])?$booking['city']:'';
//            $order->addition=$booking['addition'];
//            $order->phone=\auth()->user()?\auth()->user()->phone:'';
            $order->phone=\auth()->user()?\auth()->user()->phone:'';

            $order->date=  Carbon::now()->addDays(7)->toDateString();
            $order->time=Carbon::now()->addDays(7)->toTimeString();

            $order->payment_type=Session::get('payment_type')??'';
            $order->commission=20;

            $order->seller_phone=isset($booking['phone'])?$booking['phone']:'';
            $order->advertisement_link=isset($booking['advertisement_link'])?$booking['advertisement_link']:'';

            if (false) {
                $request->total_amount = $examiner ? ($examiner->price - 20) : 0;
                $order->price=$examiner->price?$examiner->price:0;
            }else{
//                $stripe = new \Stripe\StripeClient(stripe_secrete());
//                $price=$stripe->prices->retrieve(stripe_price(), []);
                $amount=$session->amount_total/100;

                $request->total_amount = $amount - 20;
                $order->price=$amount;
            }

            $order->vehicle_type=booking_amount_calculator($booking)['title'];
//            $order->vehicle_value=isset($booking['vehicle_value'])?$booking['vehicle_value']:'';
//            $order->vehicle_age=isset($booking['vehicle_age'])?$booking['vehicle_age']:'';
            $order->language=isset($booking['language'])?$booking['language']:'';
            $order->email=isset($booking['email'])?$booking['email']:'';
            if(isset($booking['negotiation_list']) && $booking['negotiation_list']=='1'){
                $order->negotiation_checklist=1;
            }

            if(isset($booking['language']) && $booking['language']=='english'){
                $order->document_in_english=1;
            }
            $order->save();



//            if (Auth::user()) {
//                $user = User::find($order->user_id);
//                $user->phone = $order->phone;
//                $user->update();

//            dd($booking);
            if(isset($booking['inhalt'])) {
                if ($booking['inhalt'] == '1') {
                    try {
                        Brevo::ContactsApi()->deleteContact($booking['email']);

                    } catch (\Throwable $e) {
                        Log::debug('error', 'Deletion failed: ' . $e->getMessage());
                    }
                }
            }


                Mail::to($order->email)->send(new BookinMail($order, null));

//                $updateOrder=Order::find($order->id);
////                $updateOrder->email=$session->customer_details->email;
//                $updateOrder->update();
//            }
            Session::flash('success-message','Booking Placed successfully...');


            return redirect(route('payment.success',['id'=>$order->id,'is_user'=>\auth()->user()?true:false]));
        }


//        dd($booking);

//        $examiner=User::find($order->examiner_id);
//        $examiner->balance=$examiner->balance+$order->price;
//        $examiner->save();

        Session::flash('success-message','Booking Placed successfully...');

        return redirect(route('payment.success',$order->id));

    }
    public function paymentSuccess($id){
        return view('frontpages.booking.success');
    }
}
