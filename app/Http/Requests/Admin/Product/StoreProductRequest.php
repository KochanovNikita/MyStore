<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'price' => 'required',
            'discount' => 'nullable|integer',
            'content' => 'required|string',
            'description' => 'required|string',
            'main_image' => 'required|image',
            'images' => 'required|array',
            'count' => 'nullable|integer',
            'category_id' => 'required|integer',
            'company_id' => 'required|integer',
            'color_id' => 'required|integer',
            'subcategories' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'price.required' => 'Это поле обязательно для заполнения',
            'discount.integer' => 'Необходимо ввести целое число.',
            'description.required' => 'Это поле обязательно для заполнения',
            'main_image.required' => 'Это поле обязательно для заполнения',
            'main_image.image' => 'Тут должна быть фотография',
            'count.integer' => 'Необходимо ввести целое число.',
            'category_id.required' => 'Это поле обязательно для заполнения',
            'company_id.required' => 'Это поле обязательно для заполнения',
            'color_id.required' => 'Это поле обязательно для заполнения',
            'images.required' => 'Выберите все файлы',
        ];
    }
}
