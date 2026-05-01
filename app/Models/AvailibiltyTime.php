<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailibiltyTime extends Model
{
    use HasFactory;
    public function getTimeAttribute($value){
        return date('H:i',strtotime($value));
    }
}
