<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password','first_name','last_name','phone','company_name','zip_code'
    ];
    protected $appends=['image'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function getPictureAttribute($value){
//        if (Storage::disk('public')->exists($value)){
//            return Storage::url($value);
//        }
//        return 'avatar.png';
//    }
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class,ExaminerCity::class,'user_id','city_id');
    }

    public function getNameAttribute($value){
        if ($this->type=='examiner') {
            $name = explode(' ', $value);
            if (isset($name[1])) {
                return $name[0] . ' ' . Str::substr($name[1], 0, 1) . '.';
            }
            return $name[0] . '.';
        }
        return $value;
    }
    public function getImageAttribute(){

       if (Storage::disk('public')->exists($this->picture)){
           return Storage::url($this->picture);
       }
       return asset('avatar.png');
    }
}
