<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class B2bPartner extends Authenticatable
{
    use Notifiable;

    protected $table = 'b2b_partners';

    protected $fillable = [
        'company_name',
        'email',
        'password',
        'logo_path',
        'status',
        'registration_token',
        'token_expires_at',
        'email_sent_at',
        'last_login_at',
        'created_by',
    ];

    protected $hidden = [
        'password',
        'registration_token',
        'remember_token',
    ];

    protected $casts = [
        'token_expires_at' => 'datetime',
        'email_sent_at'    => 'datetime',
        'last_login_at'    => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'b2b_partner_id');
    }

    public function prices()
    {
        return $this->hasMany(B2bPartnerPrice::class, 'b2b_partner_id');
    }

    public function priceFor(string $serviceType): ?float
    {
        return $this->prices->firstWhere('service_type', $serviceType)?->price;
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
        return $this->token_expires_at !== null && $this->token_expires_at->isFuture();
    }

    public function getLogoUrlAttribute(): string
    {
        if ($this->logo_path && Storage::disk('public')->exists($this->logo_path)) {
            return Storage::url($this->logo_path);
        }
        return asset('logo-pdf.png');
    }
}
