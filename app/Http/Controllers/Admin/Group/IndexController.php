<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Http\Filters\GroupFilter;
use App\Http\Requests\Admin\Filter\GroupFilterRequest;
use App\Models\Group;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GroupFilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(GroupFilter::class, ['queryParams' => array_filter($data)]);
        $groups = Group::filter($filter)->paginate(15)->withQueryString();
        return view('admin.group.index', compact('groups'));
    }
}
