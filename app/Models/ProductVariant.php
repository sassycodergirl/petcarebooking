<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id', 'size', 'color_id', 'price', 'stock_quantity', 'image',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    // Helper: final price falls back to product price
    public function getFinalPriceAttribute()
    {
        return $this->price ?? $this->product?->price;
    }
}
