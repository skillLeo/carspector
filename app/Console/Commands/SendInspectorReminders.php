<?php

namespace App\Console\Commands;

use App\Mail\InspectorReminderMail;
use App\Models\InspectorRequest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendInspectorReminders extends Command
{
    protected $signature   = 'inspectors:send-reminders';
    protected $description = 'Send 24-hour follow-up reminder to inspectors who have not responded yet';

    public function handle(): void
    {
        $cutoff = now()->subHours(24);

        $pending = InspectorRequest::where('status', 'pending')
            ->whereNull('reminder_sent_at')
            ->where('sent_at', '<=', $cutoff)
            ->with(['inspector', 'order'])
            ->get();

        $sent = 0;

        foreach ($pending as $req) {
            // Skip if order is already assigned to someone
            if (!empty($req->order->examiner_id)) {
                continue;
            }

            try {
                Mail::to($req->inspector->email)
                    ->send(new InspectorReminderMail($req->inspector, $req->order, $req->response_token));

                $req->update(['reminder_sent_at' => now()]);
                $sent++;
            } catch (\Exception $e) {
                Log::error('Inspector reminder mail failed: ' . $e->getMessage(), [
                    'inspector_id' => $req->inspector_id,
                    'order_id'     => $req->order_id,
                ]);
            }
        }

        $this->info("Sent {$sent} reminder(s).");
    }
}
