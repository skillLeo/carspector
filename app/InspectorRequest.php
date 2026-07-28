<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectorRequest extends Model
{
    protected $fillable = [
        'order_id',
        'inspector_id',
        'external_email',
        'status',
        'email_body',
        'response_token',
        'sent_at',
        'responded_at',
        'reminder_sent_at',
        'mark_for_auto_assign',
        'assignment_mail_sent_at',
        'appointment_reminder_sent_at',
    ];

    protected $casts = [
        'sent_at'              => 'datetime',
        'responded_at'         => 'datetime',
        'reminder_sent_at'     => 'datetime',
        'assignment_mail_sent_at'      => 'datetime',
        'appointment_reminder_sent_at' => 'datetime',
        'mark_for_auto_assign' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function inspector()
    {
        return $this->belongsTo(Inspector::class);
    }
}
