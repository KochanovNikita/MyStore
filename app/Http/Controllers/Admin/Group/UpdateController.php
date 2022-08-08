<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\UpdateGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateGroupRequest $request, Group $group)
    {
        $data = $request->validated();
        $group->update($data);
        return redirect()->route('admin.group.index');
    }
}
