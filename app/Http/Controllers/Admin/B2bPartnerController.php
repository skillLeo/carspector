<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreB2bPartnerRequest;
use App\Http\Requests\Admin\UpdateB2bPartnerRequest;
use App\Mail\B2bOrderConfirmation;
use App\Mail\B2bOrderPlaced;
use App\Mail\B2bPartnerInvite;
use App\Models\B2bPartner;
use App\Models\B2bPartnerPrice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class B2bPartnerController extends Controller
{
    public function index()
    {
        $partners = B2bPartner::withCount('orders')->orderByDesc('created_at')->paginate(20);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(StoreB2bPartnerRequest $request)
    {
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partner-logos', 'public');
        }

        $token = Str::random(64);

        $partner = B2bPartner::create([
            'company_name'       => $request->company_name,
            'email'              => $request->email,
            'logo_path'          => $logoPath,
            'status'             => 'pending',
            'registration_token' => $token,
            'token_expires_at'   => now()->addHours((int) env('B2B_INVITE_TOKEN_HOURS', 48)),
            'created_by'         => auth()->id(),
        ]);

        Mail::to($partner->email)->send(new B2bPartnerInvite($partner));

        $partner->update(['email_sent_at' => now()]);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner added and invitation email sent successfully.');
    }

    public function show($id)
    {
        $partner      = B2bPartner::withCount('orders')->with('prices')->findOrFail($id);
        $orders       = $partner->orders()->orderByDesc('created_at')->limit(10)->get();
        $serviceTypes = ['Check XL', 'Check XXL'];

        $monthlyStats = $partner->orders()
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total, SUM(status = "completed") as completed')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at) DESC, MONTH(created_at) DESC')
            ->limit(12)
            ->get();

        return view('admin.partners.show', compact('partner', 'orders', 'serviceTypes', 'monthlyStats'));
    }

    public function edit($id)
    {
        $partner      = B2bPartner::with('prices')->findOrFail($id);
        $serviceTypes = ['Check XL', 'Check XXL'];
        return view('admin.partners.edit', compact('partner', 'serviceTypes'));
    }

    public function update(UpdateB2bPartnerRequest $request, $id)
    {
        $partner = B2bPartner::findOrFail($id);

        $logoPath = $partner->logo_path;
        if ($request->hasFile('logo')) {
            if ($logoPath) {
                Storage::disk('public')->delete($logoPath);
            }
            $logoPath = $request->file('logo')->store('partner-logos', 'public');
        }

        $partner->update([
            'company_name' => $request->company_name,
            'logo_path'    => $logoPath,
        ]);

        // Save prices
        if ($request->has('prices')) {
            foreach ($request->prices as $serviceType => $price) {
                if ($price !== null && $price !== '') {
                    B2bPartnerPrice::updateOrCreate(
                        ['b2b_partner_id' => $partner->id, 'service_type' => $serviceType],
                        ['price' => (float) $price]
                    );
                } else {
                    B2bPartnerPrice::where('b2b_partner_id', $partner->id)
                        ->where('service_type', $serviceType)
                        ->delete();
                }
            }
        }

        return redirect()->route('admin.partners.show', $partner->id)
            ->with('success', 'Partner updated successfully.');
    }

    public function exportOrders($id)
    {
        $partner = B2bPartner::findOrFail($id);
        $orders  = $partner->orders()->orderByDesc('created_at')->get();

        $filename = 'orders-' . \Illuminate\Support\Str::slug($partner->company_name) . '-' . date('Y-m-d') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($orders, $partner) {
            $fh = fopen('php://output', 'w');
            fputcsv($fh, ['Date', 'Order ID', 'Vehicle', 'VIN', 'Inspection Type', 'Country', 'Price (€)', 'Status', 'Cancel Requested']);
            foreach ($orders as $o) {
                $isGermany = strtolower(trim($o->b2b_vehicle_country ?? '')) === 'germany';
                if (!$isGermany) {
                    $price = 'FILL';
                } else {
                    $basePrice = $partner->priceFor($o->desc);
                    if ($basePrice !== null) {
                        $price = $o->soh_check ? $basePrice + 59 : $basePrice;
                    } else {
                        $price = '';
                    }
                }
                fputcsv($fh, [
                    $o->created_at->format('d.m.Y'),
                    $o->orderno ?? $o->id,
                    $o->vehicle_make_model ?? '',
                    $o->brand ?? '',
                    ($o->desc ?? '') . ($o->soh_check ? ' + SoH' : ''),
                    $o->b2b_vehicle_country ?? '',
                    $price,
                    $o->status ?? '',
                    $o->b2b_cancel_requested ? 'Yes' : 'No',
                ]);
            }
            fclose($fh);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function storeOrderForPartner(Request $request, $id)
    {
        $partner = B2bPartner::findOrFail($id);

        $data = $request->validate([
            'vehicle_make_model' => ['required', 'string', 'max:200'],
            'make_year'          => ['nullable', 'string', 'max:10'],
            'mileage'            => ['nullable', 'string', 'max:20'],
            'vin_number'         => ['nullable', 'string', 'max:50'],
            'vehicle_location'   => ['required', 'string', 'max:500'],
            'vehicle_country'    => ['required', 'string', 'max:100'],
            'contact_person'     => ['required', 'string', 'max:100'],
            'contact_phone'      => ['required', 'string', 'max:30'],
            'inspection_type'    => ['required', 'in:Check XL,Check XXL'],
            'soh_check'          => ['nullable', 'boolean'],
            'special_notes'      => ['nullable', 'string', 'max:1000'],
            'send_team_email'    => ['nullable', 'boolean'],
        ]);

        $vehicleTypeMap = ['Check XL' => 'Auto/ PKW XL', 'Check XXL' => 'Auto/ PKW XXL'];
        $isGermany = strtolower(trim($data['vehicle_country'])) === 'germany';

        $order = Order::create([
            'b2b_partner_id'       => $partner->id,
            'order_source'         => 'b2b',
            'order_type'           => 'B2B',
            'b2b_logo_path'        => $partner->logo_path,
            'vehicle_make_model'   => $data['vehicle_make_model'],
            'make_year'            => $data['make_year'] ?? null,
            'mileage'              => $data['mileage'] ?? null,
            'brand'                => $data['vin_number'] ?? null,
            'inspection_address'   => $data['vehicle_location'],
            'b2b_vehicle_location' => $data['vehicle_location'],
            'b2b_vehicle_country'  => $data['vehicle_country'],
            'b2b_contact_person'   => $data['contact_person'],
            'b2b_contact_phone'    => $data['contact_phone'],
            'phone'                => $data['contact_phone'],
            'b2b_special_notes'    => $data['special_notes'] ?? null,
            'desc'                 => $data['inspection_type'],
            'vehicle_type'         => $vehicleTypeMap[$data['inspection_type']] ?? 'Auto/ PKW XL',
            'soh_check'            => !empty($data['soh_check']) && $isGermany,
            'document_in_english'  => 1,
            'status'               => 'active',
            'admin_status'         => $isGermany ? 'Zuweisung' : 'New',
            'examiner_name'        => 'TÜV',
        ]);

        if ($isGermany && !empty($data['send_team_email'])) {
            try {
                // Mail::send(new B2bOrderPlaced($order, $partner));
                $order->update(['b2b_order_email_sent_at' => now()]);
            } catch (\Throwable $e) {
                Log::error('Admin B2B order team email failed', ['order_id' => $order->id]);
            }
        }

        try {
            Mail::to($partner->email)->send(new B2bOrderConfirmation($order, $partner));
        } catch (\Throwable $e) {
            Log::error('Admin B2B order confirmation email failed', ['order_id' => $order->id]);
        }

        return redirect()->route('admin.partners.show', $partner->id)
            ->with('success', 'Order created successfully for ' . $partner->company_name . '.');
    }

    public function resendInvite($id)
    {
        $partner = B2bPartner::findOrFail($id);

        if ($partner->status === 'active') {
            return back()->with('error', 'This partner has already registered. Cannot resend invite.');
        }

        $token = Str::random(64);
        $partner->update([
            'registration_token' => $token,
            'token_expires_at'   => now()->addHours((int) env('B2B_INVITE_TOKEN_HOURS', 48)),
            'status'             => 'pending',
        ]);

        Mail::to($partner->email)->send(new B2bPartnerInvite($partner));

        $partner->update(['email_sent_at' => now()]);

        return back()->with('success', 'Invite resent successfully.');
    }

    public function toggleStatus($id)
    {
        $partner = B2bPartner::findOrFail($id);

        if ($partner->status === 'active') {
            $partner->update(['status' => 'inactive']);
            $message = "Partner \"{$partner->company_name}\" has been deactivated.";
        } else {
            $partner->update(['status' => 'active']);
            $message = "Partner \"{$partner->company_name}\" has been activated.";
        }

        return back()->with('success', $message);
    }
}
