<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
   protected $fillable = ['user_id', 'name', 'type', 'breed', 'age', 'gender', 'weight', 'notes', 'image','conditions','food'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reservations()
    {
        return $this->hasMany(\App\Models\PetSlotReservation::class, 'pet_id');
    }
} 
?>