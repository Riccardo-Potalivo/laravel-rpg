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
            'category' => 'required|max:100',
            'type' => 'required|max:100',
            'weight' => 'required|max:10',
            'cost' => 'required|max:20',
            'img' => 'nullable|image|max:1024'


        ];
    }
    public function messages()
    {

        return [
            //

            'name.required' => 'Il campo nome è richiesto',
            'name.max' => 'Il campo nome deve avere massimo :max caratteri',
            'category.required' => 'Il campo categoria deve essere obbligatorio',
            'category.max' => 'Il campo categoria deve avere massimo :max caratteri',
            'type.required' => 'Il campo tipo deve essere obbligatorio',
            'type.max' => 'Il campo tipo deve avere massimo :max caratteri',
            'weight.required' => 'Il campo peso deve essere obbligatorio',
            'weight.max' => 'Il campo peso deve avere massimo :max caratteri',
            'cost.required' => 'Il campo costo deve essere obbligatorio',
            'cost.max' => 'Il campo costo deve avere massimo :max caratteri',
            "img.image" => 'Il file caricato deve essere di tipo image',
            "img.max" => 'Il file caricato deve pesare massimo 1mb',
        ];
    }
}
