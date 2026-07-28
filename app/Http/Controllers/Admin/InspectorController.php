<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InspectorInviteMail;
use App\Mail\InspectorRequestMail;
use App\Models\AdminNotification;
use App\Models\Inspector;
use App\Models\InspectorRequest;
use App\Models\InspectorServiceArea;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InspectorController extends Controller
{
    public function index()
    {
        $inspectors = Inspector::where('is_external', false)
            ->withCount('serviceAreas', 'requests')
            ->orderByDesc('created_at')
            ->get();
        return view('admin.inspectors.index', compact('inspectors'));
    }

    public function show(int $id)
    {
        $inspector = Inspector::with('serviceAreas', 'requests.order')->findOrFail($id);
        return view('admin.inspectors.show', compact('inspector'));
    }

    public function createManual(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $email     = trim($request->email);
        $token     = Str::random(48);
        $existing  = Inspector::where('email', $email)->first();

        // If an external placeholder exists for this email, convert it to a proper inspector
        if ($existing) {
            if (!$existing->is_external) {
                return back()->withErrors(['email' => 'Diese E-Mail-Adresse ist bereits registriert.'])->withInput();
            }
            $existing->update([
                'name'               => trim($request->name),
                'status'             => 'pending',
                'is_external'        => false,
                'invitation_token'   => $token,
                'token_expires_at'   => now()->addHours(72),
                'invitation_sent_at' => now(),
                'created_by'         => auth()->id(),
            ]);
            $inspector = $existing;
        } else {
            $inspector = Inspector::create([
                'name'               => trim($request->name),
                'email'              => $email,
                'status'             => 'pending',
                'invitation_token'   => $token,
                'token_expires_at'   => now()->addHours(72),
                'invitation_sent_at' => now(),
                'created_by'         => auth()->id(),
            ]);
        }

        try {
            Mail::to($inspector->email)->send(new InspectorInviteMail($inspector));
            return redirect()->route('admin.inspectors.show', $inspector->id)
                ->with('success', "Inspektor angelegt und Einladung gesendet an {$inspector->email}.");
        } catch (\Exception $e) {
            Log::error('Inspector invite mail failed: ' . $e->getMessage(), ['inspector_id' => $inspector->id]);
            return redirect()->route('admin.inspectors.show', $inspector->id)
                ->with('error', 'Inspektor angelegt, aber die E-Mail konnte nicht gesendet werden.');
        }
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $file    = $request->file('csv_file');
        $handle  = fopen($file->getRealPath(), 'r');
        $created = 0;
        $skipped = 0;
        $row     = 0;

        while (($line = fgetcsv($handle, 1000, ',')) !== false) {
            $row++;
            if ($row === 1 && (strtolower(trim($line[0] ?? '')) === 'name' || strtolower(trim($line[0] ?? '')) === 'vorname')) {
                continue; // skip header
            }

            $name  = trim($line[0] ?? '');
            $email = trim($line[1] ?? '');

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $skipped++;
                continue;
            }
            if (empty($name)) {
                $skipped++;
                continue;
            }

            $existing = Inspector::where('email', $email)->first();
            if ($existing && !$existing->is_external) {
                $skipped++;
                continue;
            }

            $token = Str::random(48);

            if ($existing && $existing->is_external) {
                $existing->update([
                    'name'               => $name,
                    'status'             => 'pending',
                    'is_external'        => false,
                    'invitation_token'   => $token,
                    'token_expires_at'   => now()->addHours(72),
                    'invitation_sent_at' => now(),
                    'created_by'         => auth()->id(),
                ]);
                $inspector = $existing;
            } else {
                $inspector = Inspector::create([
                    'name'               => $name,
                    'email'              => $email,
                    'status'             => 'pending',
                    'invitation_token'   => $token,
                    'token_expires_at'   => now()->addHours(72),
                    'invitation_sent_at' => now(),
                    'created_by'         => auth()->id(),
                ]);
            }

            try {
                Mail::to($inspector->email)->send(new InspectorInviteMail($inspector));
            } catch (\Exception $e) {
                Log::error('Inspector invite mail failed: ' . $e->getMessage(), ['inspector_id' => $inspector->id]);
            }

            $created++;
        }

        fclose($handle);

        return redirect()->route('admin.inspectors.index')
            ->with('success', "Import complete: {$created} inspector(s) created, {$skipped} skipped.");
    }

    public function resendInvite(int $id)
    {
        $inspector = Inspector::findOrFail($id);

        $token = Str::random(48);
        $inspector->update([
            'invitation_token'   => $token,
            'token_expires_at'   => now()->addHours(72),
            'invitation_sent_at' => now(),
        ]);

        try {
            Mail::to($inspector->email)->send(new InspectorInviteMail($inspector));
            return back()->with('success', 'Invitation resent to ' . $inspector->email);
        } catch (\Exception $e) {
            Log::error('Inspector invite resend failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send invitation email.');
        }
    }

    public function toggleStatus(int $id)
    {
        $inspector = Inspector::findOrFail($id);
        $inspector->update([
            'status' => $inspector->status === 'active' ? 'inactive' : 'active',
        ]);
        return back()->with('success', 'Inspector status updated.');
    }

    public function destroy(int $id)
    {
        $inspector = Inspector::findOrFail($id);
        $inspector->serviceAreas()->delete();
        InspectorRequest::where('inspector_id', $inspector->id)->delete();
        $inspector->delete();
        return back()->with('success', 'Inspector permanently deleted.');
    }

    public function serviceAreas(int $id)
    {
        $inspector = Inspector::with('serviceAreas')->findOrFail($id);
        return view('admin.inspectors.service-areas', compact('inspector'));
    }

    public function addServiceArea(Request $request, int $id)
    {
        $inspector = Inspector::findOrFail($id);
        $type = $request->input('type');

        if ($type === 'city') {
            $request->validate(['city_name' => 'required|string|max:100']);
            InspectorServiceArea::create([
                'inspector_id' => $inspector->id,
                'type'         => 'city',
                'city_name'    => trim($request->city_name),
            ]);
        } elseif ($type === 'postal_range') {
            $request->validate([
                'postal_min' => 'required|string|max:10',
                'postal_max' => 'required|string|max:10',
            ]);
            InspectorServiceArea::create([
                'inspector_id' => $inspector->id,
                'type'         => 'postal_range',
                'postal_min'   => trim($request->postal_min),
                'postal_max'   => trim($request->postal_max),
            ]);
        } else {
            return back()->with('error', 'Invalid area type.');
        }

        return back()->with('success', 'Service area added.');
    }

    public function deleteServiceArea(int $areaId)
    {
        $area = InspectorServiceArea::findOrFail($areaId);
        $area->delete();
        return back()->with('success', 'Service area removed.');
    }

    /** Build request email preview for an order (AJAX / modal load). */
    public function requestPreview(int $orderId)
    {
        $order = Order::with('examination')->findOrFail($orderId);

        // All existing requests for this order
        $existingRequests = InspectorRequest::where('order_id', $orderId)->get();
        $existingStatuses = $existingRequests->whereNotNull('inspector_id')->pluck('status', 'inspector_id')->toArray();
        $existingAutoAssign = $existingRequests->whereNotNull('inspector_id')->pluck('mark_for_auto_assign', 'inspector_id')->toArray();

        // Load active and pending inspectors (for matching + dropdown)
        $activeInspectors = Inspector::whereIn('status', ['active', 'pending'])
            ->with('serviceAreas')
            ->get();

        // Also load any non-active inspectors who already have a request for this order
        // so they still show in the status panel even if deactivated
        $requestedInspectorIds = array_keys($existingStatuses);
        $extraInspectors = Inspector::whereIn('id', $requestedInspectorIds)
            ->whereNotIn('id', $activeInspectors->pluck('id')->toArray())
            ->get();
        $allInspectorsForStatus = $activeInspectors->merge($extraInspectors);

        $matched = $activeInspectors
            ->filter(fn($i) => $i->coversLocation($order->city, $order->postal_code))
            ->values();

        $emailBody = $this->buildRequestEmailBody($order);

        // External (non-DB) requests
        $externalRequests = $existingRequests->whereNull('inspector_id')->whereNotNull('external_email')->values()->map(fn($r) => [
            'id'     => null,
            'name'   => null,
            'email'  => $r->external_email,
            'status' => $r->status,
            'mark_for_auto_assign' => $r->mark_for_auto_assign ?? false,
        ]);

        $toRow = fn($i) => [
            'id'     => $i->id,
            'name'   => $i->name,
            'email'  => $i->email,
            'status' => $existingStatuses[$i->id] ?? null,
            'mark_for_auto_assign' => $existingAutoAssign[$i->id] ?? false,
        ];

        return response()->json([
            'matched_inspectors' => $matched->map($toRow)->values(),
            'all_inspectors'     => $allInspectorsForStatus->map($toRow)->values(),
            'external_requests'  => $externalRequests,
            'email_body'         => $emailBody,
        ]);
    }

    /** Render a short preview of the assignment email for an order. */
    public function assignmentPreview(Request $request, int $orderId)
    {
        $order = Order::findOrFail($orderId);

        $inspector = null;
        if ($request->filled('inspector_id')) {
            $inspector = Inspector::find($request->input('inspector_id'));
        }
        if (!$inspector && $request->filled('external_email')) {
            $inspector = Inspector::where('email', $request->input('external_email'))->first();
        }
        if (!$inspector) {
            $inspector = new Inspector([
                'name'  => $request->input('external_email', 'Inspektor'),
                'email' => $request->input('external_email', ''),
            ]);
        }

        $appointmentUrl = \Illuminate\Support\Facades\URL::signedRoute(
            'appointment.confirm.show', ['order' => $order->id], now()->addDays(7)
        );

        $html = view('emails.inspector.assignment', [
            'order'        => $order,
            'inspector'    => $inspector,
            'directLink'   => '#',
            'examStartUrl' => '#',
            'appointmentUrl' => $appointmentUrl,
        ])->render();

        return response()->json([
            'subject' => 'Auftragsbestätigung — Auftrag ' . ($order->orderno ?? ('#' . $order->id)),
            'html'    => $html,
        ]);
    }

    /** Assign an inspector to an order and send assignment email. */
    public function assignInspector(Request $request, int $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($request->filled('external_email')) {
            $email = trim($request->input('external_email'));

            // Find or create a permanent Inspector record for this external email (marked external)
            $inspector = Inspector::where('email', $email)->first();
            if (!$inspector) {
                $inspector = Inspector::create([
                    'name'        => $email,
                    'email'       => $email,
                    'status'      => 'active',
                    'is_external' => true,
                ]);
            }

            // Link the existing external request to this inspector
            InspectorRequest::where('order_id', $orderId)
                ->whereNull('inspector_id')
                ->where('external_email', $email)
                ->update(['inspector_id' => $inspector->id]);
        } else {
            $inspector = Inspector::findOrFail($request->input('inspector_id'));
        }

        // Find or create a User account for this inspector so exam portal works
        $user = \App\Models\User::where('email', $inspector->email)->first();
        if (!$user) {
            $user = \App\Models\User::create([
                'name'     => $inspector->name,
                'email'    => $inspector->email,
                'password' => bcrypt(\Illuminate\Support\Str::random(32)),
                'type'     => 'examiner',
            ]);
        }

        // Save mark_for_auto_assign flag to the request
        $markAuto = $request->boolean('mark_for_auto_assign', false);

        // Find or update the inspector request - mark as accepted and save auto-assign flag
        $ireq = InspectorRequest::where('order_id', $orderId)
            ->where('inspector_id', $inspector->id)
            ->first();

        if ($ireq) {
            $ireq->update(['status' => 'accepted', 'responded_at' => now(), 'mark_for_auto_assign' => $markAuto]);
        } else {
            // Create request if it doesn't exist
            InspectorRequest::create([
                'order_id' => $orderId,
                'inspector_id' => $inspector->id,
                'status' => 'accepted',
                'responded_at' => now(),
                'mark_for_auto_assign' => $markAuto,
                'sent_at' => now(),
                'response_token' => \Illuminate\Support\Str::random(48),
            ]);
        }

        // Set examiner on order for display purposes
        $order->update([
            'examiner_id'   => $user->id,
            'examiner_name' => $inspector->name,
            'admin_status'  => 'Pruefung',
            'status'        => 'inspecting',
        ]);

        // Signed URL: detailed order view (portal/email fallback)
        $directLink = \Illuminate\Support\Facades\URL::temporarySignedRoute(
            'inspector.order.direct',
            now()->addDays(30),
            ['orderId' => $order->id, 'inspectorId' => $inspector->id]
        );

        // Signed URL: starts exam directly without login
        $examStartUrl = \Illuminate\Support\Facades\URL::temporarySignedRoute(
            'inspector.start.exam',
            now()->addDays(30),
            ['orderId' => $order->id, 'inspectorId' => $inspector->id]
        );

        $appointmentUrl = \Illuminate\Support\Facades\URL::signedRoute(
            'appointment.confirm.show', ['order' => $order->id], now()->addDays(7)
        );

        try {
            // Send assignment email with appointment confirmation
            Mail::to($inspector->email)->send(new \App\Mail\InspectorAssignmentMail($inspector, $order, $directLink, $examStartUrl, $appointmentUrl));

            // Send separate exam start link email
            Mail::to($inspector->email)->send(new \App\Mail\InspectorExamStartMail($inspector, $order, $examStartUrl));
        } catch (\Exception $e) {
            Log::error('Inspector assignment mail failed: ' . $e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Inspector assigned and notified.']);
    }

    /** Send the inspector request emails and create portal notifications. */
    public function sendRequest(Request $request, int $orderId)
    {
        $order = Order::findOrFail($orderId);

        $request->validate([
            'inspector_ids'   => 'nullable|array',
            'inspector_ids.*' => 'integer|exists:inspectors,id',
            'extra_emails'    => 'nullable|array',
            'extra_emails.*'  => 'email',
            'email_body'      => 'required|string|max:5000',
            'auto_assign_map' => 'nullable|array',
        ]);

        $inspectorIds = $request->input('inspector_ids', []);
        $extraEmails  = $request->input('extra_emails', []);
        $emailBody    = $request->input('email_body');
        $autoAssignMap = $request->input('auto_assign_map', []);

        if (empty($inspectorIds) && empty($extraEmails)) {
            return response()->json(['success' => false, 'message' => 'Bitte mindestens einen Empfänger angeben.'], 422);
        }

        $sent = 0;

        foreach ($inspectorIds as $inspectorId) {
            $inspector = Inspector::find($inspectorId);
            if (!$inspector) continue;

            // Generate a unique token for email accept/decline
            $token = \Illuminate\Support\Str::random(48);
            $markAuto = isset($autoAssignMap[$inspectorId]) && $autoAssignMap[$inspectorId];

            // Create or update the portal request record
            $ireq = InspectorRequest::updateOrCreate(
                ['order_id' => $order->id, 'inspector_id' => $inspector->id],
                [
                    'status'         => 'pending',
                    'email_body'     => $emailBody,
                    'sent_at'        => now(),
                    'response_token' => $token,
                    'reminder_sent_at' => null,
                    'mark_for_auto_assign' => $markAuto,
                ]
            );

            // Send email
            try {
                Mail::to($inspector->email)->send(new InspectorRequestMail($inspector, $order, $emailBody, $ireq->response_token));
                $sent++;
            } catch (\Exception $e) {
                Log::error('Inspector request mail failed: ' . $e->getMessage(), [
                    'inspector_id' => $inspector->id,
                    'order_id'     => $order->id,
                ]);
            }
        }

        // Send to extra (non-DB) email addresses
        foreach ($extraEmails as $email) {
            // If the email matches an existing inspector, use the DB path instead
            $matched = Inspector::where('email', $email)->first();
            if ($matched) {
                if (!in_array($matched->id, $inspectorIds)) {
                    $token = \Illuminate\Support\Str::random(48);
                    $markAuto = isset($autoAssignMap[$matched->id]) && $autoAssignMap[$matched->id];
                    $ireq  = InspectorRequest::updateOrCreate(
                        ['order_id' => $order->id, 'inspector_id' => $matched->id],
                        ['status' => 'pending', 'email_body' => $emailBody, 'sent_at' => now(), 'response_token' => $token, 'reminder_sent_at' => null, 'mark_for_auto_assign' => $markAuto]
                    );
                    try {
                        Mail::to($matched->email)->send(new InspectorRequestMail($matched, $order, $emailBody, $ireq->response_token));
                        $sent++;
                    } catch (\Exception $e) {
                        Log::error('Inspector request mail (matched) failed: ' . $e->getMessage());
                    }
                }
                continue;
            }

            // External email — create a tokenised request record with no inspector_id
            $token = \Illuminate\Support\Str::random(48);
            $markAuto = isset($autoAssignMap[$email]) && $autoAssignMap[$email];
            $ireq  = InspectorRequest::updateOrCreate(
                ['order_id' => $order->id, 'external_email' => $email, 'inspector_id' => null],
                ['status' => 'pending', 'email_body' => $emailBody, 'sent_at' => now(), 'response_token' => $token, 'reminder_sent_at' => null, 'mark_for_auto_assign' => $markAuto]
            );
            try {
                Mail::to($email)->send(new InspectorRequestMail(null, $order, $emailBody, $ireq->response_token));
                $sent++;
            } catch (\Exception $e) {
                Log::error('Inspector request mail (external) failed: ' . $e->getMessage(), [
                    'email'    => $email,
                    'order_id' => $order->id,
                ]);
            }
        }

        // Update order status to "Zuweisung" after sending inspector requests
        if ($sent > 0) {
            $order->update(['admin_status' => 'Zuweisung']);
        }

        return response()->json([
            'success' => true,
            'message' => "Request sent to {$sent} inspector(s).",
        ]);
    }

    private function buildRequestEmailBody(Order $order): string
    {
        // If brand is a 17-char VIN (B2B orders), use only vehicle_make_model as the vehicle name
        $brandIsVin = !empty($order->brand) && preg_match('/^[A-HJ-NPR-Z0-9]{17}$/i', trim($order->brand));
        $vehicle = $brandIsVin
            ? trim($order->vehicle_make_model ?? '')
            : trim(($order->brand ?? '') . ' ' . ($order->vehicle_make_model ?? ''));

        // Prefer the full seller/listing address (admin-edited), fall back to postal+city, then street
        if (!empty(trim($order->listing_seller_address ?? ''))) {
            $location = trim($order->listing_seller_address);
            $city = trim(($order->postal_code ?? '') . ' ' . ($order->city ?? ''));
            if ($city) {
                $location = $location . ', ' . $city;
            }
        } else {
            $location = trim(($order->postal_code ?? '') . ' ' . ($order->city ?? ''));
            if (!$location) {
                $location = trim($order->inspection_address ?? $order->street ?? '');
            }
        }
        $orderno      = $order->orderno ?? ('#' . $order->id);
        $compensation = $order->price
            ? number_format(max(0, (float)$order->price - ($order->commission ?? 20)), 0, ',', '.') . ',- Euro netto (zzgl. 0,25 €/km für die Fahrtstrecke)'
            : '—';
        $appointment  = $order->appointment_date
            ? \Carbon\Carbon::parse($order->appointment_date)->format('d.m.Y')
            : 'Flexibel';

        $sellerName  = trim($order->listing_seller_name ?? $order->b2b_contact_person ?? '');
        $sellerPhone = trim($order->seller_phone ?? $order->b2b_contact_phone ?? '');

        return "Sehr geehrte Damen und Herren,\n\n"
            . "wir sind ein Vermittler für verschiedenste Dienstleistungen und haben einen aktuellen Auftrag für Sie. "
            . "Es handelt sich um einen einfachen CarCheck, der direkt vor Ort durchgeführt wird. "
            . "Der gesamte Ablauf ist unkompliziert – Sie erfassen die Daten direkt in unserer WebApp und machen einige Fotos.\n\n"
            . "Details zum Auftrag:\n"
            . "Auftrags-Nr.: {$orderno}\n"
            . "Fahrzeug: " . ($vehicle ?: '—') . "\n"
            . "Standort: " . ($location ?: '—') . "\n"
            // . ($sellerName  ? "Ansprechpartner: {$sellerName}\n"  : '')
            // . ($sellerPhone ? "Telefon: {$sellerPhone}\n" : '')
            . "Termin: Flexibel\n"
            . "Vergütung: 120,- Euro netto (zzgl. 0,25 €/km für die Fahrtstrecke)\n"
            . "Dauer: ca. 30-60 Minuten\n\n"
            . "Was ist zu tun?\n"
            . "✔ Durchführung des CarChecks direkt über unsere WebApp\n"
            . "✔ Fotos vom Fahrzeug machen (Ansicht Außen & Innen, Schäden)\n"
            . "✔ Komplett digital, ohne Nachbearbeitung, kein separates Gutachten erforderlich\n\n"
            . "Hätten Sie Interesse an diesem Auftrag?\n\n"
            . "Bitte beachten Sie: Es handelt sich zunächst um eine Anfrage. Eine verbindliche Auftragsbestätigung erhalten Sie nach Ihrer Rückmeldung.\n\n";
    }

    /** Update auto-assign flag for an inspector request (via AJAX) */
    public function updateAutoAssign(Request $request, int $orderId)
    {
        $request->validate([
            'inspector_id' => 'nullable|integer',
            'external_email' => 'nullable|email',
            'mark_for_auto_assign' => 'required|boolean',
        ]);

        $inspectorId = $request->input('inspector_id');
        $externalEmail = $request->input('external_email');
        $markAuto = $request->boolean('mark_for_auto_assign');

        if ($inspectorId) {
            $ireq = InspectorRequest::where('order_id', $orderId)
                ->where('inspector_id', $inspectorId)
                ->first();

            if (!$ireq) {
                // Create new request with default values
                InspectorRequest::create([
                    'order_id' => $orderId,
                    'inspector_id' => $inspectorId,
                    'mark_for_auto_assign' => $markAuto,
                    'status' => 'pending',
                    'response_token' => \Illuminate\Support\Str::random(48),
                ]);
            } else {
                // Update existing request
                $ireq->update(['mark_for_auto_assign' => $markAuto]);
            }
        } elseif ($externalEmail) {
            $ireq = InspectorRequest::where('order_id', $orderId)
                ->where('external_email', $externalEmail)
                ->whereNull('inspector_id')
                ->first();

            if (!$ireq) {
                // Create new request with default values
                InspectorRequest::create([
                    'order_id' => $orderId,
                    'external_email' => $externalEmail,
                    'mark_for_auto_assign' => $markAuto,
                    'status' => 'pending',
                    'response_token' => \Illuminate\Support\Str::random(48),
                ]);
            } else {
                // Update existing request
                $ireq->update(['mark_for_auto_assign' => $markAuto]);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Missing inspector_id or external_email'], 422);
        }

        return response()->json(['success' => true, 'message' => 'Auto-assign setting updated.']);
    }
}
