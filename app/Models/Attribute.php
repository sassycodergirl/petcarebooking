<?php
// app/Models/Attribute.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name', 'slug'];

    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class, 'attribute_product');
    }
}

?>