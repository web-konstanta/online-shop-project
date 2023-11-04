<?php

namespace App\Http\Requests\Admin\Contact;

use App\Models\Contact;
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

    public function prepareForValidation()
    {
        $this->merge([
            'phone' => Contact::formatPhone($this->phone)
        ]);
    }

  /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_name' => ['required', 'max:190'],
            'contact_person' => ['required', 'max:190'],
            'address' => ['required', 'max:190'],
            'phone' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Имя компании должно быть введено',
            'company_name.max' => 'Имя компании слишком длинное',
            'contact_person.required' => 'Контактное лицо должно быть введено',
            'contact_person.max' => 'Контактное лицо слишком длинное',
            'address.required' => 'Адрес должно быть введено',
            'address.max' => 'Адрес слишком длинный',
            'phone.required' => 'Телефон должен быть введено',
        ];
    }
}
