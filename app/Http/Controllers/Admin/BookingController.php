<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentSetMail;
use App\Mail\ExaminationStatusMail;
use App\Mail\ExaminerBookingMail;
use App\Mail\PdfOrder;
use App\Services\OrderPdfService;
use App\Mail\StatusMail;
use App\Models\AdminNotification;
use App\Models\B2bPartner;
use App\Models\City;
use App\Models\NewBooking;
use App\Models\Order;
use App\Models\OrderExamination;
use App\Models\PartnerLogo;
use App\Models\User;
use Brevo\Client\Model\CreateContact;
use Carbon\Carbon;
use Hofmannsven\Brevo\Facades\Brevo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;
use Yajra\DataTables\Facades\DataTables;


class BookingController extends Controller
{
    private const BREVO_REVIEW_LIST_ID = 21;

    public function bookings()
    {
        $cities = City::all();
        $partnerLogos = PartnerLogo::orderBy('name')->get();

        $tabCounts = [
            'all'    => Order::count(),
            'new'    => Order::where('admin_status', 'New')->whereDate('created_at', '>=', '2026-05-09')->count(),
            'active' => Order::where(function ($q) {
                            $q->whereNull('admin_status')
                              ->orWhereNotIn('admin_status', ['Completed', 'Abgeschlossen', 'New', 'Problem', 'Storniert']);
                        })->count(),
            'ready'  => Order::where('admin_status', 'Fertigstellung')->count(),
            'storno' => Order::where('admin_status', 'Problem')->count(),
        ];

        return view('admin.bookings', compact('cities', 'partnerLogos', 'tabCounts'));
    }

    public function editBooking(Request $request)
    {
        $booking = Order::find($request->id);
        return response()->json([
            'dt' => $booking,
            'success' => true,
        ]);

    }

    public function showBooking(Order $order)
    {
        $order->load(['user', 'examiner', 'b2bPartner', 'partnerLogo']);
        $partnerLogos = \App\Models\PartnerLogo::orderBy('name')->get();
        return view('admin.booking-detail', compact('order', 'partnerLogos'));
    }

