<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionSubmission extends Model
{
    protected $guarded = [];

    // No updated_at — submissions are immutable audit records
    const UPDATED_AT = null;

    protected $casts = [
        'documents_received' => 'array',
        'files_saved'        => 'array',
        'created_at'         => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public static function log(array $data): self
    {
        return static::create([
            'order_id'           => $data['order_id']           ?? null,
            'raw_order_ref'      => $data['raw_order_ref']      ?? null,
            'ip_address'         => $data['ip_address']         ?? null,
            'status'             => $data['status'],
            'error_message'      => $data['error_message']      ?? null,
            'documents_received' => $data['documents_received'] ?? null,
            'files_saved'        => $data['files_saved']        ?? null,
        ]);
    }
}
