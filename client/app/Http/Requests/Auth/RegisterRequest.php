<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6', 'max:190']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя должно быть введено',
            'name.max' => 'Слишком длинное имя',
            'email.required' => 'Email должен быть введен',
            'email.unique' => 'Данный email уже используется на сайте',
            'password.required' => 'Введите пароль',
            'password.min' => 'Пароль должен быть не короче 6 символов',
            'password.max' => 'Пароль слишком длинный',
            'password.confirmed' => 'Пароли не совпадают'
        ];
    }
}
