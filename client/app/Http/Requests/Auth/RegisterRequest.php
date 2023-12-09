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
            'name.required' => __('auth-validation.name.required'),
            'name.max' => __('auth-validation.name.max'),
            'email.required' => __('auth-validation.email.required'),
            'email.unique' => __('auth-validation.email.unique'),
            'password.required' => __('auth-validation.password.required'),
            'password.min' => __('auth-validation.password.min'),
            'password.max' => __('auth-validation.password.max'),
            'password.confirmed' => __('auth-validation.password.confirmed')
        ];
    }
}
