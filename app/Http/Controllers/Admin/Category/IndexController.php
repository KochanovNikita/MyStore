<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\CategoryFilter;
use App\Http\Requests\Admin\Filter\CategoryFilterRequest;
use App\Models\Category;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CategoryFilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(CategoryFilter::class, ['queryParams' => array_filter($data)]);
        $categories = Category::filter($filter)->paginate(30)->withQueryString();
        return view('admin.category.index', compact('categories'));
    }
}
