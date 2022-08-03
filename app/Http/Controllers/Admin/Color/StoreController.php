<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\StoreColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreColorRequest $request)
    {
        $data = $request->validated();
        Color::firstOrCreate($data);
        return redirect()->route('admin.color.index');
    }
}
