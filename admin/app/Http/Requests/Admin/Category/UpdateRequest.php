<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'max:190'],
            'sub_category_id' => ['required', 'exists:sub_categories,id']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название должно быть введено',
            'name.max' => 'Название слишком длинное',
        ];
    }
}
