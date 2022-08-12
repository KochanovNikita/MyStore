<?php

namespace App\Http\Requests\Admin\Filter;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
            'title' => 'nullable|string',
            'categories' => 'nullable|array',
            'category_id' => 'nullable|integer',
            'subcategories' => 'nullable|array',
            'subcategory_id' => 'nullable|integer',
            'companies' => 'nullable|array',
            'company_id' => 'nullable|integer',
            'colors' => 'nullable|array',
            'color_id' => 'nullable|integer',
            'groups' => 'nullable|array',
            'group_id' => 'nullable|integer',
            'gender_id' => 'nullable|integer'
        ];
    }
}
