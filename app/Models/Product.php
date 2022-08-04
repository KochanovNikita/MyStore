<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function color() {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function subcategories() {
        return $this->belongsToMany(Subcategory::class, 'product_subcategories', 'product_id', 'subcategory_id');
    }

    public function images() {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

}
