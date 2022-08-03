<?php

namespace App\Http\Controllers\Admin\User;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $newUser = new CreateNewUser();
        $newUser->create($request->all());
        return redirect()->route('admin.user.index');
    }
}
