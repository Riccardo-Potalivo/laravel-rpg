<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
            'img' => 'nullable|image|max:1024'

        ];
    }
    public function messages(): array
    {
        return [
            //
            'name.required' => 'Il campo nome è richiesto',
            'name.max' => 'Il campo nome deve avere massimo :max caratteri',
            "img.image" => 'Il file caricato deve essere di tipo image',
            "img.max" => 'Il file caricato deve pesare massimo 1mb',

        ];
    }
}
