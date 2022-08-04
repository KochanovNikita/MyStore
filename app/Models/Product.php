<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function getMainImagePathAttribute() : string {
        return 'storage/'.$this->main_image;
    }

    public function getPreviewImagePathAttribute() : string {
        return 'storage/'.$this->preview_image;
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function color() {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function subcategories() {
        return $this->belongsToMany(Subcategory::class, 'product_subcategories', 'product_id', 'subcategory_id');
    }

    public function images() {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function getPriceWithDiscountAttribute() {
        return $this->price-($this->price/100*$this->discount);
    }

}
