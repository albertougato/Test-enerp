<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ];
    }

    public function messages() :array
    {
        return [
            //first_name rules
            'first_name.required' => 'Il nome é obbligatorio',
            'first_name.string' => 'Il nome dev\'essere un testo',

            //last_name rules
            'last_name.required' => 'Il cognome é obbligatorio',
            'last_name.string' => 'Il cognome dev\'essere un testo',
        ];
    }
}
