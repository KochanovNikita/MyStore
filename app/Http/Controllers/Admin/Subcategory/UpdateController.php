<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategory\UpdateSubcategoryRequest;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
        $data = $request->validated();
        $subcategory->update($data);
        return redirect()->route('admin.subcategory.index');
    }
}
