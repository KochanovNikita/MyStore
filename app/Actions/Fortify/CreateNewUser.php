<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role_id' => ['nullable', 'integer'],
            'address' => ['nullable', 'string'],
        ])->validate();

        if(isset($input['role_id'])) {
            $role_id = $input['role_id'];
        } else {
            str_contains($input['name'], 'Admin') ? $role_id = 1 : $role_id = 2;
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role_id' => $role_id,
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
