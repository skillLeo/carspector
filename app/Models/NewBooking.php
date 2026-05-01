<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'street',
        'house_number',
        'postal_code',
        'city',
        'license_plate_type',
        'desired_license_plate',
        'reservation_pin',
        'is_seasonal',
        'season_from_month',
        'season_to_month',
        'special_plate',
        'status',
        'checkout_status',
        'checkout_session_id',
        'amount_eur',
        'tax_rate_id',
    ];

    protected $casts = [
        'is_seasonal' => 'boolean',
        'amount_eur' => 'decimal:2',
    ];
}
