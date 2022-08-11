<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\FilterProductRequest;
use App\Http\Resources\Product\MinProductResource;
use App\Models\Product;
use App\Http\Filters\ProductFilter;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FilterProductRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        isset($data['page']) ? $page = $data['page'] : $page = 1;
        $products = Product::filter($filter)->paginate(12, ['*'], 'page', $page);
        return MinProductResource::collection($products);
    }
}
