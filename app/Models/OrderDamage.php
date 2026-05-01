<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDamage extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'title', 'category', 'cost_type', 'amount', 'remarks'];
}
