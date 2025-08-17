<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'parent_id','is_food'];

    public function products()
    {
        return $this->hasMany(Product::class);
        
    }

     // Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Child categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function isFoodCategory()
    {
        // If this category is food, or its parent is food
        return $this->is_food || ($this->parent && $this->parent->is_food);
    }
}
