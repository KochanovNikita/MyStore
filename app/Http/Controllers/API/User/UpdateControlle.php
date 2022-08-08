<?php

namespace App\Http\Controllers\API\User;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateControlle extends Controller
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
        $updatedUser = User::where('id', $user->id)->first();
        return $updateUser ? new UserResource($updatedUser) : response('', 500)
            ->header('Content-Type', 'text/plain');
    }
}
