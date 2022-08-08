<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\MinProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class GenderIndexController extends Controller
{
    public function man() {
        $products = Product::where('gender_id', '1')->get();
        return MinProductResource::collection($products);
    }

    public function woman() {
        $products = Product::where('gender_id', '<>', '1')->get();
        return MinProductResource::collection($products);
    }
}
