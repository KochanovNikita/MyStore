<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function getImagePathAttribute() : string {
        return 'storage/'.$this->image;
    }

    public function getPreviewImagePathAttribute() : string {
        return 'storage/'.$this->preview_image;
    }
}
