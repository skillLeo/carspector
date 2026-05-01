<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminerAvailability extends Model
{
    use HasFactory;
    protected $appends=['date1'];
    public function getDate1Attribute(){
        $now=Carbon::parse($this->date);

        return $now->format('d-m-Y');
    }
}
