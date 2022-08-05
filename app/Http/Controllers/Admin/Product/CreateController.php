<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        $companies = Company::all();
        $colors = Color::all();
        $genders = Product::getGenders();
        return view('admin.product.create', compact('categories', 'companies', 'colors', 'genders'));
    }
}
