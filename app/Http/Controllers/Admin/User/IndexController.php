<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Filters\UserFilter;
use App\Http\Requests\Admin\Filter\UserFilterRequest;
use App\Models\User;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserFilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);
        $users = User::filter($filter)->paginate(20)->withQueryString();
        return view('admin.user.index', compact('users'));
    }
}
