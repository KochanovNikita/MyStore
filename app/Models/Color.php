<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes, Filterable;
    protected $guarded = false;

    public function products() {
        return $this->hasMany(Product::class, 'color_id', 'id');
    }
}
