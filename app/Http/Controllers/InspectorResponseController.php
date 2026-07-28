<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\InspectorRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class InspectorResponseController extends Controller
{
    public function accept(string $token)
    {
        $req = InspectorRequest::where('response_token', $token)->firstOrFail();

        if ($req->status !== 'pending') {
            return view('inspector.response.already-responded', ['action' => $req->status]);
        }

        // Block only if admin has formally assigned an inspector (examiner_id set)
        $order = Order::find($req->order_id);
        if ($order && $order->examiner_id) {
            return view('inspector.response.already-responded', ['action' => 'already_assigned']);
        }

        $req->update([
            'status'       => 'accepted',
            'responded_at' => now(),
        ]);

        // Auto-assign if marked for auto-assignment AND no other inspector already assigned
        if ($req->mark_for_auto_assign && $req->inspector_id && $order && !$order->examiner_id) {
            // Only auto-assign for internal inspectors (those with inspector_id)
            $inspector = $req->inspector;
            $user = \App\Models\User::where('email', $inspector->email)->first();
            if (!$user) {
                $user = \App\Models\User::create([
                    'name'     => $inspector->name,
                    'email'    => $inspector->email,
                    'password' => bcrypt(\Illuminate\Support\Str::random(32)),
                    'type'     => 'examiner',
                ]);
            }

            $order->update([
                'examiner_id'   => $user->id,
                'examiner_name' => $inspector->name,
                'admin_status'  => 'Pruefung',
                'status'        => 'inspecting',
            ]);

            // Send assignment confirmation and exam start emails
            $directLink = \Illuminate\Support\Facades\URL::temporarySignedRoute(
                'inspector.order.direct',
                now()->addDays(30),
                ['orderId' => $order->id, 'inspectorId' => $inspector->id]
            );

            $examStartUrl = \Illuminate\Support\Facades\URL::temporarySignedRoute(
                'inspector.start.exam',
                now()->addDays(30),
                ['orderId' => $order->id, 'inspectorId' => $inspector->id]
            );

            $appointmentUrl = \Illuminate\Support\Facades\URL::signedRoute(
                'appointment.confirm.show', ['order' => $order->id], now()->addDays(7)
            );

            try {
                Mail::to($inspector->email)->send(new \App\Mail\InspectorAssignmentMail($inspector, $order, $directLink, $examStartUrl, $appointmentUrl));
                Mail::to($inspector->email)->send(new \App\Mail\InspectorExamStartMail($inspector, $order, $examStartUrl));
            } catch (\Exception $e) {
                Log::error('Inspector auto-assignment mail failed: ' . $e->getMessage());
            }
        }

        $inspectorName = $req->inspector_id ? optional($req->inspector)->name : ($req->external_email ?? 'Extern');
        $orderNo = optional($req->order)->display_order_number ?? ('#' . $req->order_id);
            AdminNotification::notify(
            'inspector_accepted',
            "{$inspectorName} hat Auftrag {$orderNo} angenommen",
            '',
            $req->order_id ? "/admin/bookings/{$req->order_id}" : null,
            $req->order_id
        );

        return view('inspector.response.accepted', ['inspector' => $req->inspector_id ? $req->inspector : null, 'order' => $req->order]);
    }

    public function decline(string $token)
    {
        $req = InspectorRequest::where('response_token', $token)->firstOrFail();

        if ($req->status !== 'pending') {
            return view('inspector.response.already-responded', ['action' => $req->status]);
        }

        $req->update([
            'status'       => 'declined',
            'responded_at' => now(),
        ]);

        return view('inspector.response.declined', ['inspector' => $req->inspector_id ? $req->inspector : null, 'order' => $req->order]);
    }
}
