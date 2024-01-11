<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
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

            'name' => 'required| max:200',
            'description' => 'nullable',
            'type_id' => 'required|numeric',
            'attack' => 'required|numeric',
            'defence' => 'required|numeric',
            'speed' => 'required|numeric',
            'life' => 'required|numeric'
        ];
    }
    public function messages()
    {

        return [

            'name.required' => 'Il campo nome è richiesto',
            'name.max' => 'Il campo nome deve avere massimo :max caratteri',
            'type_id.required' => 'Il campo type_id deve essere obbligatorio',
            'type_id.numeric' => 'Il valore inserito deve essere un numero',
            'attack.required' => 'Il campo attacco deve essere obbligatorio',
            'attack.numeric' => 'Il valore inserito deve essere un numero',
            'defence.required' => 'Il campo difesa deve essere obbligatorio',
            'defense.numeric' => 'Il valore inserito deve essere un numero',
            'speed.required' => 'Il campo velocità deve essere obbligatorio',
            'speed.numeric' => 'Il valore inserito deve essere un numero',
            'life.required' => 'Il campo valore vita deve essere obbligatorio',
            'life.numeric' => 'Il valore inserito deve essere un numero',

        ];
    }
}
