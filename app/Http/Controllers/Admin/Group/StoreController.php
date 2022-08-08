<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\StoreGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreGroupRequest $request)
    {
        $data = $request->validated();
        Group::firstOrCreate($data);
        return redirect()->route('admin.group.index');
    }
}
