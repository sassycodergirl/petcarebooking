<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'type',          // shipping / billing
        'address_line1',
        'address_line2',
        'city',
        'state',
        'pincode',
        'country',
    ];

    // 👇 Relationship: an address belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
