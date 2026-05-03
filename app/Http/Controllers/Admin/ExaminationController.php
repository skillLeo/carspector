<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderExamination;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ExaminationController extends Controller
{
    public function examinations()
    {
        if (!auth()->check() || auth()->user()->type !== 'admin') {
            abort(403);
        }
        return view('admin.examinations');

    }
    public function fetch(Request $request)
    {
        if (!auth()->check() || auth()->user()->type !== 'admin') {
            abort(403);
        }
        $bookings = OrderExamination::select('*')->with('user', 'examiner','order')
        ->whereNotNull('order_id');
        $bookings = $bookings->when($request->date_range != '', function ($q) {
            $dates = explode('-', \request('date_range'));
            $from = Carbon::parse($dates[0]);
            $to = Carbon::parse($dates[1]);
            return $q->whereBetween('order_examinations.created_at', [$from->toDateTimeString(), $to->toDateString()]);
        });
        return DataTables::of($bookings)->editColumn('examiner_id',function ($row){
            if($row->order->examiner){
                return '<a class="btn-assign-examiner"  >'.$row->order->examiner->email.'</a>';
            }
            return '<a class="btn-assign-examiner" >--</a>';
        })->addColumn('actions', function ($booking) {

            return '<a href="#" data-id="' . $booking->id . '" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-order-details btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
																	<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
<a href="'.route('examiner.order',$booking->order_id).'" data-id="' . $booking->id . '"  class="btn btn-edit-order btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
															<span class="svg-icon  svg-icon-3" ><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Design / Edit</title>
    <desc>Created with Sketch.</desc>
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
        <rect fill="currentColor" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span>
															<!--end::Svg Icon-->
														</a>
														<a href="' . route('examination.delete', $booking->id) . '" class="btn  btn-delete btn-icon btn-bg-light btn-active-color-primary btn-sm" >
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
                <a href="' . route('order.pdf', ['number' => optional($booking->order)->pdf_number ?? 1]) . '"  target="_blank" class="btn   btn-icon btn-bg-light btn-active-color-primary btn-sm" >
															<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
															<span class="svg-icon svg-icon-primary svg-icon-1x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Download.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Files / Download</title>
    <desc>Created with Sketch.</desc>
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) " x="11" y="1" width="2" height="14" rx="1"/>
        <path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) "/>
    </g>
</svg><!--end::Svg Icon--></span>
															<!--end::Svg Icon-->
														</a>';
        })->editColumn('created_at', function ($booking) {
            return date('d M Y, H:i a', strtotime($booking->created_at));
        })->addColumn('booking_time', function ($booking) {
            return date('d M Y, H:i', strtotime($booking->date . ' ' . $booking->time));
        })->editColumn('status', function ($booking) {
            if ($booking->status == 'completed') {
                return '<a href="' . route('admin.booking.status', ['id' => $booking->id, 'status' => 'processing']) . '"> <span class="badge badge-success">Completed</span></a>';
            }
            if ($booking->status == 'processing') {
                return '<a href="' . route('admin.booking.status', ['id' => $booking->id, 'status' => 'inspecting']) . '"> <span class="badge badge-warning">Processing</span></a>';
            }

            if ($booking->status == 'inspecting') {
                return '<a href="' . route('admin.booking.status', ['id' => $booking->id, 'status' => 'completed']) . '"> <span class="badge badge-warning">Finishing</span></a>';
            }
            return '<a href="' . route('admin.booking.status', ['id' => $booking->id, 'status' => 'inspecting']) . '"><span class="badge badge-primary">Processing</span></a>';
        })->rawColumns(['actions', 'status','examiner_id'])->make(true);

    }
    public function delete($id)
    {
        if (!auth()->check() || auth()->user()->type !== 'admin') {
            abort(403);
        }
        $order=Order::find($id);
        if($order){
            $examiner=User::find($order->examiner_id);
            if ($examiner){
                $examiner->password=(\Str::random(10));
                $examiner->update();
            }

            $order->examiner_id = null;
            $order->status = 'pending';
            $order->admin_status = 'New';
            $order->update();
          $examination=OrderExamination::where('order_id',$id)->first();
          if ($examination) {
              $examination->delete();
          }
        }

        return redirect()->back()->with('success', 'Examination deleted successfully');

    }
}
