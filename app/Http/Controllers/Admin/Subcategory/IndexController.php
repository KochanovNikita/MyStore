<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Http\Filters\SubcategoryFilter;
use App\Http\Requests\Admin\Filter\SubcategoryFilterRequest;
use App\Models\Category;
use App\Models\Subcategory;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SubcategoryFilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(SubcategoryFilter::class, ['queryParams' => $data]);
        $subcategories = Subcategory::filter($filter)->paginate(15)->withQueryString();
        $categories = Category::all();
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }
}
