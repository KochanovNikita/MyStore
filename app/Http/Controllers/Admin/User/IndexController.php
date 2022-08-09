<?php

namespace App\Http\Controllers\Admin\User;

use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserFilter $filter)
    {
        $users = User::filter($filter)->paginate(20)->withQueryString();
        return view('admin.user.index', compact('users'));
    }
}
