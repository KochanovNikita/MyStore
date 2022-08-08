<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],

            'role_id' => ['nullable', 'integer'],
            'address' => ['nullable', 'string'],
            'avatar_path' => ['nullable', 'image'],
            'phone' => ['nullable', 'string'],
        ])->validateWithBag('updateProfileInformation');

        if(!isset($input['avatar_path'])) {
            $input['avatar_path'] = $user->avatar_path;
        } else {
            $input['avatar_path'] = $this->updateUserAvatar($input['avatar_path'], $user->avatar_path);
        }

        try {
            DB::beginTransaction();
            if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->update($input);
        }

        DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }

        return true;
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }

    private function updateUserAvatar($newAvatar, $oldAvatar) {
        $fileName = md5(Carbon::now().'_'.$newAvatar->getClientOriginalName()).'.'.$newAvatar->getClientOriginalExtension();
        $path = 'images/avatars/'.$fileName;
        \Intervention\Image\Facades\Image::make($newAvatar)
        ->fit(100, 100)
        ->save(storage_path('app/public/'.$path));


        if($path && !str_contains($oldAvatar, 'no-avatar')) {
            Storage::disk('public')->delete($oldAvatar);
        }
        return $path;
    }
}
