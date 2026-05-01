<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ExaminationImage extends Model
{
    use HasFactory;
    protected $appends=['image1'];

    public function getImage1Attribute()
    {
        //

        if (Storage::disk('public')->exists($this->image)){
            return Storage::url($this->image);
        }
        return asset('assets/img/uploaded-card.jpg');
    }
}
