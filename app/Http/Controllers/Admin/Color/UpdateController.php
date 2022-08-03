<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\UpdateColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateColorRequest $request, Color $color)
    {
        $data = $request->validated();
        $color->update($data);
        return redirect()->route('admin.color.index');
    }
}
