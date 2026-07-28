<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InspectionPartnerKey;
use App\Models\InspectionSubmission;
use App\Models\Order;
use Illuminate\Http\Request;

class InspectionApiController extends Controller
{
    // ── API Key Management ───────────────────────────────────────────────────

    public function apiKeys()
    {
        $currentKey = InspectionPartnerKey::where('is_active', true)->latest()->first();
        $allKeys    = InspectionPartnerKey::orderByDesc('id')->get();

        return view('admin.inspection.api-keys', compact('currentKey', 'allKeys'));
    }

    public function generateKey(Request $request)
    {
        $label = $request->input('label', 'TÜV Rheinland');

        ['raw' => $raw, 'hint' => $hint] = InspectionPartnerKey::generate($label);

        // Flash the raw key for ONE display — after redirect it is gone forever
        session()->flash('new_api_key', $raw);
        session()->flash('new_api_hint', $hint);

        return redirect()->route('admin.inspection.api-keys')
            ->with('success', 'Neuer API-Key wurde generiert. Bitte jetzt kopieren — er wird nicht erneut angezeigt.');
    }

    public function deactivateKey($id)
    {
        $key = InspectionPartnerKey::findOrFail($id);
        $key->update(['is_active' => false]);

        return redirect()->route('admin.inspection.api-keys')
            ->with('success', 'API-Key wurde deaktiviert.');
    }

    // ── Submission Logs ──────────────────────────────────────────────────────

    public function submissions(Request $request)
    {
        $query = InspectionSubmission::with('order')
            ->orderByDesc('created_at');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('order_ref')) {
            $query->where('raw_order_ref', 'like', '%' . $request->order_ref . '%');
        }

        $submissions = $query->paginate(25)->withQueryString();

        return view('admin.inspection.submissions', compact('submissions'));
    }

    public function submissionShow($id)
    {
        $submission = InspectionSubmission::with('order')->findOrFail($id);
        return view('admin.inspection.submission-detail', compact('submission'));
    }

    // ── Review Queue ─────────────────────────────────────────────────────────

    public function reviewQueue()
    {
        $orders = Order::with(['user', 'examiner'])
            ->where('admin_status', 'Fertigstellung')
            ->orderByDesc('updated_at')
            ->paginate(25);

        return view('admin.inspection.review-queue', compact('orders'));
    }
}
