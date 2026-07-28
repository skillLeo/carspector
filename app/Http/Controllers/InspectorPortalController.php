<?php

namespace App\Http\Controllers;

use App\Models\Inspector;
use App\Models\InspectorRequest;
use App\Models\InspectorServiceArea;
use App\Models\Order;
use Illuminate\Http\Request;

class InspectorPortalController extends Controller
{
    private function inspector()
    {
        return auth()->guard('inspector')->user();
    }

    public function activeOrders()
    {
        $inspector = $this->inspector();

        // Accepted + assigned to this inspector, inspection not yet completed
        // Exclude orders that were reassigned to a different examiner
        $assignedRequests = InspectorRequest::where('inspector_id', $inspector->id)
            ->where('status', 'accepted')
            ->with('order')
            ->orderByDesc('responded_at')
            ->get()
            ->filter(function($r) {
                if (!$r->order || !in_array($r->order->admin_status, ['Pruefung', 'Prüfung'])) {
                    return false;
                }
                // Exclude if admin assigned it to a different examiner
                if ($r->order->examiner_id) {
                    $user = \App\Models\User::find($r->order->examiner_id);
                    // Check if this examiner User was created from this Inspector
                    if (!$user || $user->email !== $r->inspector->email) {
                        return false;
                    }
                }
                return true;
            });

        // Pre-generate signed start-exam URLs for assigned orders
        $examUrls = [];
        foreach ($assignedRequests as $req) {
            $examUrls[$req->order->id] = \Illuminate\Support\Facades\URL::temporarySignedRoute(
                'inspector.start.exam',
                now()->addDays(30),
                ['orderId' => $req->order->id, 'inspectorId' => $inspector->id]
            );
        }

        return view('inspector.portal.active-orders', compact('inspector', 'assignedRequests', 'examUrls'));
    }

    public function completedOrders()
    {
        $inspector = $this->inspector();

        // Accepted + assigned to this inspector, inspection completed by examiner
        // Exclude orders that were reassigned to a different examiner
        $completedRequests = InspectorRequest::where('inspector_id', $inspector->id)
            ->where('status', 'accepted')
            ->with('order')
            ->orderByDesc('responded_at')
            ->get()
            ->filter(function($r) {
                if (!$r->order || !in_array($r->order->admin_status, ['Fertigstellung', 'Completed'])) {
                    return false;
                }
                // Exclude if admin assigned it to a different examiner
                if ($r->order->examiner_id) {
                    $user = \App\Models\User::find($r->order->examiner_id);
                    if (!$user || $user->email !== $r->inspector->email) {
                        return false;
                    }
                }
                return true;
            });

        return view('inspector.portal.completed-orders', compact('inspector', 'completedRequests'));
    }

    public function setAppointment(Request $request, int $orderId)
    {
        $inspector = $this->inspector();

        $request->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'nullable',
        ]);

        $req = InspectorRequest::where('order_id', $orderId)
            ->where('inspector_id', $inspector->id)
            ->where('status', 'accepted')
            ->with('order')
            ->firstOrFail();

        $req->order->update([
            'appointment_date' => $request->input('appointment_date'),
            'appointment_time' => $request->input('appointment_time') ?: null,
        ]);

        return back()->with('success', 'Termin gespeichert.');
    }

    public function startExam(Request $request, int $orderId, int $inspectorId)
    {
        $order     = Order::find($orderId);
        $inspector = Inspector::find($inspectorId);

        if (!$order || !$inspector) {
            return view('inspector.response.link-invalid');
        }

        // Find or create a User account for this inspector in the examiner system
        $user = \App\Models\User::where('email', $inspector->email)->first();
        if (!$user) {
            $user = \App\Models\User::create([
                'name'     => $inspector->name,
                'email'    => $inspector->email,
                'password' => bcrypt(\Illuminate\Support\Str::random(32)),
                'type'     => 'examiner',
            ]);
        }

        // If another examiner has since been assigned to this order, the link is no longer valid
        if ($order->examiner_id && (int) $order->examiner_id !== (int) $user->id) {
            return view('inspector.response.link-invalid');
        }

        // Ensure examiner is set on the order
        if (!$order->examiner_id) {
            $order->update(['examiner_id' => $user->id]);
        }

        // Log them into the main auth guard (examiner portal uses default guard)
        \Illuminate\Support\Facades\Auth::login($user);

        return redirect("/examiner/order/{$orderId}");
    }

    public function serviceAreas()
    {
        $inspector = $this->inspector();
        $areas = $inspector->serviceAreas()->orderBy('type')->orderBy('id')->get();
        return view('inspector.portal.service-areas', compact('inspector', 'areas'));
    }

    public function addServiceArea(Request $request)
    {
        $inspector = $this->inspector();
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

    public function deleteServiceArea(int $id)
    {
        $inspector = $this->inspector();
        $area = InspectorServiceArea::where('id', $id)
            ->where('inspector_id', $inspector->id)
            ->firstOrFail();
        $area->delete();
        return back()->with('success', 'Service area removed.');
    }

    public function requests()
    {
        $inspector = $this->inspector();
        $requests = InspectorRequest::where('inspector_id', $inspector->id)
            ->where('status', 'pending')
            ->with('order')
            ->orderByDesc('sent_at')
            ->get();
        return view('inspector.portal.requests', compact('inspector', 'requests'));
    }

    public function orderDirect(Request $request, int $orderId, int $inspectorId)
    {
        $order     = Order::with('examination')->find($orderId);
        $inspector = Inspector::find($inspectorId);

        if (!$order || !$inspector) {
            return view('inspector.response.link-invalid');
        }

        // If another examiner has since been assigned to this order, the link is no longer valid
        $user = \App\Models\User::where('email', $inspector->email)->first();
        if ($order->examiner_id && $user && (int) $order->examiner_id !== (int) $user->id) {
            return view('inspector.response.link-invalid');
        }

        // Mark the request as accepted if still pending
        InspectorRequest::where('order_id', $orderId)
            ->where('inspector_id', $inspectorId)
            ->where('status', 'pending')
            ->update(['status' => 'accepted', 'responded_at' => now()]);

        // If examination is already finished, show completion message
        $examDone = $order->examination && in_array($order->examination->status, ['finished', 'completed'])
                    || in_array($order->admin_status, ['Fertigstellung', 'Completed']);

        return view('inspector.portal.order-detail', compact('order', 'inspector', 'examDone'));
    }

    public function respondRequest(Request $request, int $id)
    {
        $inspector = $this->inspector();
        $req = InspectorRequest::where('id', $id)
            ->where('inspector_id', $inspector->id)
            ->where('status', 'pending')
            ->firstOrFail();

        $action = $request->input('action');
        if (!in_array($action, ['accepted', 'declined'])) {
            return back()->with('error', 'Invalid action.');
        }

        $req->update([
            'status'        => $action,
            'responded_at'  => now(),
        ]);

        return back()->with('success', $action === 'accepted' ? 'You have accepted the request.' : 'You have declined the request.');
    }
}
