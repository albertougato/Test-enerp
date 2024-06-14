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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
        ];
    }

    public function messages() :array
    {
        return [
            //Regole firstName
            'firstName.required' => 'Il nome é obbligatorio',
            'firstName.string' => 'Il nome dev\'essere un testo',

            //Regole lastName
            'lastName.required' => 'Il cognome é obbligatorio',
            'lastName.string' => 'Il cognome dev\'essere un testo',
        ];
    }
}
