<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Filters\ColorFilter;
use App\Http\Requests\Admin\Filter\ColorFilterRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ColorFilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ColorFilter::class, ['queryParams' => array_filter($data)]);
        $colors = Color::filter($filter)->paginate(15)->withQueryString();
        return view('admin.color.index', compact('colors'));
    }
}