    public function sendExaminerEmail(Request $request)
    {
        if (!auth()->check() || !in_array(auth()->user()->type, ['admin', 'staff'])) {
            abort(403, 'Unauthorized');
        }

        $data = $request->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:190'],
            'message' => ['nullable', 'string', 'max:2000'],
            'manual_customer_name' => ['nullable', 'string', 'max:190'],
            'manual_booking_code' => ['nullable', 'string', 'max:190'],
            'manual_car_model' => ['nullable', 'string', 'max:190'],
            'manual_seller_name' => ['nullable', 'string', 'max:190'],
            'manual_seller_address' => ['nullable', 'string', 'max:255'],
            'manual_seller_phone' => ['nullable', 'string', 'max:100'],
            'manual_listing_link' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            $order = Order::findOrFail($data['order_id']);
            $password = Str::random(8);

            $examiner = User::where('email', $data['email'])->first();
            if ($examiner) {
                $examiner->password = bcrypt($password);
                $examiner->save();
            } else {
                $examiner = User::create([
                    'name' => 'Examiner',
                    'email' => $data['email'],
                    'password' => bcrypt($password),
                ]);
            }

            $order->examiner_id = $examiner->id;
            $order->save();

            $customMessage = trim((string) ($data['message'] ?? '')) ?: null;
            $customSubject = trim((string) $data['subject']);
            $manualDetails = [
                'customer_name' => trim((string) ($data['manual_customer_name'] ?? '')) ?: null,
                'booking_code' => trim((string) ($data['manual_booking_code'] ?? '')) ?: null,
                'car_model' => trim((string) ($data['manual_car_model'] ?? '')) ?: null,
                'seller_name' => trim((string) ($data['manual_seller_name'] ?? '')) ?: null,
                'seller_address' => trim((string) ($data['manual_seller_address'] ?? '')) ?: null,
                'seller_phone' => trim((string) ($data['manual_seller_phone'] ?? '')) ?: null,
                'listing_link' => trim((string) ($data['manual_listing_link'] ?? '')) ?: null,
            ];
            Mail::to($data['email'])
                ->bcc('info@carspector.de')
                ->send(new ExaminerBookingMail($order, $customMessage, $customSubject, $manualDetails));

            return response()->json([
                'success' => true,
                'message' => 'Email sent to examiner successfully.',
            ]);
        } catch (Throwable $e) {
            report($e);
            return response()->json([
                'success' => false,
                'message' => 'Unable to send the email right now. Please try again.',
            ], 500);
        }
    }
    public function sendCustomerPDF($id, Request $request)
    {
        if (auth()->check() && auth()->user()->type === 'staff') {
            abort(403, 'Staff is not allowed to send PDFs.');
        }
        $order=Order::find($id);
        if ($order){
            $mailFailed = false;
            $examination=OrderExamination::where('order_id',$order->id)->first();
            if ($examination){
                $examination->status='finished';
                $examination->update();
            }
            $order->status='completed';
            $order->admin_status = 'Completed';
            $order->completed_at = $order->completed_at ?: now();
            $order->update();
            // Determine whether to hide upsell sections in the email
            $hideUpsell = (bool) $request->boolean('no_upsell');
            // Choose language by booking option (Dokumente auf Englisch)
            $isEnglish = (bool) ($order->document_in_english ?? false);

            // Generate and store customer PDF (can be modified/resent)
            $pdf = $isEnglish
                ? app(OrderPdfService::class)->generateAndStoreEn($order)
                : app(OrderPdfService::class)->generateAndStore($order);

            $recipient = $this->resolveEmailRecipient($order);
            try {
                if ($isEnglish) {
                    Mail::to($recipient)->send(new \App\Mail\PdfOrderEn($order, $examination, $order->user, $hideUpsell));
                } else {
                    Mail::to($recipient)->send(new PdfOrder($order, $examination, $order->user, $hideUpsell));
                }
            } catch (Throwable $e) {
                $mailFailed = true;
                Log::warning('Customer PDF mail send failed', [
                    'order_id' => $order->id,
                    'email' => $recipient,
                    'error' => $e->getMessage(),
                ]);
            }

            if ($request->boolean('sent_review')) {
                $this->addContactToBrevoReviewList($order->email, $order->user->name ?? null);
            }

            if ($mailFailed) {
                return redirect()->back()->with('error', 'PDF processed, but email sending failed. Please try sending again.');
            }

            return redirect()->back()->with('success', 'Prüfbericht wurde erfolgreich versendet.');
        }
        return redirect()->back()->with('error', 'Something went wrong...');


    }

    public function sendCustomerPDFEn($id, Request $request)
    {
        if (auth()->check() && auth()->user()->type === 'staff') {
            abort(403, 'Staff is not allowed to send PDFs.');
        }
        $order = Order::find($id);
        if ($order) {
            $mailFailed = false;
            $examination = OrderExamination::where('order_id', $order->id)->first();
            if ($examination) {
                $examination->status = 'finished';
                $examination->update();
            }
            $order->status = 'completed';
            $order->admin_status = 'Completed';
            $order->completed_at = $order->completed_at ?: now();
            $order->update();

            $hideUpsell = (bool) $request->boolean('no_upsell');
            $pdf = app(OrderPdfService::class)->generateAndStoreEn($order);
            $recipient = $this->resolveEmailRecipient($order);
            try {
                Mail::to($recipient)->send(new \App\Mail\PdfOrderEn($order, $examination, $order->user, $hideUpsell));
            } catch (Throwable $e) {
                $mailFailed = true;
                Log::warning('Customer English PDF mail send failed', [
                    'order_id' => $order->id,
                    'email' => $recipient,
                    'error' => $e->getMessage(),
                ]);
            }

            if ($request->boolean('sent_review')) {
                $this->addContactToBrevoReviewList($order->email, $order->user->name ?? null);
            }

            if ($mailFailed) {
                return redirect()->back()->with('error', 'English PDF processed, but email sending failed. Please try sending again.');
            }

            return redirect()->back()->with('success', 'Prüfbericht (E) wurde erfolgreich versendet.');
        }
        return redirect()->back()->with('error', 'Something went wrong...');
    }

    private function resolveEmailRecipient(Order $order): ?string
    {
        if ($order->order_source === 'b2b' && $order->b2b_partner_id) {
            $partner = B2bPartner::find($order->b2b_partner_id);
            return ($partner && $partner->email) ? $partner->email : ($order->email ?: null);
        }
        return $order->email ?: null;
    }

    private function addContactToBrevoReviewList(?string $email, ?string $name = null): void
    {
        if (!$email) {
            return;
        }

        try {
            $payload = [
                'email' => $email,
                'updateEnabled' => true,
                'listIds' => [self::BREVO_REVIEW_LIST_ID],
            ];

            $name = trim((string) $name);
            if ($name !== '') {
                $payload['attributes'] = [
                    'FIRSTNAME' => $name,
                    'NAME' => $name,
                ];
            }

            Brevo::ContactsApi()->createContact(new CreateContact($payload));
        } catch (\Throwable $e) {
            Log::warning('Brevo review list add failed', [
                'email' => $email,
                'list_id' => self::BREVO_REVIEW_LIST_ID,
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function storeBooking(Request $request)
    {
        $this->validate($request, [
//            'vehicle_make_model' => 'required|string|max:255',
//            'vehicle_type' => 'required|string',
//            'email' => 'required|email',
//            'phone' => 'required|string|max:100',
//            'price' => 'required',
//            'city' => 'required|string|max:190',
//            'address' => 'required|string|max:255',
//            'partner_logo_id' => 'nullable|exists:partner_logos,id',
        ]);

        if ($request->boolean('pdf_with_partner_logo') && !$request->partner_logo_id) {
            return redirect()->back()->withErrors([
                'partner_logo_id' => 'Please choose the partner logo that should appear on the PDF.',
            ])->withInput();
        }

        $user = User::where('email', $request->email)->first();
        $examiner = User::find(1);
        $order = Order::firstOrNew(['id' => $request->id]);

        if ($user) {
            $order->user_id = $user->id;
        } else {

        }

        $order->brand = $request->has('brand') ? $request->brand : $order->brand;
        $order->admin_order_date = $this->parseOptionalDate($request->admin_order_date);
        $order->customer_name = trim((string) $request->customer_name) ?: null;
        $order->examiner_name = trim((string) $request->examiner_name) ?: null;
        $order->admin_status = trim((string) $request->admin_status) ?: ($order->admin_status ?: 'New');
        $order->completed_at = $this->parseOptionalDate($request->completed_at);
        $paidAtStatus = trim((string) $request->paid_at_status);
        if (in_array($paidAtStatus, ['error', 'missing'], true)) {
            $order->paid_at = null;
            $order->paid_at_status = $paidAtStatus;
        } else {
            $order->paid_at = $this->parseOptionalDate($request->paid_at);
            $order->paid_at_status = null;
        }
        // Only update fields that are actually present in the edit form — never wipe fields not submitted
        $order->make_year        = $request->has('make_year') ? $request->make_year : $order->make_year;
        $order->link             = $request->has('link') ? $request->link : $order->link;
        $order->desc             = isset($request['desc']) ? $request['desc'] : '';
        $order->street           = isset($request['address']) ? $request['address'] : '';
        $order->vehicle_make_model = isset($request['vehicle_make_model']) ? $request['vehicle_make_model'] : '';
        $order->city             = isset($request['city']) ? $request['city'] : '';
        $order->phone            = $request->phone;
        // seller_phone is a separate field — never overwrite it with the customer phone field
        if ($request->has('seller_phone')) {
            $order->seller_phone = $request->seller_phone;
        }
        $order->negotiation_checklist = $request->negotiation_checklist == 1 ? 1 : 0;
        $order->document_in_english = $request->document_in_english == 1 ? 1 : 0;
        $order->pdf_with_partner_logo = $request->pdf_with_partner_logo == 1 ? 1 : 0;
        $order->partner_logo_id = $request->pdf_with_partner_logo == 1 ? $request->partner_logo_id : null;
        $order->payment_type    = $order->payment_type ?: (Session::get('payment_type') ?? '');
        $order->commission      = $order->commission ?: 20;
        $order->order_type      = $order->order_type ?: 'B2C';
        $order->advertisement_link = isset($request['advertisement_link']) ? $request['advertisement_link'] : '';

        $order->price = $request->price;
        $order->email = $request->email;
        $order->vehicle_type = $request->vehicle_type;
//        if ($examiner) {
//            $request->total_amount = $examiner ? ($examiner->price - 20) : 0;
//            $order->price = $examiner->price ? $examiner->price : 0;
//        }


        $order->save();

        if ($request->id) {
            return redirect()->route('admin.bookings.show', $order->id)->with('success', 'Auftragsstatus wurde erfolgreich aktualisiert');
        }
        return redirect()->route('admin.bookings')->with('success', 'Auftragsstatus wurde erfolgreich aktualisiert');
    }
    

    public function fetchBookings(Request $request)
    {
        // Force-select from orders table to avoid ambiguous `id` when DataTables manipulates the query
        // and keep Eloquent mode so rows are proper models (no id shadowing by related models)
        $bookings = Order::query()
            ->select('orders.*')
            ->selectRaw('(SELECT COUNT(*) FROM inspector_requests WHERE inspector_requests.order_id = orders.id AND inspector_requests.status = "accepted") as accepted_inspector_count')
            ->with(['examiner','user','b2bPartner'])
            ->orderByRaw('COALESCE(orders.admin_order_date, DATE(orders.created_at)) DESC, orders.created_at DESC');
//        dd($bookings);
//        dd($bookings);
        $bookings = $bookings->when($request->date_range != '', function ($q) {
            $dates = explode('-', \request('date_range'));
            $from = Carbon::parse($dates[0]);
            $to = Carbon::parse($dates[1]);
            return $q->whereBetween('orders.created_at', [$from->toDateTimeString(), $to->toDateString()]);
        })->when(($request->user_id !== null && $request->user_id !== ''), function ($q) use ($request) {
            return $q->where('orders.user_id', $request->user_id);
        })->when(($request->examiner_email ?? '') !== '', function ($q) use ($request) {
            return $q->whereHas('examiner', function($qq) use ($request){
                $qq->where('email', 'like', '%'.$request->examiner_email.'%');
            });
            })->when(($request->booking_scope ?? '') === 'new', function ($q) {
    return $q->where('orders.admin_status', 'New')
             ->whereDate('orders.created_at', '>=', '2026-05-09');
        })->when(($request->booking_scope ?? '') === 'active', function ($q) {
            return $q->where(function ($qq) {
                $qq->whereNull('orders.admin_status')
                    ->orWhereNotIn('orders.admin_status', ['Completed', 'Abgeschlossen', 'New', 'Problem', 'Storniert']);
            });
        })->when(($request->booking_scope ?? '') === 'ready', function ($q) {
            return $q->where('orders.admin_status', 'Fertigstellung');
        })->when(($request->booking_scope ?? '') === 'storno', function ($q) {
            return $q->where('orders.admin_status', 'Problem');
        })->when(($request->status ?? '') !== '', function($q) use ($request){
            $status = $request->status === 'Pruefung' ? 'Prüfung' : $request->status;
            return $q->where(function ($qq) use ($status) {
                $qq->where('orders.admin_status', $status);
                if ($status === 'Completed') {
                    $qq->orWhere('orders.admin_status', 'Abgeschlossen');
                }
                if ($status === 'Prüfung') {
                    $qq->orWhere('orders.admin_status', 'Pruefung');
                }
            });
        })->when(in_array($request->order_type, ['B2B', 'B2C'], true), function($q) use ($request){
            return $q->where('orders.order_type', $request->order_type);
        });
        return DataTables::eloquent($bookings)->filterColumn('orderno', function ($query, $keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('orders.orderno', 'like', "%{$keyword}%")
                    ->orWhere('orders.id', 'like', "%{$keyword}%")
                    ->orWhere('orders.pdf_number', 'like', "%{$keyword}%");
            });
        })// ->addColumn('order_number', function ($booking) {
        //     $orderNumber = $booking->display_order_number;
        //     return '<a href="' . route('admin.bookings.show', $booking->id) . '" class="fw-semibold text-nowrap text-primary">' . e($orderNumber) . '</a>';
        // })
        ->addColumn('order_number', function ($booking) {
            $dot = ($booking->order_source === 'b2b')
                ? '<span class="b2b-indicator" title="B2B Order"></span>'
                : '';
            return $dot . '<span class="fw-semibold text-nowrap">' . e($booking->display_order_number) . '</span>';
        })
        ->addColumn('admin_order_date_display', function ($booking) {
            $date = $booking->admin_order_date ? $booking->admin_order_date->format('d.m.Y') : $booking->created_at->format('d.m.Y');
            return '<span class="text-nowrap">' . e($date) . '</span>';
        })->addColumn('price_display', function ($booking) {
            return $booking->price !== null && $booking->price !== '' ? '<span class="text-nowrap">' . e($booking->price) . ' €</span>' : '-';
        })->addColumn('vehicle_display', function ($booking) {
            return '<div class="compact-cell">'
                . '<span class="primary">' . e($booking->vehicle_make_model ?: '-') . '</span>'
                . ($booking->brand ? '<span class="secondary">' . e($booking->brand) . '</span>' : '')
                . '</div>';
        })->addColumn('customer_display', function ($booking) {
            if ($booking->order_source === 'b2b' && $booking->b2bPartner) {
                $name  = $booking->b2bPartner->company_name;
                $email = $booking->b2bPartner->email;
            } else {
                $name  = $booking->customer_name ?: ($booking->user->name ?? 'No User');
                $email = $booking->email ?: ($booking->user->email ?? '');
            }
            return '<div class="compact-cell">'
                . '<span class="primary">' . e($name) . '</span>'
                . ($email ? '<span class="text-muted fs-8">' . e($email) . '</span>' : '')
                . '</div>';
        })
        ->addColumn('examiner_display', function ($booking) {
            $deleteBtn = '<a href="' . route('examination.delete', $booking->id) . '" '
                . 'class="btn btn-xs btn-outline-danger btn-sm ms-1 js-confirm-delete" style="padding:1px 5px;font-size:11px;" '
                . 'data-message="Remove examiner and reset examination for order ' . e($booking->display_order_number) . '?">'
                . '<i class="fas fa-times"></i></a>';

          if ($booking->examiner_name) {
    return '<div class="d-flex align-items-center justify-content-between w-100">'
        . '<div class="compact-cell">'
            . '<span class="primary">' . e($booking->examiner_name) . '</span>'
            . ($booking->examiner && $booking->examiner->email
                ? '<span class="text-muted fs-8">' . e($booking->examiner->email) . '</span>'
                : '')
        . '</div>'
        . $deleteBtn
        . '</div>';
}
            if ($booking->examiner) {
    return '<div class="d-flex align-items-center justify-content-between w-100">'
        . '<a class="btn-assign-examiner" href="#assign_examiner" data-id="'.$booking->id.'" data-bs-target="#assign_examiner" data-bs-toggle="modal">'
        . e($booking->examiner->email)
        . '</a>'
        . $deleteBtn
        . '</div>';
}
            $acceptedCount = (int) ($booking->accepted_inspector_count ?? 0);
            $subtext = $acceptedCount > 0
                ? '<br><small class="text-success" style="font-size:11px;">✓ '.$acceptedCount.' accepted</small>'
                : '';
            return '<a class="btn-assign-examiner" href="#assign_examiner" data-id="'.$booking->id.'" data-bs-target="#assign_examiner" data-bs-toggle="modal">Assign Examiner</a>'.$subtext;
        })
        ->addColumn('appointment_display', function ($booking) {
    if ($booking->appointment_date) {
        $appointmentDate = \Carbon\Carbon::parse($booking->appointment_date)->startOfDay();
        $today = now()->startOfDay();

        $date = ['So.', 'Mo.', 'Di.', 'Mi.', 'Do.', 'Fr.', 'Sa.'][$appointmentDate->dayOfWeek]
            . ' ' . $appointmentDate->format('d.m.Y');

        $time = $booking->appointment_time
            ? ' • ' . substr($booking->appointment_time, 0, 5) . ' Uhr'
            : '';

            if (in_array($booking->admin_status, ['Completed', 'Abgeschlossen'])) {
            $badgeClass = 'badge-success';      
            } elseif ($appointmentDate->lt($today)) {
                $badgeClass = 'badge-warning';     
            } elseif ($appointmentDate->equalTo($today)) {
                $badgeClass = 'badge-info';      
            } else {
                $badgeClass = 'badge-secondary';       
            }
                return '<span class="badge ' . $badgeClass . ' px-2 py-1">' . e($date . $time) . '</span>';
            }

            $btn = '';
            if ($booking->examiner_name || $booking->examiner_id) {
                $btn = '<br><a href="#" class="js-appt-reminder" data-id="' . $booking->id . '" style="font-size:12px;text-decoration:none;">Termin anfragen</a>';
            }

            return '<span class="text-muted" style="font-size:12px;">Kein Termin</span>' . $btn;
        })

        ->addColumn('actions', function ($booking) {
            return '<a href="' . route('admin.bookings.show', $booking->id) . '" style="width:50px;height:31px;display:flex;align-items:center;justify-content:center;" class="btn btn-light-primary" title="Detail"><i class="fas fa-eye"></i></a>';
        })->editColumn('examiner_id',function ($row){
            if($row->examiner){
                return '<a class="btn-assign-examiner" href="#assign_examiner" data-id="'.$row->id.'" data-bs-target="#assign_examiner" data-bs-toggle="modal">'.$row->examiner->email.'</a>';
            }
            return '<a class="btn-assign-examiner" href="#assign_examiner" data-id="'.$row->id.'" data-bs-target="#assign_examiner" data-bs-toggle="modal">Assign Examiner</a>';
        })->editColumn('created_at', function ($booking) {
            return date('d M Y, H:i a', strtotime($booking->created_at));
        })->addColumn('booking_time', function ($booking) {
            return date('d M Y, H:i', strtotime($booking->date . ' ' . $booking->time));
        })->editColumn('status', function ($booking) {
            $current = $booking->admin_status ?: ($booking->status == 'completed' ? 'Completed' : 'New');
            if ($current === 'Abgeschlossen') {
                $current = 'Completed';
            } elseif ($current === 'Pruefung' || str_contains($current, 'fung')) {
                $current = 'Pruefung';
            }
            $classes = [
                'New' => 'badge-secondary',
                'Zuweisung' => 'badge-secondary',
                'Pruefung' => 'badge-info',
                'PrÃ¼fung' => 'badge-info',
                'Prüfung' => 'badge-info',
                'Fertigstellung' => 'badge-warning',
                'Completed' => 'badge-success',
                'Abgeschlossen' => 'badge-success',
                'Problem' => 'badge-danger',
            ];
            $class = $classes[$current] ?? 'badge-primary';
            $labels = [
                'New' => 'New',
                'Zuweisung' => 'Zuweisung',
                'Pruefung' => 'Pr&uuml;fung',
                'Fertigstellung' => 'Fertigstellung',
                'Completed' => 'Completed',
                'Problem' => 'Problem',
            ];
            return '<button type="button" class="badge border-0 ' . $class . ' js-open-status-modal" data-id="' . $booking->id . '" data-current="' . e($current) . '">' . ($labels[$current] ?? e($current)) . '</button>';
            $current = $booking->admin_status ?: ($booking->status == 'completed' ? 'Abgeschlossen' : 'Pruefung');
            $classes = [
                'Zuweisung' => 'badge-secondary',
                'Pruefung' => 'badge-info',
                'Prüfung' => 'badge-info',
                'Fertigstellung' => 'badge-warning',
                'Abgeschlossen' => 'badge-success',
            ];
            $class = $classes[$current] ?? 'badge-primary';
            return '<button type="button" class="badge border-0 ' . $class . ' js-open-status-modal" data-id="' . $booking->id . '" data-current="' . e($current) . '">' . e($current) . '</button>';
            $current = $booking->admin_status ?: ($booking->status == 'completed' ? 'Abgeschlossen' : 'PrÃ¼fung');
            $statuses = ['Zuweisung', 'PrÃ¼fung', 'Fertigstellung', 'Abgeschlossen'];
            $html = '<select class="form-select form-select-sm inline-admin-field js-inline-booking-field" data-id="' . $booking->id . '" data-field="admin_status">';
            foreach ($statuses as $status) {
                $html .= '<option value="' . e($status) . '"' . ($current === $status ? ' selected' : '') . '>' . e($status) . '</option>';
            }
            $html .= '</select>';
            return $html;
            if ($booking->admin_status) {
                $classes = [
                    'Zuweisung' => 'badge-secondary',
                    'Prüfung' => 'badge-info',
                    'Fertigstellung' => 'badge-warning',
                    'Abgeschlossen' => 'badge-success',
                ];
                $class = $classes[$booking->admin_status] ?? 'badge-primary';
                return '<span class="badge ' . $class . '">' . e($booking->admin_status) . '</span>';
            }
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
        })->editColumn('document_in_english',function ($booking){
            $statusHtml='';
            if($booking->examination){
                if($booking->examination->status=='finishing') {
                    $statusHtml .= ' <span class="badge badge-sm badge-warning">Status: Finishing</span>';
                }elseif($booking->examination->status=='finished'){
                    $statusHtml .= '<span class="badge badge-sm badge-success">Status: Finished</span>';
                }else{
                    $statusHtml.=  '<span class="badge badge-sm badge-warning">Status: '.ucfirst($booking->examination->status).'</span>';
                }

            }
            return '';
        })->rawColumns(['status','examiner_id', 'order_number', 'admin_order_date_display', 'appointment_display', 'actions', 'customer_display', 'vehicle_display', 'examiner_display', 'price_display'])->make(true);
    }

    public function updateInline(Request $request)
    {
        $data = $request->validate([
            'id' => ['required', 'exists:orders,id'],
            'field' => ['required', 'in:admin_status,completed_at,paid_at,paid_at_status'],
            'value' => ['nullable', 'string', 'max:190'],
        ]);

        $order = Order::findOrFail($data['id']);
        $value = trim((string) ($data['value'] ?? ''));

        if ($data['field'] === 'admin_status') {
            $allowed = ['New', 'Zuweisung', 'Pruefung', 'Fertigstellung', 'Completed', 'Problem'];
            abort_unless(in_array($value, $allowed, true), 422, 'Invalid status.');
            $order->admin_status = $value;
            if ($value === 'Completed') {
                $order->status = 'completed';
                $order->completed_at = $order->completed_at ?: now();
            } elseif (in_array($value, ['Pruefung', 'Fertigstellung'], true)) {
                $order->status = 'inspecting';
            } else {
                $order->status = 'processing';
            }
        } elseif (false && $data['field'] === 'admin_status') {
            $allowed = ['Zuweisung', 'PrÃ¼fung', 'Fertigstellung', 'Abgeschlossen'];
            abort_unless(in_array($value, $allowed, true), 422, 'Invalid status.');
            $order->admin_status = $value;
            if ($value === 'Abgeschlossen') {
                $order->status = 'completed';
                $order->completed_at = $order->completed_at ?: now();
            } elseif ($value === 'Fertigstellung') {
                $order->status = 'inspecting';
            } else {
                $order->status = 'processing';
            }
        } elseif ($data['field'] === 'completed_at') {
            $order->completed_at = $this->parseOptionalDate($value);
        } elseif ($data['field'] === 'paid_at') {
            $order->paid_at = $this->parseOptionalDate($value);
            if ($order->paid_at) { $order->paid_at_status = null; }
        } elseif ($data['field'] === 'paid_at_status') {
            $allowed = ['error', 'missing', ''];
            abort_unless(in_array($value, $allowed, true), 422, 'Invalid status.');
            $order->paid_at_status = $value ?: null;
            if ($value) { $order->paid_at = null; }
        }

        $order->save();

        if ($data['field'] === 'admin_status'
            && $value === 'Fertigstellung'
            && $order->order_source === 'b2b'
            && $order->b2b_partner_id) {
            try {
                $partner = B2bPartner::find($order->b2b_partner_id);
                if ($partner && $partner->email) {
                    $examination = OrderExamination::where('order_id', $order->id)->first();
                    Mail::to($partner->email)->send(new ExaminationStatusMail($order, $examination, null));
                }
            } catch (\Throwable $e) {
                Log::warning('B2B status email failed', ['order_id' => $order->id, 'error' => $e->getMessage()]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Booking updated successfully.',
        ]);
    }

    public function updateAppointment(Request $request, Order $order)
    {
        if (!auth()->check() || auth()->user()->type !== 'admin') {
            abort(403);
        }

        if ($request->has('remove_appointment')) {
            $order->appointment_date = null;
            $order->appointment_time = null;
            $order->save();

            return redirect()->back()->with('success', 'Termin wurde entfernt.');
        }

        $data = $request->validate([
            'appointment_date' => ['required', 'date'],
            'appointment_time' => ['nullable', 'date_format:H:i'],
        ]);

        // Only send email if the date actually changed
        $dateChanged = $order->appointment_date !== $data['appointment_date'];
        $order->appointment_date = $data['appointment_date'];
        $order->appointment_time = $data['appointment_time'] ?? null;
        $order->save();

        $recipient = $dateChanged ? ($order->email ?: ($order->user->email ?? null)) : null;
        if ($recipient) {
            try {
                Mail::to($recipient)->send(new AppointmentSetMail($order));
            } catch (\Throwable $e) {
                Log::warning('Appointment email failed', ['order_id' => $order->id, 'error' => $e->getMessage()]);
                return redirect()->back()->with('success', 'Appointment saved. (Email could not be sent — check mail config.)');
            }
        }

        if ($dateChanged && $order->order_source === 'b2b' && $order->b2b_partner_id) {
            try {
                $partner = B2bPartner::find($order->b2b_partner_id);
                if ($partner && $partner->email) {
                    Mail::to($partner->email)->send(new AppointmentSetMail($order));
                }
            } catch (\Throwable $e) {
                Log::warning('B2B appointment email failed', ['order_id' => $order->id, 'error' => $e->getMessage()]);
            }
        }

        return redirect()->back()->with('success', $dateChanged ? 'Termin wurde gesetzt und der Kunde benachrichtigt.' : 'Termin gespeichert (keine Änderung, kein E-Mail gesendet).');
    }

    public function saveVehicleDetails(Request $request, int $orderId)
    {
        $order = Order::findOrFail($orderId);

        $data = $request->validate([
            'vehicle_make_model'     => 'nullable|string|max:255',
            'make_year'              => 'nullable|string|max:50',
            'mileage'                => 'nullable|string|max:50',
            'listing_seller_name'    => 'nullable|string|max:255',
            'listing_seller_address' => 'nullable|string|max:255',
            'seller_phone'           => 'nullable|string|max:100',
        ]);

        $order->vehicle_make_model     = $data['vehicle_make_model']     ?? $order->vehicle_make_model;
        $order->make_year              = $data['make_year']              ?? $order->make_year;
        $order->mileage                = $data['mileage']                ?? $order->mileage;
        $order->listing_seller_name    = $data['listing_seller_name']    ?? $order->listing_seller_name;
        $order->listing_seller_address = $data['listing_seller_address'] ?? $order->listing_seller_address;
        $order->seller_phone           = $data['seller_phone']           ?? $order->seller_phone;
        $order->private_seller         = $request->boolean('private_seller');
        $order->vehicle_details_confirmed = 1;
        $order->save();

        return redirect()->back()->with('success', 'Fahrzeug- und Verkäuferdaten gespeichert.');
    }

    public function confirmStatus(Request $request, Order $order)
    {
        $status = (string) $request->input('admin_status');
        if (in_array($status, ['New', 'Zuweisung', 'Pruefung', 'Prüfung', 'Fertigstellung', 'Completed', 'Problem'], true)) {
            if (auth()->check() && auth()->user()->type === 'staff') {
                abort(403, 'Staff is not allowed to change status.');
            }

            $status = $status === 'Pruefung' ? 'Prüfung' : $status;

            if ($status === 'Completed') {
                $order->status = 'completed';
                $order->admin_status = 'Completed';
                $order->completed_at = $order->completed_at ?: now();

                $examination = OrderExamination::where('order_id', $order->id)->first();
                if ($examination) {
                    $examination->status = 'finished';
                    $examination->update();
                }

                $order->update();

                $isEnglish = (bool) ($order->document_in_english ?? false);
                $isEnglish
                    ? app(OrderPdfService::class)->generateAndStoreEn($order)
                    : app(OrderPdfService::class)->generateAndStore($order);

                $pdfRecipient = $this->resolveEmailRecipient($order);
                try {
                    if ($isEnglish) {
                        Mail::to($pdfRecipient)->send(new \App\Mail\PdfOrderEn($order, $examination, $order->user));
                    } else {
                        Mail::to($pdfRecipient)->send(new PdfOrder($order, $examination, $order->user));
                    }
                } catch (Throwable $e) {
                    Log::warning('Manual status PDF mail send failed', [
                        'order_id' => $order->id,
                        'email' => $pdfRecipient,
                        'error' => $e->getMessage(),
                    ]);
                }

                return redirect()->back()->with('success', 'Booking status updated and PDF email processed.');
            }

            $order->admin_status = $status;
            $order->status = in_array($status, ['Prüfung', 'Fertigstellung'], true) ? 'inspecting' : 'processing';

            // if ($status === 'Prüfung') {
            //     try {
            //         $examination = OrderExamination::where('order_id', $order->id)->first();
            //         if ($examination) {
            //             $examination->status = 'inspecting';
            //             $examination->update();
            //         }
            //         $recipient = $order->user->email ?? $order->email;
            //         if ($recipient) {
            //             Mail::to($recipient)->send(new ExaminationStatusMail($order, $examination, $order->user));
            //         }
            //     } catch (Throwable $e) {
            //         Log::debug($e->getMessage());
            //     }
            // }

            if ($status === 'Fertigstellung') {
                try {
                    $examination = OrderExamination::where('order_id', $order->id)->first();
                    if ($examination) {
                        $examination->status = 'finishing';
                        $examination->update();
                    }
                    $recipient = $this->resolveEmailRecipient($order);
                    if ($recipient) {
                        Mail::to($recipient)->send(new ExaminationStatusMail($order, $examination, $order->user));
                    }
                } catch (Throwable $e) {
                    Log::debug($e->getMessage());
                }
            }

            $order->update();

            return redirect()->back()->with('success', 'Booking status updated successfully.');
        }

        if (auth()->check() && auth()->user()->type === 'staff') {
            abort(403, 'Staff is not allowed to change status.');
        }

        $data = $request->validate([
            'admin_status' => ['required', 'in:Zuweisung,Pruefung,Prüfung,Fertigstellung,Abgeschlossen'],
        ]);

        $status = $data['admin_status'];
        if ($status === 'Pruefung') {
            $status = 'Prüfung';
        }

        if ($status === 'Abgeschlossen') {
            $order->status = 'completed';
            $order->admin_status = 'Abgeschlossen';
            $order->completed_at = $order->completed_at ?: now();

            $examination = OrderExamination::where('order_id', $order->id)->first();
            if ($examination) {
                $examination->status = 'finished';
                $examination->update();
            }

            $order->update();

            $isEnglish = (bool) ($order->document_in_english ?? false);
            $isEnglish
                ? app(OrderPdfService::class)->generateAndStoreEn($order)
                : app(OrderPdfService::class)->generateAndStore($order);

            $pdfRecipient = $this->resolveEmailRecipient($order);
            try {
                if ($isEnglish) {
                    Mail::to($pdfRecipient)->send(new \App\Mail\PdfOrderEn($order, $examination, $order->user));
                } else {
                    Mail::to($pdfRecipient)->send(new PdfOrder($order, $examination, $order->user));
                }
            } catch (Throwable $e) {
                Log::warning('Manual status PDF mail send failed', [
                    'order_id' => $order->id,
                    'email' => $pdfRecipient,
                    'error' => $e->getMessage(),
                ]);
            }

            return redirect()->back()->with('success', 'Booking status updated and PDF email processed.');
        }

        $order->admin_status = $status;
        $order->status = in_array($status, ['Prüfung', 'Fertigstellung'], true) ? 'inspecting' : 'processing';

        if ($status === 'Prüfung') {
            try {
                $examination = OrderExamination::where('order_id', $order->id)->first();
                if ($examination) {
                    $examination->status = 'inspecting';
                    $examination->update();
                }
                $recipient = $order->user->email ?? $order->email;
                if ($recipient) {
                    // Mail::to($recipient)->send(new ExaminationStatusMail($order, $examination, $order->user));
                }
            } catch (Throwable $e) {
                Log::debug($e->getMessage());
            }
        }

        $order->update();

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }

    public function bookingStatus($id, Request $request)
    {
        if (auth()->check() && auth()->user()->type === 'staff') {
            abort(403, 'Staff is not allowed to change status.');
        }
        $order = Order::find($id);
//       dd($request->all());

        if ($order) {
            if ($request->status == 'completed') {

                $order->status = 'completed';
                $order->admin_status = 'Completed';
                $order->completed_at = $order->completed_at ?: now();
                if ($order){
                    $examination=OrderExamination::where('order_id',$order->id)->first();
                    if ($examination){
                        $examination->status='finished';
                        $examination->update();
                    }
                    $order->update();
                    // Generate & send in chosen language
                    $isEnglish = (bool) ($order->document_in_english ?? false);
                    $pdf = $isEnglish
                        ? app(OrderPdfService::class)->generateAndStoreEn($order)
                        : app(OrderPdfService::class)->generateAndStore($order);
                    $pdfRecipient = $this->resolveEmailRecipient($order);
                    if ($isEnglish) {
                        Mail::to($pdfRecipient)->send(new \App\Mail\PdfOrderEn($order, $examination, $order->user));
                    } else {
                        Mail::to($pdfRecipient)->send(new PdfOrder($order, $examination, $order->user));
                    }
                    return redirect()->back()->with('success', 'PDF Sent Successfully...');
                }
            } elseif ($request->status == 'inspecting' || $request->status == 'processing') {
                $order->status = $request->status;
                $order->admin_status = $request->status === 'inspecting' ? 'Prüfung' : 'Prüfung';
                if ($order->email) {
                    try {
                        $examination=OrderExamination::where('order_id',$order->id)->first();
                        if ($examination){
                            $examination->status=$request->status;
                            $examination->update();
                        }
                        // Mail::to($order->user->email)->send(new ExaminationStatusMail($order,$examination,$order->user));
                    } catch (\Exception $e) {
                        Log::debug($e->getMessage());
                    }
                }
            } else {
//               dd($request->status);
                $order->status = $request->status;
                $order->admin_status = $order->admin_status ?: $request->status;
            }

            $order->update();


            return redirect()->back()->with('success', 'Booking status updated successfully...');
        }
    }

    public function newBookings()
    {
        $months = $this->monthOptions();
        $statuses = ['active', 'processing', 'inspecting', 'completed'];
        return view('admin.new-bookings', compact('months', 'statuses'));
    }

    public function fetchNewBookings(Request $request)
    {
        $bookings = NewBooking::query()
            ->where(function ($q) {
                $q->whereNotNull('checkout_session_id');
            })
            ->orderByDesc('created_at');

        $bookings = $bookings->when($request->date_range != '', function ($q) {
            $dates = explode('-', request('date_range'));
            if (count($dates) === 2) {
                $from = Carbon::parse(trim($dates[0]));
                $to = Carbon::parse(trim($dates[1]));
                return $q->whereBetween('created_at', [$from->startOfDay(), $to->endOfDay()]);
            }
            return $q;
        });

        return DataTables::eloquent($bookings)
            ->addColumn('customer', function (NewBooking $booking) {
                $name = trim(($booking->first_name ?? '') . ' ' . ($booking->last_name ?? ''));
                $name = $name !== '' ? e($name) : '–';
                $city = $booking->city ? '<span class="text-muted fs-8">' . e($booking->city) . '</span>' : '';
                return '<div class="d-flex flex-column"><span class="fw-semibold text-gray-800">' . $name . '</span>' . $city . '</div>';
            })
            ->addColumn('address', function (NewBooking $booking) {
                $lines = [];
                if ($booking->street || $booking->house_number) {
                    $lines[] = e(trim(($booking->street ?? '') . ' ' . ($booking->house_number ?? '')));
                }
                $cityLine = trim(($booking->postal_code ?? '') . ' ' . ($booking->city ?? ''));
                if ($cityLine !== '') {
                    $lines[] = e($cityLine);
                }
                if (empty($lines)) {
                    return '–';
                }
                return '<div class="d-flex flex-column text-gray-700 fs-7"><span>' . implode('</span><span>', $lines) . '</span></div>';
            })
            ->addColumn('license_info', function (NewBooking $booking) {
                $type = $booking->license_plate_type ? ucfirst(str_replace('_', ' ', $booking->license_plate_type)) : 'Nicht gesetzt';
                $html = '<div class="d-flex flex-column"><span class="fw-semibold text-gray-800">' . e($type) . '</span>';
                if ($booking->license_plate_type === 'desired' && $booking->desired_license_plate) {
                    $html .= '<span class="text-muted fs-8">' . e($booking->desired_license_plate);
                    if ($booking->reservation_pin) {
                        $html .= ' &middot; PIN ' . e($booking->reservation_pin);
                    }
                    $html .= '</span>';
                }
                $html .= '</div>';
                return $html;
            })
            ->addColumn('season_window', function (NewBooking $booking) {
                if (!$booking->is_seasonal) {
                    return '<span class="badge badge-light">Kein Saisonkennzeichen</span>';
                }
                $months = $this->monthOptions();
                $from = $months[$booking->season_from_month] ?? $booking->season_from_month;
                $to = $months[$booking->season_to_month] ?? $booking->season_to_month;
                return '<div class="d-flex flex-column"><span class="fw-semibold text-gray-800">' . e($from . ' – ' . $to) . '</span></div>';
            })
            ->addColumn('stripe_status', function (NewBooking $booking) {
                $status = $booking->checkout_status ?? 'offen';
                $label = match ($status) {
                    'paid' => 'Bezahlt',
                    'pending' => 'Ausstehend',
                    default => ucfirst($status),
                };
                $badgeClass = $status === 'paid' ? 'badge-success' : 'badge-warning';
                return '<span class="badge ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->editColumn('created_at', function (NewBooking $booking) {
                return $booking->created_at ? $booking->created_at->format('d.m.Y H:i') : '–';
            })
            ->addColumn('actions', function (NewBooking $booking) {
                return view('admin.new-bookings.partials.actions', compact('booking'))->render();
            })
            ->rawColumns(['customer', 'address', 'license_info', 'season_window', 'stripe_status', 'actions'])
            ->make(true);
    }

    public function showNewBooking(NewBooking $newBooking)
    {
        $months = $this->monthOptions();
        return view('admin.new-bookings.detail', ['order' => $newBooking, 'months' => $months]);
    }

    public function newBookingData(NewBooking $newBooking)
    {
        return response()->json([
            'nb_first_name' => $newBooking->first_name,
            'nb_last_name' => $newBooking->last_name,
            'nb_street' => $newBooking->street,
            'nb_house_number' => $newBooking->house_number,
            'nb_postal_code' => $newBooking->postal_code,
            'nb_city' => $newBooking->city,
            'nb_license_plate_type' => $newBooking->license_plate_type,
            'nb_desired_license_plate' => $newBooking->desired_license_plate,
            'nb_reservation_pin' => $newBooking->reservation_pin,
            'nb_special_plate' => $newBooking->special_plate,
            'nb_is_seasonal' => $newBooking->is_seasonal,
            'nb_season_from_month' => $newBooking->season_from_month,
            'nb_season_to_month' => $newBooking->season_to_month,
            'nb_checkout_status' => $newBooking->checkout_status,
            'status' => $newBooking->status,
        ]);
    }

    private function monthOptions(): array
    {
        return [
            '01' => 'Januar',
            '02' => 'Februar',
            '03' => 'März',
            '04' => 'April',
            '05' => 'Mai',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'August',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Dezember',
        ];
    }

    private function parseOptionalDate($value): ?Carbon
    {
        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }

        try {
            return Carbon::parse($value);
        } catch (Throwable $e) {
            return null;
        }
    }

    public function updateNewBooking(Request $request, NewBooking $newBooking)
    {
        $data = $request->validate([
            'nb_first_name' => ['required', 'string', 'max:255'],
            'nb_last_name' => ['required', 'string', 'max:255'],
            'nb_street' => ['required', 'string', 'max:255'],
            'nb_house_number' => ['required', 'string', 'max:30'],
            'nb_postal_code' => ['required', 'string', 'max:30'],
            'nb_city' => ['required', 'string', 'max:190'],
            'nb_license_plate_type' => ['required', 'in:desired,assigned'],
            'nb_desired_license_plate' => ['nullable', 'string', 'max:30'],
            'nb_reservation_pin' => ['nullable', 'string', 'max:50'],
            'nb_is_seasonal' => ['nullable', 'boolean'],
            'nb_season_from_month' => ['nullable', 'string', 'max:2'],
            'nb_season_to_month' => ['nullable', 'string', 'max:2'],
            'nb_special_plate' => ['nullable', 'string', 'max:255'],
            'nb_checkout_status' => ['nullable', 'string', 'max:50'],
            'status' => ['nullable', 'string', 'max:50'],
        ]);

        $newBooking->fill([
            'first_name' => $data['nb_first_name'],
            'last_name' => $data['nb_last_name'],
            'street' => $data['nb_street'],
            'house_number' => $data['nb_house_number'],
            'postal_code' => $data['nb_postal_code'],
            'city' => $data['nb_city'],
            'license_plate_type' => $data['nb_license_plate_type'],
            'desired_license_plate' => $data['nb_desired_license_plate'] ?? null,
            'reservation_pin' => $data['nb_reservation_pin'] ?? null,
            'special_plate' => $data['nb_special_plate'] ?? null,
            'checkout_status' => $data['nb_checkout_status'] ?? $newBooking->checkout_status,
            'status' => $data['status'] ?? $newBooking->status,
        ]);
        $newBooking->is_seasonal = $request->boolean('nb_is_seasonal');
        if ($newBooking->license_plate_type !== 'desired') {
            $newBooking->desired_license_plate = null;
            $newBooking->reservation_pin = null;
        }
        if (!$newBooking->is_seasonal) {
            $newBooking->season_from_month = null;
            $newBooking->season_to_month = null;
        } else {
            $newBooking->season_from_month = $data['nb_season_from_month'] ?? null;
            $newBooking->season_to_month = $data['nb_season_to_month'] ?? null;
        }
        $newBooking->save();

        return response()->json(['success' => true, 'message' => 'Neue Buchung aktualisiert.']);
    }

    public function deleteNewBooking(NewBooking $newBooking)
    {
        $newBooking->delete();
        return response()->json(['success' => true, 'message' => 'Neue Buchung gelöscht.']);
    }

    public function billing()
    {
        return view('admin.billing');
    }

    public function notifications()
    {
        $notifications = AdminNotification::orderByDesc('created_at')->limit(30)->get();
        return response()->json([
            'unread_count' => AdminNotification::whereNull('read_at')->count(),
            'notifications' => $notifications->map(fn($n) => [
                'id'         => $n->id,
                'type'       => $n->type,
                'title'      => $n->title,
                'message'    => $n->message,
                'link'       => $n->link,
                'read'       => $n->read_at !== null,
                'created_at' => $n->created_at->diffForHumans(),
            ]),
        ]);
    }

    public function markNotificationsRead()
    {
        AdminNotification::whereNull('read_at')->update(['read_at' => now()]);
        return response()->json(['success' => true]);
    }

    public function sendAppointmentReminder(int $orderId)
    {
        $order = \App\Models\Order::with('examiner')->findOrFail($orderId);

        // Determine recipient email — examiner User first, then accepted InspectorRequest
        $toEmail = null;
        $toName  = null;
        if ($order->examiner_id && $order->examiner) {
            $toEmail = $order->examiner->email;
            $toName  = $order->examiner_name ?: $order->examiner->name;
        } else {
            $accepted = \App\Models\InspectorRequest::where('order_id', $orderId)
                ->where('status', 'accepted')
                ->first();
            if ($accepted) {
                $toEmail = $accepted->external_email ?? optional($accepted->inspector)->email;
                $toName  = $accepted->external_email ?? optional($accepted->inspector)->name;
            }
        }

        if (!$toEmail) {
            return response()->json(['success' => false, 'message' => 'Kein Prüfer zugewiesen.'], 422);
        }

        $orderno  = $order->orderno ?? ('#' . $order->id);
        $vehicle  = trim(($order->brand ?? '') . ' ' . ($order->vehicle_make_model ?? '')) ?: '—';
        $location = trim($order->listing_seller_address ?? $order->postal_code . ' ' . $order->city) ?: '—';
        $seller   = trim($order->listing_seller_name ?? '') ?: '—';
        $phone    = trim($order->seller_phone ?? $order->phone ?? '') ?: '—';

        $confirmUrl = \Illuminate\Support\Facades\URL::signedRoute(
            'appointment.confirm.show', ['order' => $orderId], now()->addDays(7)
        );

        $subject = "Termin vereinbart? | Auftrag {$orderno}";
        $html = '<!DOCTYPE html><html lang="de"><head><meta charset="UTF-8"></head><body style="font-family:Arial,sans-serif;font-size:14px;color:#212529;line-height:1.7;">'
            . '<p>Sehr geehrte Damen und Herren,</p>'
            . '<p>konnten Sie bereits einen Termin für den folgenden Auftrag mit dem Verkäufer vereinbaren?</p>'
            . '<p><strong>Auftrags-Nr.:</strong> ' . e($orderno) . '<br>'
            . '<strong>Fahrzeug:</strong> ' . e($vehicle) . '<br>'
            . '<strong>Standort:</strong> ' . e($location) . '<br>'
            . '<strong>Verkäufer:</strong> ' . e($seller) . '<br>'
            . '<strong>Telefon:</strong> ' . e($phone) . '</p>'
            . '<p>Falls ja, bitten wir Sie, den Termin kurz über den nachfolgenden Button zu bestätigen.<br>Vielen Dank für Ihre Unterstützung!</p>'
            . '<p style="margin:24px 0;">'
            . '<a href="' . $confirmUrl . '" style="display:inline-block;background:#0d6efd;color:#fff;text-decoration:none;padding:12px 24px;border-radius:5px;font-weight:bold;">Termin bestätigen</a>'
            . '</p>'
            // . '<p style="font-size:12px;color:#6c757d;">Dieser Link ist 7 Tage gültig.</p>'
            . '<p>Mit freundlichen Grüßen<br>Carspector Support Team</p>'
            . '</body></html>';

        try {
            \Illuminate\Support\Facades\Mail::html($html, function ($m) use ($toEmail, $toName, $subject) {
                $m->to($toEmail, $toName)->cc('partner@carspector.de')->subject($subject);
            });
            return response()->json(['success' => true, 'message' => 'Erinnerung gesendet an ' . $toEmail]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Appointment reminder failed: ' . $e->getMessage(), ['order_id' => $orderId]);
            return response()->json(['success' => false, 'message' => 'E-Mail konnte nicht gesendet werden.'], 500);
        }
    }

    public function appointmentConfirmShow(\Illuminate\Http\Request $request, int $order)
    {
        if (!$request->hasValidSignature()) {
            abort(403, 'Dieser Link ist ungültig oder abgelaufen.');
        }
        $o = \App\Models\Order::findOrFail($order);
        return view('appointment.confirm', ['order' => $o]);
    }

    public function appointmentConfirmSave(\Illuminate\Http\Request $request, int $order)
    {
        if (!$request->hasValidSignature()) {
            abort(403, 'Dieser Link ist ungültig oder abgelaufen.');
        }
        $o = \App\Models\Order::findOrFail($order);
        $request->validate(['appointment_date' => 'required|date', 'appointment_time' => 'nullable|date_format:H:i']);

        $wasAlreadySet = !empty($o->appointment_date);
        $o->appointment_date = $request->appointment_date;
        $o->appointment_time = $request->appointment_time ?? null;
        $o->save();

        AdminNotification::notify(
            'appointment_confirmed',
            'Termin bestätigt',
            'Termin für Auftrag ' . ($o->orderno ?? '#' . $o->id) . ' wurde bestätigt: ' . \Carbon\Carbon::parse($request->appointment_date)->format('d.m.Y') . ($request->appointment_time ? ' ' . $request->appointment_time . ' Uhr' : ''),
            '/admin/bookings/' . $o->id,
            $o->id
        );

        // Only send to customer if this is the first time the date is being set
        $o->load('user');
        $recipient = !$wasAlreadySet ? ($o->email ?: ($o->user->email ?? null)) : null;
        if ($recipient) {
            try {
                Mail::to($recipient)->send(new AppointmentSetMail($o));
            } catch (\Throwable $e) {
                Log::warning('Appointment confirm email to customer failed', ['order_id' => $o->id, 'error' => $e->getMessage()]);
            }
        }

        // Also notify B2B partner if applicable (only on first set)
        if (!$wasAlreadySet && ($o->order_source ?? '') === 'b2b' && $o->b2b_partner_id) {
            try {
                $partner = B2bPartner::find($o->b2b_partner_id);
                if ($partner && $partner->email) {
                    Mail::to($partner->email)->send(new AppointmentSetMail($o));
                }
            } catch (\Throwable $e) {
                Log::warning('Appointment confirm email to B2B partner failed', ['order_id' => $o->id, 'error' => $e->getMessage()]);
            }
        }

        // PRG pattern — redirect to GET so browser refresh doesn't resubmit the form
        return redirect()->route('appointment.confirm.show', ['order' => $o->id] + request()->query());
    }

    public function fetchBillingBookings(Request $request)
    {
        $tab = $request->billing_tab ?? 'open_recent';
        $threeWeeksAgo = \Carbon\Carbon::now()->subWeeks(3);

        $query = \App\Models\Order::query()
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('users as examiners', 'orders.examiner_id', '=', 'examiners.id')
            ->select([
                'orders.id',
                'orders.orderno',
                'orders.created_at',
                'orders.updated_at',
                'orders.vehicle_make_model',
                'orders.customer_name',
                'orders.examiner_name',
                'orders.completed_at',
                'orders.paid_at',
                'orders.paid_at_status',
                'orders.admin_order_date',
                'orders.vehicle_type',
                'users.name as user_name',
                'users.email as user_email',
                'examiners.name as examiner_user_name',
                'examiners.email as examiner_user_email',
            ])
            ->whereIn('orders.admin_status', ['Completed', 'Abgeschlossen'])
            ->orderBy(\DB::raw('COALESCE(orders.completed_at, orders.created_at)'), 'desc');

        if ($tab === 'payed') {
            $query->whereNotNull('orders.paid_at')->whereNull('orders.paid_at_status');
        } elseif ($tab === 'open_recent') {
            $query->whereNull('orders.paid_at')->whereNull('orders.paid_at_status')
                  ->where(\DB::raw('COALESCE(orders.completed_at, orders.created_at)'), '>=', $threeWeeksAgo);
        } elseif ($tab === 'open_old') {
            $query->whereNull('orders.paid_at')->whereNull('orders.paid_at_status')
                  ->where(\DB::raw('COALESCE(orders.completed_at, orders.created_at)'), '<', $threeWeeksAgo);
        } elseif ($tab === 'error') {
            $query->where('orders.paid_at_status', 'error');
        } elseif ($tab === 'missing') {
            $query->where('orders.paid_at_status', 'missing');
        }

        return \Yajra\DataTables\Facades\DataTables::of($query)
            ->addColumn('datum_display', function ($row) {
                return $row->admin_order_date
                    ? \Carbon\Carbon::parse($row->admin_order_date)->format('d.m.Y')
                    : ($row->created_at ? $row->created_at->format('d.m.Y') : '');
            })
            ->addColumn('order_number_display', function ($row) {
                return $row->display_order_number;
            })
            ->addColumn('vehicle_display', function ($row) {
                //$parts = array_filter([$row->vehicle_type, $row->vehicle_make_model]);
                $parts = array_filter([$row->vehicle_make_model]);
                return e(implode(' – ', $parts));
            })
            ->addColumn('customer_display', function ($row) {
                $name = $row->customer_name ?: $row->user_name ?: $row->user_email ?? '–';
                return e($name);
            })
            ->addColumn('examiner_display', function ($row) {
    return '<div style="display:flex;flex-direction:column;line-height:1.2;">'
        . '<span style="font-size: 15px; font-weight:500;">'
        . e($row->examiner_name ?: $row->examiner_user_name ?: '–')
        . '</span>'
        . ($row->examiner_user_email
            ? '<small class="text-muted">' . e($row->examiner_user_email) . '</small>'
            : '')
        . '</div>';
})
            ->addColumn('completed_at_display', function ($row) {
                $date = $row->completed_at ?: $row->admin_order_date ?: null;
                return $date ? \Carbon\Carbon::parse($date)->format('d.m.Y') : '–';
            })
            ->addColumn('paid_at_display', function ($row) {
                if ($row->paid_at_status === 'error') {
                    return '<div class="d-flex align-items-center gap-1">'
                        . '<span class="badge badge-danger px-2 py-1">Error</span>'
                        . '<button class="btn btn-xs btn-outline-secondary js-billing-clear-status ml-1" data-id="' . $row->id . '" title="Zurücksetzen" style="font-size:11px;padding:1px 5px;">×</button>'
                        . '</div>';
                }
                if ($row->paid_at_status === 'missing') {
                    return '<div class="d-flex align-items-center gap-1">'
                        . '<span class="badge badge-warning px-2 py-1">Missing</span>'
                        . '<button class="btn btn-xs btn-outline-secondary js-billing-clear-status ml-1" data-id="' . $row->id . '" title="Zurücksetzen" style="font-size:11px;padding:1px 5px;">×</button>'
                        . '</div>';
                }
                $value = $row->paid_at ? \Carbon\Carbon::parse($row->paid_at)->format('Y-m-d') : '';
                return '<div class="d-flex align-items-center" style="min-width:210px;">'
                    . '<input type="date" class="form-control form-control-sm js-inline-booking-field mr-1" data-id="' . $row->id . '" data-field="paid_at" value="' . e($value) . '" style="width:125px;">'
                    . '<button class="btn btn-xs btn-outline-danger js-billing-set-status mr-1" data-id="' . $row->id . '" data-status="error" title="Error">E</button>'
                    . '<button class="btn btn-xs btn-outline-warning js-billing-set-status" data-id="' . $row->id . '" data-status="missing" title="Missing">M</button>'
                    . '</div>';
            })
            ->addColumn('actions', function ($row) {
                return '<a href="' . route('admin.bookings.show', $row->id) . '" class="btn btn-sm btn-light-primary px-3 py-1"><i class="fas fa-eye"></i></a>';
            })
            ->rawColumns(['paid_at_display', 'actions', 'examiner_display'])
            ->orderColumn('datum_display', 'orders.admin_order_date $1')
            ->make(true);
    }

    /** Upload vehicle listing PDF for documentation */
    public function uploadListingPdf(Request $request, int $orderId)
    {
        $order = Order::findOrFail($orderId);

        try {
            $validated = $request->validate([
                'listing_pdf' => 'required|file|mimes:pdf|max:10240',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Listing PDF validation failed', ['order_id' => $orderId, 'errors' => $e->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validation error: ' . collect($e->errors())->flatten()->first(),
                'errors' => $e->errors(),
            ], 422);
        }

        try {
            $file = $request->file('listing_pdf');
            if (!$file) {
                throw new \Exception('No file received');
            }

            $fileName = 'listing-' . $order->id . '-' . time() . '.pdf';
            $storagePath = $file->storeAs('listings', $fileName, 'public');

            if (!$storagePath) {
                throw new \Exception('File storage failed');
            }

            $order->update(['listing_pdf_path' => $storagePath]);

            return response()->json([
                'success' => true,
                'message' => 'Listing PDF uploaded successfully',
                'file_path' => $storagePath,
            ]);
        } catch (\Exception $e) {
            Log::error('Listing PDF upload failed', ['order_id' => $orderId, 'error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Upload error: ' . $e->getMessage(),
            ], 422);
        }
    }

    /** Delete the uploaded listing PDF */
    public function deleteListingPdf(Request $request, int $orderId)
    {
        $order = Order::findOrFail($orderId);

        try {
            if ($order->listing_pdf_path && Storage::disk('public')->exists($order->listing_pdf_path)) {
                Storage::disk('public')->delete($order->listing_pdf_path);
            }

            $order->update(['listing_pdf_path' => null]);

            return response()->json([
                'success' => true,
                'message' => 'Listing PDF deleted successfully',
            ]);
        } catch (\Exception $e) {
            Log::error('Listing PDF deletion failed', ['order_id' => $orderId, 'error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete PDF',
            ], 422);
        }
    }
}
