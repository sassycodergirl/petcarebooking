<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $table = 'slots';

    protected $fillable = [
        'location',
        'slot_date',
        'max_capacity',
        'booked_count',
    ];

    protected $casts = [
        'slot_date'    => 'date',
        'max_capacity' => 'integer',
        'booked_count' => 'integer',
    ];

    // reservations for this slot
    public function reservations()
    {
        return $this->hasMany(\App\Models\PetSlotReservation::class, 'slot_id');
    }

    // active reservations (convenience)
    public function activeReservations()
    {
        return $this->reservations()->where('status', 'active');
    }

    // check availability
    public function availableCapacity(): int
    {
        return max(0, ($this->max_capacity ?? 0) - ($this->booked_count ?? 0));
    }
}
