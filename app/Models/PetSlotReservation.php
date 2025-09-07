<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PetSlotReservation extends Model
{
    protected $table = 'pet_slot_reservations';

    protected $fillable = [
        'booking_id',
        'pet_id',
        'slot_id',
        'status',
    ];

    // casts
    protected $casts = [
        'slot_id'    => 'integer',
        'pet_id'     => 'integer',
        'booking_id' => 'integer',
    ];

    // relationships
    public function booking()
    {
        return $this->belongsTo(\App\Models\Booking::class, 'booking_id');
    }

    public function pet()
    {
        return $this->belongsTo(\App\Models\Pet::class, 'pet_id');
    }

    public function slot()
    {
        return $this->belongsTo(\App\Models\Slot::class, 'slot_id');
    }

    // scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Flag reservation as cancelled and decrement slot.booked_count safely.
     *
     * @return $this
     */
    public function cancel()
    {
        if ($this->status !== 'active') {
            return $this;
        }

        return DB::transaction(function () {
            // mark reservation cancelled
            $this->status = 'cancelled';
            $this->save();

            // decrement slot's booked_count safely using a row lock
            $slot = \App\Models\Slot::where('id', $this->slot_id)->lockForUpdate()->first();
            if ($slot && isset($slot->booked_count) && $slot->booked_count > 0) {
                $slot->decrement('booked_count');
            }

            return $this;
        });
    }

    /**
     * Mark reservation completed.
     *
     * @return $this
     */
    public function markCompleted()
    {
        if ($this->status === 'completed') {
            return $this;
        }

        $this->status = 'completed';
        $this->save();

        return $this;
    }
}
