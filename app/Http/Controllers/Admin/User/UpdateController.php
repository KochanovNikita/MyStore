<?php

namespace App\Http\Controllers\Admin\User;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        $updateUser = new UpdateUserProfileInformation();
        $updateUser->update($user, $request->all());
        return redirect()->route('admin.user.index');
    }
}
