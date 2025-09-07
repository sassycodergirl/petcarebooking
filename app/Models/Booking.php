<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'location',
        'booking_type',
        'check_in',
        'check_out',
        'num_dogs',
        'num_cats',
        'pet_ids',
        'extra_pet_details',
        'base_price',
        'penalty_price',
        'total_price',
        'status',
        'slot_id',
    ];

    protected $casts = [
        'check_in'         => 'datetime',
        'check_out'        => 'datetime',
        'pet_ids'          => 'array',
        'extra_pet_details'=> 'array',
        'base_price'       => 'float',
        'penalty_price'    => 'float',
        'total_price'      => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    // reservations (pet-slot rows) for this booking
    public function reservations()
    {
        return $this->hasMany(\App\Models\PetSlotReservation::class, 'booking_id');
    }

    // helper to fetch Pet models referenced in pet_ids (optional)
    public function pets()
    {
        return \App\Models\Pet::whereIn('id', $this->pet_ids ?? [])->get();
    }
}
