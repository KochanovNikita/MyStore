<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'products' => 'required|array',
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'total_price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите Ваше имя',
            'address.required' => 'Введите Ваш адрес',
            'phone.required' => 'Введите Ваш номер телефона',
        ];
    }
}
