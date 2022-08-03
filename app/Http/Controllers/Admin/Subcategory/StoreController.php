<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategory\StoreSubcategoryRequest;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreSubcategoryRequest $request)
    {
        $data = $request->validated();
        Subcategory::firstOrCreate($data);
        return redirect()->route('admin.subcategory.index');
    }
}
