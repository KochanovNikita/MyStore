<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Company;

class DetalisController extends Controller
{
    public function category() {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function company() {
        $companies = Company::all();
        return CompanyResource::collection($companies);
    }

    public function color() {
        $colors = Color::all();
        return ColorResource::collection($colors);
    }
}
