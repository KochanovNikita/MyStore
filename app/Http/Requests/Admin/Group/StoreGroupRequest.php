<?php

namespace App\Http\Requests\Admin\Group;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role_id == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Выберите группу'
        ];
    }
}
