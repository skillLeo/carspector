<?php

namespace App\Http\Controllers;

use App\Http\Requests\B2bStoreOrderRequest;
use App\Mail\B2bOrderConfirmation;
use App\Mail\B2bOrderPlaced;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class B2bPortalController extends Controller
{
    private function partner()
    {
        return auth()->guard('b2b')->user();
    }

    public function dashboard()
    {
        $partner = $this->partner();

        $totalOrders     = Order::where('b2b_partner_id', $partner->id)->count();
        $inProgressCount = Order::where('b2b_partner_id', $partner->id)
            ->whereNotIn('status', ['completed', 'inactive'])
            ->where(function ($q) {
                $q->whereNull('admin_status')->orWhere('admin_status', '!=', 'Storniert');
            })
            ->count();
        $completedCount  = Order::where('b2b_partner_id', $partner->id)
            ->where('status', 'completed')
            ->count();
        $recentOrders    = Order::where('b2b_partner_id', $partner->id)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('b2b.portal.dashboard', compact(
            'partner', 'totalOrders', 'inProgressCount', 'completedCount', 'recentOrders'
        ));
    }

    public function orders(Request $request)
    {
        $partner = $this->partner();
        $query   = Order::where('b2b_partner_id', $partner->id)->orderByDesc('created_at');

        $status = $request->get('status', 'active');

        $status = $request->get('status', 'active');

        if ($status === 'active') {
            $query->where('status', '!=', 'completed')
                ->where(function ($q) {
                    $q->whereNull('admin_status')
                        ->orWhere('admin_status', '!=', 'Storniert');
                });

        } elseif ($status === 'cancelled') {
            $query->where('admin_status', 'Storniert');

        } elseif ($status === 'completed') {
            $query->where('status', 'completed');
        }

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(function ($sub) use ($q) {
                $sub->where('orderno', 'like', "%{$q}%")
                    ->orWhere('vehicle_make_model', 'like', "%{$q}%")
                    ->orWhere('brand', 'like', "%{$q}%")
                    ->orWhere('b2b_vehicle_location', 'like', "%{$q}%");
            });
        }

        $orders = $query->paginate(15)->appends($request->only('status', 'search'));

        return view('b2b.portal.orders', compact('partner', 'orders'));
    }

    public function createOrder()
    {
        $partner = $this->partner();
        return view('b2b.portal.create-order', compact('partner'));
    }

    public function storeOrder(B2bStoreOrderRequest $request)
    {
        $partner = $this->partner();

        // Double-check partner is still active (defence in depth beyond middleware)
        if (!$partner->isActive()) {
            abort(403, 'Your account is not active.');
        }

        // Map inspection type to vehicle_type used in admin
        $vehicleTypeMap = [
            'Check XL'  => 'Auto/ PKW XL',
            'Check XXL' => 'Auto/ PKW XXL',
        ];
        $vehicleType = $vehicleTypeMap[$request->inspection_type] ?? 'Auto/ PKW XL';

        $isGermany = strtolower(trim($request->vehicle_country ?? '')) === 'germany';

        $order = Order::create([
            'user_id'              => null,
            'b2b_partner_id'       => $partner->id,
            'order_source'         => 'b2b',
            'order_type'           => 'B2B',
            'b2b_logo_path'        => $partner->logo_path,
            'vehicle_make_model'   => $request->vehicle_make_model,
            'make_year'            => $request->make_year ?: null,
            'mileage'              => $request->mileage ?: null,
            'brand'                => $request->vin_number ?: null,
            'advertisement_link'   => $request->listing_link ?: null,
            'inspection_address'   => $request->vehicle_location,
            'b2b_vehicle_location' => $request->vehicle_location,
            'b2b_vehicle_country'  => $request->vehicle_country,
            'b2b_contact_person'   => $request->contact_person,
            'b2b_contact_phone'    => $request->contact_phone,
            'phone'                => $request->contact_phone,
            'b2b_special_notes'    => $request->special_notes,
            'desc'                 => $request->inspection_type,
            'vehicle_type'         => $vehicleType,
            'soh_check'            => (bool) $request->soh_check && $isGermany,
            'document_in_english'  => 1,
            'status'               => 'active',
            'admin_status'         => 'New',
            // 'admin_status'         => $isGermany ? 'Zuweisung' : 'New',
            // 'examiner_name'        => 'TÜV',
        ]);

        // Send email to inspection team only for Germany orders
        if ($isGermany) {
            try {
                // Mail::send(new B2bOrderPlaced($order, $partner));
                $log = 'Email sent to ' . env('INSPECTION_PARTNER_EMAIL') . ' at ' . now()->toDateTimeString();
                $order->update([
                    'b2b_order_email_sent_at' => now(),
                    'b2b_order_email_log'     => $log,
                ]);
            } catch (\Throwable $e) {
                Log::error('B2B order email failed', ['order_id' => $order->id, 'error' => $e->getMessage()]);
            }
        }

        // Send short confirmation email to the partner
        try {
            Mail::to($partner->email)->send(new B2bOrderConfirmation($order, $partner));
        } catch (\Throwable $e) {
            Log::error('B2B order confirmation email failed', ['order_id' => $order->id, 'error' => $e->getMessage()]);
        }

        return redirect()->route('b2b.orders.show', $order->id)
            ->with('success', 'Order placed successfully! Our team has been notified and will be in touch.');
    }

    public function showOrder($id)
    {
        $partner = $this->partner();

        $order = Order::where('id', $id)
            ->where('b2b_partner_id', $partner->id)
            ->firstOrFail();

        return view('b2b.portal.order-detail', compact('partner', 'order'));
    }

    public function cancelOrder($id)
    {
        $partner = $this->partner();

        $order = Order::where('id', $id)
            ->where('b2b_partner_id', $partner->id)
            ->firstOrFail();

        if ($order->status === 'completed' || $order->b2b_cancel_requested) {
            return back()->with('error', 'This order cannot be cancelled.');
        }

        $order->update(['b2b_cancel_requested' => true]);

        // Notify admin
        try {
            \Illuminate\Support\Facades\Mail::raw(
                "Cancellation requested for order {$order->orderno} (#{$order->id}) by partner: {$partner->company_name} ({$partner->email}).\n\nVehicle: {$order->vehicle_make_model}\nLocation: {$order->b2b_vehicle_location}",
                function ($m) use ($order, $partner) {
                    $m->to('info@carspector.de')
                      ->subject("B2B Cancel Request — Order {$order->orderno}");
                }
            );
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Cancel notification failed', ['order' => $order->id]);
        }

        return back()->with('success', 'Cancellation request submitted. Our team will review and contact you.');
    }
}
