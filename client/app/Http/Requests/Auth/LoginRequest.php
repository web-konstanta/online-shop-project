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
            'email.required' => __('auth-validation.email.required'),
            'password.required' => __('auth-validation.password.required'),
            'password.min' => __('auth-validation.password.min'),
            'password.max' => __('auth-validation.password.max'),
        ];
    }
}
