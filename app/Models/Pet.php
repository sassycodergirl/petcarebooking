<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
   protected $fillable = ['user_id', 'name', 'type', 'breed', 'age', 'gender', 'weight', 'notes', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 
?>