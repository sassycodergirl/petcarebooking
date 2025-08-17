<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'description','ingredients','price', 'stock_quantity', 'status', 'category_id', 'image'
    ];
 

    public function category()
    {
        return $this->belongsTo(Category::class);
       
    }
    public function variants()
    {
        return $this->hasMany(\App\Models\ProductVariant::class);
    }
    public function gallery()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function colors()
    {
        return $this->belongsToMany(\App\Models\Color::class, 'color_product', 'product_id', 'color_id');
    }
    public function attributes()
    {
        return $this->belongsToMany(\App\Models\Attribute::class, 'attribute_product');
    }
}
