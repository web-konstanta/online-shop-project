<?php

namespace App\Http\Requests\Admin\Product;

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
            'price' => ['required', 'max:190'],
            'description' => ['required'],
            'characters' => ['required'],
            'code' => ['required', 'max:190'],
            'image' => ['nullable', 'array'],
            'category_id' => ['required', 'exists:categories,id'],
            'top_sales' => ['required'],
            'is_new' => ['required'],
            'is_active' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название должно быть введено',
            'name.max' => 'Название слишком длинное',
            'price.required' => 'Стоимость должно быть введено',
            'price.max' => 'Стоимость слишком длинное',
            'description.required' => 'Описание должно быть введено',
            'code.required' => 'Код товара должен быть введено',
            'code.max' => 'Код товара слишком длинный',
        ];
    }
}
