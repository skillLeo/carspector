<?php

namespace App\Http\Controllers;

use App\Mail\BookinMail;
use App\Mail\InspectionTeam2Mail;
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

        // Guard against double submission (page refresh / back button)
        if (!$booking) {
            return view('frontpages.booking.success');
        }

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
                Session::forget('booking');
                Session::forget('payment_type');

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

            $order->seller_phone=isset($booking['listing_seller_phone'])&&$booking['listing_seller_phone']
                ? $booking['listing_seller_phone']
                : (isset($booking['phone'])?$booking['phone']:'');
            $order->advertisement_link=isset($booking['advertisement_link'])?$booking['advertisement_link']:'';
            $order->listing_seller_name   =isset($booking['listing_seller_name'])   ?$booking['listing_seller_name']   :'';
            $order->listing_seller_address=isset($booking['listing_seller_address'])?$booking['listing_seller_address']:'';
            $order->listing_image         =isset($booking['listing_image'])         ?$booking['listing_image']         :'';
            $order->listing_price         =isset($booking['listing_price'])         ?$booking['listing_price']         :'';
            $order->listing_scrape_status =isset($booking['listing_scrape_status']) ?$booking['listing_scrape_status'] :null;

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
            $order->make_year=isset($booking['make_year'])?$booking['make_year']:'';
            $order->mileage=isset($booking['mileage'])?$booking['mileage']:'';
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

            if(isset($booking['vehicle_type']) && $booking['vehicle_type'] === 'elektro'){
                $order->soh_check = 1;
            }

            $order->vehicle_form_expires_at = Carbon::now()->addMinutes(15);

            $order->save();

            // Clear booking session immediately to prevent double order on refresh
            Session::forget('booking');
            Session::forget('payment_type');

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


            return redirect(route('payment.success',['id'=>$order->uuid,'is_user'=>\auth()->user()?true:false]));
        }


//        dd($booking);

