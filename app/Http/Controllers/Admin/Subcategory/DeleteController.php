<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('admin.subcategory.index');
    }
}
