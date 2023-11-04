<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required'],
            'password' => ['required', 'min:6', 'max:190']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email должен быть введен',
            'password.required' => 'Введите пароль',
            'password.min' => 'Пароль должен быть не короче 6 символов',
            'password.max' => 'Пароль слишком длинный',
        ];
    }
}
