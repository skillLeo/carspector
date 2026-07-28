<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Inspector extends Authenticatable
{
    use Notifiable;

    protected $table = 'inspectors';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
        'invitation_token',
        'token_expires_at',
        'invitation_sent_at',
        'last_login_at',
        'created_by',
        'is_external',
    ];

    protected $hidden = [
        'password',
        'invitation_token',
        'remember_token',
    ];

    protected $casts = [
        'token_expires_at'    => 'datetime',
        'invitation_sent_at'  => 'datetime',
        'last_login_at'       => 'datetime',
    ];

    public function serviceAreas()
    {
        return $this->hasMany(InspectorServiceArea::class);
    }

    public function requests()
    {
        return $this->hasMany(InspectorRequest::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isTokenValid(): bool
    {
        return $this->invitation_token !== null
            && $this->token_expires_at !== null
            && $this->token_expires_at->isFuture();
    }

    /** Returns true if this inspector's service areas match the given city/postal code. */
    public function coversLocation(?string $city, ?string $postalCode): bool
    {
        foreach ($this->serviceAreas as $area) {
            if ($area->type === 'city' && $city) {
                if (mb_strtolower(trim($area->city_name)) === mb_strtolower(trim($city))) {
                    return true;
                }
            }
            if ($area->type === 'postal_range' && $postalCode) {
                $pc = (int) preg_replace('/\D/', '', $postalCode);
                $min = (int) preg_replace('/\D/', '', $area->postal_min ?? '0');
                $max = (int) preg_replace('/\D/', '', $area->postal_max ?? '99999');
                if ($pc >= $min && $pc <= $max) {
                    return true;
                }
            }
        }
        return false;
    }
}
