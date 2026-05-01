<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Hofmannsven\Brevo\Facades\Brevo;
use Brevo\Client\Model\CreateContact;
use Brevo\Client\Model\SendSmtpEmail;
use Brevo\Client\Model\SendSmtpEmailSender;
use Brevo\Client\Model\SendSmtpEmailTo;

class BrevoLeadController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => [ 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telefon' => ['nullable', 'string', 'max:255'],
        ]);

//        dd($data);
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['telefon'] ?? null;

        // 1) Create/Update contact in Brevo and add to list
        try {
            $listId = 20;
//            dd($listId);
            $contactPayload = [
                'email' => $email,
                'attributes' => array_filter([
                    // Use common attributes; adjust to your Brevo account mapping
                    'FIRSTNAME' => $name,
                    'NAME' => $name,
                    'PHONE' => $phone,
                ], fn($v) => !is_null($v) && $v !== ''),
                'updateEnabled' => true,
            ];
            if ($listId > 0) {
                $contactPayload['listIds'] = [$listId];
            }

            $createContact = new CreateContact($contactPayload);
          $resp=  Brevo::ContactsApi()->createContact($createContact);

        } catch (\Throwable $e) {
            Log::warning('Brevo contact create/update failed', [
                'error' => $e->getMessage(),
            ]);
            // Continue; not fatal for UX
        }

        // 2) Send a transactional email via Brevo
        try {
            $senderEmail = env('BREVO_SENDER_EMAIL', config('mail.from.address'));
            $senderName  = env('BREVO_SENDER_NAME', config('mail.from.name', 'Carspector'));

//            dd($senderName);
            // Brevo template params (for dynamic placeholders)
            $params = [
                'NAME'        => $name,
//                'email'       => $email,
                'BOOKING_URL' => route('buchung-s4',['email'=>$request->email]), // Change or pass dynamically
            ];
//            dd($email);
            $sendSmtpEmail = new SendSmtpEmail([
                'sender' => new SendSmtpEmailSender([
                    'email' => $senderEmail,
                    'name'  => $senderName,
                ]),


                'to' => [
                    new SendSmtpEmailTo([
                        'email' => $email,
                        'name'  => $name,
                    ]),
                ],

                // ⭐ Use Brevo Template
                'templateId' => 61,

                // ⭐ Pass variables defined inside your Brevo HTML template
                'params' => $params,
            ]);

           $resp= Brevo::TransactionalEmailsApi()->sendTransacEmail($sendSmtpEmail);
//           dd($resp->getMessageId());
        } catch (\Throwable $e) {
            Log::warning('Brevo transactional email failed', [
                'error' => $e->getMessage(),
            ]);
            // Continue; not fatal for UX
        }

        return back()->with('success', 'Danke! Wir haben deine Anfrage erhalten und dir eine E-Mail gesendet.');
    }
}

