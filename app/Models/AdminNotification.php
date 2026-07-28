<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    protected $fillable = ['type', 'title', 'message', 'link', 'order_id', 'read_at'];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function isUnread(): bool
    {
        return $this->read_at === null;
    }

    public static function notify(string $type, string $title, string $message, ?string $link = null, ?int $orderId = null): void
    {
        static::create([
            'type'     => $type,
            'title'    => $title,
            'message'  => $message,
            'link'     => $link,
            'order_id' => $orderId,
        ]);
    }
}
