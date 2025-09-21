<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable = [
        'order_id',
        'type', // 'shipping' or 'billing'
        'name',
        'phone',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'pincode',
        'country',
    ];

    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }
}
