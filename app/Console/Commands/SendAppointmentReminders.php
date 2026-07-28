<?php

namespace App\Console\Commands;

use App\Mail\ExaminerBookingMail;
use App\Models\InspectorRequest;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendAppointmentReminders extends Command
{
    protected $signature = 'reminders:send-appointment-requests';
    protected $description = 'Send appointment reminders to inspectors who received assignment 4+ hours ago without setting appointment';

    public function handle()
    {
        $now = now();

        if ($now->hour < 8 || $now->hour >= 20) {
            $this->info('Outside sending window.');
            return Command::SUCCESS;
        }

        $requests = InspectorRequest::where('status', 'accepted')
            ->whereNotNull('assignment_mail_sent_at')
            ->whereNull('appointment_reminder_sent_at')
            ->with(['order', 'inspector'])
            ->get();

        foreach ($requests as $req) {

            $eligibleAt = \Carbon\Carbon::parse($req->assignment_mail_sent_at)->addHours(4);

            if ($eligibleAt->hour >= 20) {
                $eligibleAt = $eligibleAt->addDay()->setTime(8, 0);
            }

            if ($eligibleAt->hour < 8) {
                $eligibleAt = $eligibleAt->setTime(8, 0);
            }

            if ($now->lt($eligibleAt)) {
                continue;
            }

            if (!$req->order || !empty($req->order->appointment_date)) {
                continue;
            }

            $email = $req->external_email ?? optional($req->inspector)->email;
            if (!$email) {
                continue;
            }

            try {
                $orderno = $req->order->orderno ?? ('#' . $req->order->id);
                $vehicle = trim(($req->order->brand ?? '') . ' ' . ($req->order->vehicle_make_model ?? ''));
                $location = trim($req->order->listing_seller_address ?? $req->order->postal_code . ' ' . $req->order->city);
                $seller = trim($req->order->listing_seller_name ?? '');
                $phone = trim($req->order->seller_phone ?? $req->order->phone ?? '');

                $subject = "Terminbestätigung erforderlich – Auftrag {$orderno}";
                $html = '<!DOCTYPE html><html lang="de"><head><meta charset="UTF-8"></head><body style="font-family:Arial,sans-serif;font-size:14px;color:#212529;line-height:1.6;">'
                    . '<p>Sehr geehrte Damen und Herren,</p>'
                    . '<p>wir möchten Sie bitten, einen Termin für den folgenden Auftrag zu bestätigen:</p>'
                    . '<p><strong>Auftrags-Nr.:</strong> ' . e($orderno) . '<br>'
                    . '<strong>Fahrzeug:</strong> ' . e($vehicle ?: '—') . '<br>'
                    . '<strong>Standort:</strong> ' . e($location ?: '—') . '<br>'
                    . '<strong>Verkäufer:</strong> ' . e($seller ?: '—') . '<br>'
                    . '<strong>Telefon:</strong> ' . e($phone ?: '—') . '</p>'
                    . '<p>Bitte teilen Sie uns den vereinbarten Termin über den folgenden Button mit:</p>'
                    . '<p style="margin:24px 0;">'
                    . '<a href="' . \Illuminate\Support\Facades\URL::signedRoute('appointment.confirm.show', ['order' => $req->order->id], now()->addDays(7)) . '" style="display:inline-block;background:#0d6efd;color:#fff;text-decoration:none;padding:12px 24px;border-radius:5px;font-weight:bold;">Termin bestätigen</a>'
                    . '</p>'
                    . '<p>Mit freundlichen Grüßen<br>Carspector Support Team</p>'
                    . '</body></html>';

                Mail::html($html, function ($m) use ($email, $subject) {
                    $m->to($email)->cc('partner@carspector.de')->subject($subject);
                });

                $req->update(['appointment_reminder_sent_at' => now()]);
                Log::info("Appointment reminder sent for order {$req->order_id} to {$email}");
            } catch (\Exception $e) {
                Log::error("Failed to send appointment reminder for order {$req->order_id}: " . $e->getMessage());
            }
        }

        $this->info('Appointment reminders sent.');
    }
}
