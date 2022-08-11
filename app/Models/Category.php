<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $guarded = false;

    public function subcategories() {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }
}
