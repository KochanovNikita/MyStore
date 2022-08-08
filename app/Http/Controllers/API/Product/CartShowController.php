<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\CartProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class CartShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Product $product)
    {
        return new CartProductResource($product);
    }
}
