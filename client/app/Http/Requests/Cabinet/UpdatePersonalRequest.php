<?php

namespace App\Http\Requests\Cabinet;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:190'],
            'email' => ['required', 'email']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя должно быть введено',
            'name.max' => 'Имя не должно быть слишком длинным',
            'email.required' => 'Email должен быть введен',
            'email.email' => 'Email введен неверно'
        ];
    }
}
