<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCharacterRequest extends FormRequest
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
            //

            'name' => 'required| max:200',
            'description' => 'nullable',
            'type_id'=>'required',
            'attack'=>'required',
            'defence'=> 'required',
            'speed'=> 'required',
            'life'=> 'required'
        ];
    }

    public function messages(){

        return [
            //

            'name.required' => 'Il campo nome è richiesto',
            'name.max' => 'Il campo nome deve avere massimo :max caratteri',
            'description' => 'Il campo descrizione deve essere obbligatorio',
            'type_id'=>'Il campo type_id deve essere obbligatorio',
            'attack'=>'Il campo attacco deve essere obbligatorio',
            'defence'=> 'Il campo difesa deve essere obbligatorio',
            'speed'=> 'Il campo velocità deve essere obbligatorio',
            'life'=> 'Il campo valore vita deve essere obbligatorio'
        ];
    }
}
