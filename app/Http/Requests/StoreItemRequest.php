<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            // 'description'=> 'nullable',
            'slug' => 'required| max:200',
            'category'=>'required|max:100',
            'type'=>'required|max:100',
            'weight'=> 'required|max:10',
            'cost'=> 'required|max:20',

        ];
    }
    public function messages(){

        return [
            //

            'name.required' => 'Il campo nome è richiesto',
            'name.max' => 'Il campo nome deve avere massimo :max caratteri',
            // 'description' => 'Il campo descrizione deve essere obbligatorio',
            'slug'=>'Il campo slug deve essere obbligatorio',
            'category'=>'Il campo categoria deve essere obbligatorio',
            'type'=> 'Il campo tipo deve essere obbligatorio',
            'weight'=> 'Il campo peso deve essere obbligatorio',
            'cost'=> 'Il campo costo vita deve essere obbligatorio'
        ];
    }
}
