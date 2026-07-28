<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectorServiceArea extends Model
{
    protected $fillable = [
        'inspector_id',
        'type',
        'city_name',
        'postal_min',
        'postal_max',
    ];

    public function inspector()
    {
        return $this->belongsTo(Inspector::class);
    }

    public function getDisplayLabelAttribute(): string
    {
        if ($this->type === 'city') {
            return $this->city_name ?? '—';
        }
        return ($this->postal_min ?? '?') . ' – ' . ($this->postal_max ?? '?');
    }
}
