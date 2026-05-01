<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDamageSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'market_average',
        'dat_value',
        'selling_price',
        'market_average_cost',
        'remarks',
        'show_in_pdf',
    ];
}
