<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Company;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Product $product)
    {
        $categories = Category::all();
        $companies = Company::all();
        $colors = Color::all();
        $groups = Group::all();
        $genders = Product::getGenders();
        return view('admin.product.edit', compact('product', 'categories', 'companies', 'colors', 'genders', 'groups'));
    }
}
