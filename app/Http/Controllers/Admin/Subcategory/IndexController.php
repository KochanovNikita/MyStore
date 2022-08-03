<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $subcategories = Subcategory::paginate(15);
        return view('admin.subcategory.index', compact('subcategories'));
    }
}
