<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminLinkSend;
use App\Mail\BookinMail;
use App\Models\Application;
use App\Models\City;
use App\Models\Order;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){
        $users = User::where('type','user')->get();
        $cities=City::all();
        return view('admin.user.index',compact('users','cities'));
    }

    public function changeExaminer(Request $request){
        $settings=Setting::first();
        if ($settings){
            $settings->fake_examiners=$request->fake_examiners=='true'?1:0;
            $settings->update();

        }else{
            $settings=new Setting();
            $settings->fake_examiners=$request->fake_examiners=='true'?1:0;
            $settings->save();
        }
        return response(['success'=>true,'message'=>'Fake Examiner Updated successfully...']);
    }
    public function postUser(Request $request){
        $id = $request->edit_id;
        if ($id){
            $validate = $request->validate([
                'name'=>'required',
                'email'=>'required',
//                'password'=>'required',
                'type'=>'required',
            ]);
        }else{
            $validate = $request->validate([
                'name'=>'required',
                'email'=>'required|unique:users',
//                'password'=>'required',
                'type'=>'required',
            ]);
        }
        $user=new User();
        $notification = "added";
        if($id){
            $user = User::findOrFail($id);
            $notification = 'updated';
            if ($request->oldpicture){
                unlink($request->oldpicture);
            }
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->type=='partner'){
            $user->password=bcrypt(Str::random(12));
        }else{
            $user->password = bcrypt($request->password);
        }

        $user->type = $request->type;

        $user->promo_code = $request->promo_code;


        if ($request->hasFile('picture')) {
            $uploadedFile = $request->file('picture');
            $filename = time() . $uploadedFile->getClientOriginalName();
            $destinationPath = 'uploads';
            if ($uploadedFile->move($destinationPath, $filename)) {
                $user->picture =$destinationPath.'/'.$filename;
            }
        }
        $user->save();
        if ($user->type=='partner'){

            Mail::to($user->email)->send(new AdminLinkSend($user, null));
        }
        $usersz = User::all();
        return response()->json(['success'=>'User '.$notification.' Successfully....','usersz'=>$usersz]);
    }
    public function fetchUser(Request $request){
        $users=User::select('*');
        $users=$users->when($request->type!='',function ($q){
            return $q->where('type',\request('type'));
        });
        $users=$users->when($request->verify_status!='',function ($q){
            return $q->whereNull('verify_status')->orWhere('verify_status',\request('verify_status'));
        });
        $users=$users->when($request->city!='',function ($q){
           return $q->whereHas('cities',function($q){
              $q->where('cities.id',\request('city'));
           });
        });



        return DataTables::of($users)->addColumn('actions',function($user){
            return '<div class="text-end">
<a href="'.route('admin.profile',$user->id).'"
                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
																	<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
														<a href="#" data-id="'. $user->id .'"
                                               data-name="'. $user->name .'"
                                               data-email="'. $user->email .'"
                                               data-old_password="'. $user->password.'"
                                               data-picture="'.$user->image.'"
                                               data-type="'. $user->type.'"
                                               class="btn edit-btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																	<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
														<a href="'.route('delete-user',$user->id).'" class="btn btn-delete btn-icon btn-bg-light btn-active-color-primary btn-sm" >
															<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
</div>';
        })->addColumn('password_link',function($row){
            return '<a  href="'.route('partner.password',$row->id).'" target="_blank">'.route('partner.password',$row->id).'</a>';
        })->editColumn('created_at',function($user){
            return $user->created_at ? $user->created_at->format('d/M/Y H:i') : '';
        })->editColumn('heard_about',function($row){
            if($row->heard_about){
                return '<div class="badge badge-light-success">'.$row->heard_about.'</div>';
            }
            return '<div class="badge badge-light-danger">No Feedback</div>';
        })->editColumn('dob',function($user){
            return $user->dob ? date('d/M/Y H:i',strtotime($user->dob)) : '';
        })->rawColumns(['actions','password_link','heard_about'])->make(true);
    }
    public function profile($id){
        $user=User::find($id);
        $bookings=Order::where('user_id',$user->id)
            ->orWhere('examiner_id',$user->id)->get();
        $earnings=Order::where('user_id',$user->id)
            ->orWhere('examiner_id',$user->id)->sum('price');
        $transactions=Transaction::where('user_id',$user->id)->orderBy('id','Desc')->get();


        return view('admin.user.profile',compact('user','bookings','earnings','transactions'));
    }
    public function deleteReview($id){
        $review=Review::find($id);
        if ($review){
            $review->delete();
        }
        return redirect()->back()->with('success','Review Deleted Successfully...');
    }

    public function deleteTransaction($id){
        $transaction=Transaction::find($id);
        if ($transaction){
            $transaction->delete();
        }
        return redirect()->back()->with('success','Transaction Deleted Successfully...');
    }
    public function verifyNow($id){
        $user=User::find($id);
        if ($user){
            $user->verify_status='verified';
            $user->update();
        }
        return redirect()->back()->with('success','User verified successfully...');
    }
    public function deleteUsers(Request $request){
        $users=User::whereIn('id',$request->ids)->delete();
        return response(['success'=>true,'message'=>'Selected users deleted successfully...']);
    }

    public function deleteUser($id){
        $user=User::find($id);
        if ($user){
            $user->delete();
        }
        return redirect()->back()->with('success','User deleted successfully...');
    }
    public function deleteBooking($id){
        if (!auth()->check() || auth()->user()->type !== 'admin') {
            abort(403);
        }
        $booking=Order::find($id);
        if ($booking){
            $booking->delete();
        }
        return redirect()->back()->with('success','Booking deleted successfully...');
    }
    public function examiners(Request $request){
        $users = User::where('type','user')->get();
        $cities=City::all();
        return view('admin.user.examiners',compact('users','cities'));
    }
    public function partners()
    {
        $users = User::where('type','user')->get();
        $cities=City::all();
        return view('admin.user.partners',compact('users','cities'));
    }
    public function heardAbout()
    {
        $users = User::where('type','user')->get();
        $cities=City::all();
        return view('admin.user.heard_about',compact('users','cities'));

    }
    public function export(Request $request){

        $filename = 'users-feedback.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

//        dd($request->all());


        return response()->stream(function () use ($request) {
            $handle = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($handle, [
                'User ID',
                'User Name',
                'Email',
                'Feedback'

            ]);

            // Fetch and process data in chunks
            $users = User::where('type','user')->orderBy('updated_at','desc')->latest();
            $users->chunk(25, function ($applications) use ($handle) {
                foreach ($applications as $application) {

                    // Extract data from each employee.
                    $data = [
                        isset($application->id)? $application->id : '',
                        isset($application->name)? $application->name : '',
                        isset($application->email)? $application->email : '',
                        isset($application->heard_about)? $application->heard_about : '',

                    ];

                    // Write data to a CSV file.
                    fputcsv($handle, $data);
                }
            });

            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }
    public function admins(Request $request){
        $users = User::where('type','user')->get();
        $cities=City::all();
        return view('admin.user.admins',compact('users','cities'));
    }

    public function staff(Request $request)
    {
        $users = User::where('type', 'staff')->get();
        $cities = City::all();

        return view('admin.user.staff', compact('users', 'cities'));
    }
    public function unverified(){
        $cities=City::all();
        return view('admin.user.unverified',compact('cities'));
    }
    public function updateCity(Request $request){
        if ($request->id!=''){
            $city=City::find($request->id);
            $city->name=$request->name;
            $city->update();
            return response([
               'success'=>true,
                'message'=>"City updated successfully...",
                'type'=>'edit'
            ]);
        }else{
            $user=User::find($request->userid);
            $city=new City();
            $city->name=$request->name;
            $city->save();
            $user->cities()->attach($city);
            return response(['success'=>true,'message'=>'City created successfully...','type'=>'new']);

        }


    }
    public function updatePrice(Request $request){
        $user=User::find($request->id);
        if ($user){
            $user->price=$request->price;
            $user->update();
            return response(['success'=>true,'message'=>'Price updated successfully...','price'=>number_format($user->price,2).'€']);
        }
    }

    public function reviews(){
        return view('admin.reviews');
    }
    public function fetchReviews(Request $request){
        $reviews=Review::with('examiner','user');
        return DataTables::of($reviews)->editColumn('created_at',function($review){
            return $review->created_at ? date('d M Y, H:i a',strtotime($review->created_at)) : '';
        })->addColumn('actions',function($review){
            return '<a href="'.route('delete-review',$review->id).'" class="btn  btn-delete btn-icon btn-bg-light btn-active-color-primary btn-sm" >
															<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>';
        })->rawColumns(['actions'])->make(true);
    }
}
