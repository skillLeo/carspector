<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function examiner(){
        return $this->belongsTo(User::class,'examiner_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
