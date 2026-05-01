<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDamage;
use App\Models\OrderDamageSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderDamageController extends Controller
{
    public function fetch($orderId)
    {
        $damages = OrderDamage::where('order_id', $orderId)->orderBy('id')->get();
        $summary = OrderDamageSummary::where('order_id', $orderId)->first();
        return response()->json([
            'damages' => $damages,
            'summary' => $summary,
        ]);
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'damages' => 'nullable|array',
            'damages.*.title' => 'required|string|max:255',
            'damages.*.category' => 'nullable|in:dep,add,upc',
            'damages.*.cost_type' => 'nullable|string|max:255',
            'damages.*.amount' => 'nullable|numeric|min:0',
            'damages.*.remarks' => 'nullable|string',
            'market_average' => 'nullable|numeric',
            'dat_value' => 'nullable|numeric',
            'selling_price' => 'nullable|numeric',
            'market_average_cost' => 'nullable|numeric',
            'remarks' => 'nullable|string',
            'show_in_pdf' => 'nullable|boolean',
        ]);

        // Allow admin or assigned examiner to save
        if (!Auth::check()) { abort(403); }
        $can = false;
        $user = Auth::user();
        if ($user->type === 'admin') { $can = true; }
        else if ($user->type === 'examiner') {
            $orderTmp = Order::find((int)$validated['order_id']);
            if ($orderTmp && (int)$orderTmp->examiner_id === (int)$user->id) { $can = true; }
        }
        if (!$can) { abort(403); }

        $orderId = (int) $validated['order_id'];

        // Replace all damages for this order with the new set
        OrderDamage::where('order_id', $orderId)->delete();
        $rows = [];
        foreach ($validated['damages'] ?? [] as $row) {
            // Derive category from cost_type to ensure correct grouping in PDF
            $ct = strtolower(trim((string)($row['cost_type'] ?? '')));
            $category = null;
            if ($ct !== '') {
                if (strpos($ct, 'inferior') !== false || strpos($ct, 'wertminderung') !== false || strpos($ct, 'depreciat') !== false) {
                    $category = 'dep';
                } elseif (strpos($ct, 'added') !== false || strpos($ct, 'wertsteiger') !== false || strpos($ct, 'enhance') !== false) {
                    $category = 'add';
                } elseif (strpos($ct, 'upcoming') !== false || strpos($ct, 'repair') !== false || strpos($ct, 'ansteh') !== false || strpos($ct, 'reparatur') !== false) {
                    $category = 'upc';
                }
            }

            $rows[] = [
                'order_id' => $orderId,
                'title' => $row['title'],
                'category' => $category, // let PDF infer if null
                'cost_type' => $row['cost_type'] ?? null,
                'amount' => $row['amount'] ?? 0,
                'remarks' => $row['remarks'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        if (!empty($rows)) {
            OrderDamage::insert($rows);
        }

        // Upsert summary
        $summary = OrderDamageSummary::updateOrCreate(
            ['order_id' => $orderId],
            [
                'market_average' => $validated['market_average'] ?? null,
                'dat_value' => $validated['dat_value'] ?? null,
                'selling_price' => $validated['selling_price'] ?? null,
                'market_average_cost' => $validated['market_average_cost'] ?? null,
                'remarks' => $validated['remarks'] ?? null,
                'show_in_pdf' => array_key_exists('show_in_pdf', $validated) ? (bool)$validated['show_in_pdf'] : false,
            ]
        );

        // Mark step as completed like other steps
        $order = Order::find($orderId);
        if ($order) {
            $exam = \App\Models\OrderExamination::where('order_id', $orderId)->first();
            if ($exam) {
                $steps = is_array($exam->completed_steps) ? $exam->completed_steps : [];
                if (!in_array('cost-calculations', $steps, true)) {
                    $steps[] = 'cost-calculations';
                }
                $exam->completed_steps = array_values($steps);
                $exam->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function toggleShow(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'show_in_pdf' => 'required|boolean',
        ]);

        if (!Auth::check()) { abort(403); }
        $user = Auth::user();
        $order = Order::find((int)$validated['order_id']);
        $can = $user->type === 'admin' || ($user->type === 'examiner' && $order && (int)$order->examiner_id === (int)$user->id);
        if (!$can) { abort(403); }

        OrderDamageSummary::updateOrCreate(
            ['order_id' => (int)$validated['order_id']],
            ['show_in_pdf' => (bool)$validated['show_in_pdf']]
        );

        return response()->json(['success' => true]);
    }
}
