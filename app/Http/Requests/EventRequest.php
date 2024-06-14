<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required|string',
            'date' => 'required|date',
        ];
    }

    public function messages() :array
    {
        return [
            //Name rules
            'name.required' => 'Il titolo é obbligatorio',
            'name.string' => 'Il titolo dev\'essere un testo',

            //Date rules
            'date.required' => 'La data é obbligatoria',
            'date.date' => 'Inserisci una data valida',
        ];
    }
}
