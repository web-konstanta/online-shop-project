<?php

namespace App\Http\Requests\Admin\Order;

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
            'phone' => ['required', 'min:10'],
            'city' => ['required', 'max:190'],
            'address' => ['required', 'max:190'],
            'status' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя должно быть введено',
            'name.max' => 'Имя слишком длинное',
            'phone.required' => 'Телефон должен быть введен',
            'phone.min' => 'Телефон введен не корректно',
            'city.required' => 'Город должен быть введен',
            'city.max' => 'Город слишком длинный',
            'address.required' => 'Адрес должен быть введен',
            'address.max' => 'Адрес слишком длинный',
        ];
    }
}
