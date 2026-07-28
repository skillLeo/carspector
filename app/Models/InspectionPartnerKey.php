<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InspectionPartnerKey extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active'    => 'boolean',
        'last_used_at' => 'datetime',
    ];

    /**
     * Generate a new raw API key, persist the hash, and return the plain-text key.
     * The plain-text key is NEVER stored — caller must display it once and discard it.
     */
    public static function generate(string $label = 'TÜV Rheinland'): array
    {
        $raw  = Str::random(48);
        $hash = hash('sha256', $raw);
        $hint = substr($raw, -8);

        // Deactivate all previous keys
        static::where('is_active', true)->update(['is_active' => false]);

        static::create([
            'key_hash'  => $hash,
            'hint'      => $hint,
            'label'     => $label,
            'is_active' => true,
        ]);

        return ['raw' => $raw, 'hint' => $hint];
    }

    /**
     * Find the active key record matching the provided raw key.
     * Returns null if no active key matches.
     */
    public static function findByRaw(string $raw): ?self
    {
        $hash = hash('sha256', $raw);
        return static::where('key_hash', $hash)->where('is_active', true)->first();
    }

    public function markUsed(): void
    {
        $this->timestamps = false;
        $this->last_used_at = now();
        $this->save();
        $this->timestamps = true;
    }
}