//        $examiner=User::find($order->examiner_id);
//        $examiner->balance=$examiner->balance+$order->price;
//        $examiner->save();

        Session::flash('success-message','Booking Placed successfully...');

        return redirect(route('payment.success',$order->id));

    }
    private function resolveOrder(string $id): ?Order
    {
        // Use strict UUID check before falling back to numeric ID.
        // orWhere('id', uuid_string) causes MySQL to cast the UUID to an int
        // by stripping leading digits — which can silently match the wrong order.
        if (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $id)) {
            return Order::where('uuid', $id)->first();
        }
        return Order::where('id', $id)->first();
    }

    public function paymentSuccess($id){
        $order = $this->resolveOrder($id);
        return view('frontpages.booking.success', compact('order'));
    }

    public function createTestOrder(Request $request)
    {
        $vehicleType = $request->get('type', 'auto');
        $option      = $request->get('option', 1);

        $booking = [
            'vehicle_type'       => $vehicleType,
            'option'             => $option,
            'vehicle_make_model' => 'BMW 320d (TEST)',
            'make_year'          => '03.2020',
            'mileage'            => '85000',
            'advertisement_link' => 'https://www.autoscout24.de/test',
            'listing_seller_name'    => 'Mustermann Autohaus',
            'listing_seller_address' => 'Musterstraße 1, 60311 Frankfurt',
            'listing_seller_phone'   => '+49 69 123456',
            'listing_scrape_status'  => 'success',
            'listing_price'          => '19900',
            'email'              => auth()->user()->email ?? 'test@carspector.de',
            'language'           => 'german',
        ];

        $order = new Order();
        $order->user_id            = auth()->id();
        $order->vehicle_make_model = $booking['vehicle_make_model'];
        $order->make_year          = $booking['make_year'];
        $order->mileage            = $booking['mileage'];
        $order->advertisement_link = $booking['advertisement_link'];
        $order->listing_seller_name    = $booking['listing_seller_name'];
        $order->listing_seller_address = $booking['listing_seller_address'];
        $order->seller_phone           = $booking['listing_seller_phone'];
        $order->listing_scrape_status  = $booking['listing_scrape_status'];
        $order->listing_price          = $booking['listing_price'];
        $order->email              = $booking['email'];
        $order->payment_type       = 'Test';
        $order->price              = 299;
        $order->commission         = 20;
        $order->vehicle_type       = booking_amount_calculator($booking)['title'];
        $order->language           = 'german';
        $order->date               = Carbon::now()->addDays(7)->toDateString();
        $order->time               = Carbon::now()->addDays(7)->toTimeString();
        $order->vehicle_form_expires_at = Carbon::now()->addMinutes(15);

        if ($vehicleType === 'elektro') {
            $order->soh_check = 1;
        }

        $order->save();

        return redirect()->route('payment.success', ['id' => $order->uuid]);
    }

    public function saveVehicleDetails(Request $request, $id){
        $order = $this->resolveOrder($id);
        if (!$order) abort(404);

        $identifier = $order->uuid ?: $order->id;

        if ($order->vehicle_details_confirmed) {
            return redirect()->route('payment.success', ['id' => $identifier, 'saved' => 1]);
        }

        // Enforce 15-minute window
        if ($order->vehicle_form_expires_at && $order->vehicle_form_expires_at->isPast()) {
            return redirect()->route('payment.success', ['id' => $identifier, 'expired' => 1]);
        }

        $request->validate([
            'vehicle_make_model'     => 'required|string|max:255',
            'make_year'              => 'nullable|string|max:50',
            'mileage'                => 'nullable|string|max:50',
            'listing_seller_name'    => 'nullable|string|max:255',
            'listing_seller_address' => 'nullable|string|max:255',
            'seller_phone'           => 'nullable|string|max:100',
        ]);

        $order->vehicle_make_model     = $request->vehicle_make_model;
        $order->make_year              = $request->make_year              ?? $order->make_year;
        $order->mileage                = $request->mileage                ?? $order->mileage;
        $order->listing_seller_name    = $request->listing_seller_name    ?? $order->listing_seller_name;
        $order->listing_seller_address = $request->listing_seller_address ?? $order->listing_seller_address;
        $order->seller_phone           = $request->seller_phone           ?? $order->seller_phone;
        $order->private_seller         = $request->boolean('private_seller');
        $order->vehicle_details_confirmed = 1;
        $order->save();

        // Auto-assign to Inspection Team 2 when all conditions are met
        $this->maybeAssignToInspectionTeam2($order);

        return redirect()->route('payment.success', ['id' => $identifier, 'saved' => 1]);
    }

    private function maybeAssignToInspectionTeam2(Order $order): void
    {
        if ($order->private_seller) {
            return;
        }

        // All fields must be filled before auto-assigning — otherwise stays in New for manual review
        $required = ['vehicle_make_model', 'make_year', 'mileage', 'listing_seller_name', 'seller_phone'];
        foreach ($required as $field) {
            if (empty(trim((string) ($order->$field ?? '')))) {
                return;
            }
        }

        $type = $order->vehicle_type ?? '';

        $neverAssign = ['Oldtimer', 'Wohnmobil'];
        foreach ($neverAssign as $prefix) {
            if (str_starts_with($type, $prefix)) {
                return;
            }
        }

        $autoAssign = ['Auto/ PKW', 'Transporter', 'Elektro', 'Sportwagen'];
        foreach ($autoAssign as $prefix) {
            if (str_starts_with($type, $prefix)) {
                try {
                    // Mail::send(new InspectionTeam2Mail($order));
                    $order->admin_status = 'New';
                    $order->status       = 'active';
                    $order->saveQuietly();
                } catch (\Throwable $e) {
                    Log::error('InspectionTeam2Mail failed: ' . $e->getMessage());
                }
                return;
            }
        }
    }

    public function renewTestTimer($id)
    {
        $order = $this->resolveOrder($id);
        if (!$order) abort(404);

        $order->vehicle_form_expires_at = Carbon::now()->addMinutes(15);
        $order->saveQuietly();

        return redirect()->route('payment.success', ['id' => $order->uuid ?: $order->id]);
    }
}
