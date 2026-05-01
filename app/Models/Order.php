<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded=[];

    protected $casts = [
        'admin_order_date' => 'date',
        'completed_at' => 'datetime',
        'paid_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $order) {
            if (empty($order->pdf_number)) {
                // ensure uniqueness in application layer; DB unique index is the final guard
                do {
                    $num = random_int(10000000, 99999999); // 8-digit
                } while (self::where('pdf_number', $num)->exists());
                $order->pdf_number = $num;
            }
        });

        static::saved(function (self $order) {
            if (empty($order->orderno) && $order->id) {
                $order->orderno = self::formatOrderNumber($order);
                $order->saveQuietly();
            }
        });
    }

    public static function formatOrderNumber(self $order): string
    {
        $year = $order->created_at ? $order->created_at->format('Y') : now()->format('Y');

        return 'CS-' . $year . '-' . str_pad((string) $order->id, 5, '0', STR_PAD_LEFT);
    }

    public function getFormattedOrderNumberAttribute(): string
    {
        return $this->orderno ?: self::formatOrderNumber($this);
    }

    public function examiner(){
        return $this->belongsTo(User::class,'examiner_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function examination()
    {
        return $this->hasOne(OrderExamination::class,'order_id');

    }

    public function partnerLogo()
    {
        return $this->belongsTo(PartnerLogo::class);
    }
}
