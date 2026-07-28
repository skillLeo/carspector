<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class B2bPartnerPrice extends Model
{
    protected $guarded = [];

    public function partner()
    {
        return $this->belongsTo(B2bPartner::class, 'b2b_partner_id');
    }
}
