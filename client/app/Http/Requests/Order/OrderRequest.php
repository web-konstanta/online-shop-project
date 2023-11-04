<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:190'],
            'phone' => ['required', 'min:10'],
            'city' => ['required', 'max:190'],
            'address' => ['required', 'max:190'],
            'message' => ['nullable']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя должно быть введено',
            'name.max' => 'Имя не должно быть длиннее 190 символов',
            'phone.required' => 'Телефон должен быть введен',
            'phone.min' => 'Телефон не должен быть менее 10 символов',
            'city.required' => 'Город должен быть введен',
            'city.max' => 'Город не должен быть длиннее 190 символов',
            'address.required' => 'Адрес должен быть введен',
            'address.max' => 'Адрес не должен быть длиннее 190 символов',
        ];
    }
}
