<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPersonaToEventRequest extends FormRequest
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
            'persona_id' => 'required|exists:personas,id',
        ];
    }

    public function messages(): array
    {
        return [
            'persona_id.required' => 'Il campo persona è obbligatorio.',
            'persona_id.exists' => 'La persona selezionata non esiste.',
        ];
    }
}
