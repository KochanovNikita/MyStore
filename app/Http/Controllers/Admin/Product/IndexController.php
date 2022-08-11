<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Admin\Filter\ProductFilterRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Company;
use App\Models\Group;
use App\Models\Product;
use App\Models\Subcategory;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ProductFilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => $data]);
        $products = Product::filter($filter)->paginate(15)->withQueryString();
        $subcategories = Subcategory::all();
        $categories = Category::all();
        $companies = Company::all();
        $colors = Color::all();
        $groups = Group::all();
        $genders = Product::getGenders();
        return view('admin.product.index', compact('products', 'subcategories',
        'categories', 'companies', 'colors', 'groups', 'genders'));
    }
}
