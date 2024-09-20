<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // true because we are not dealing with ACL validation yet
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'subject' => 'required|min:3|max:255|unique:supports',
            'body' => [
                'required',
                'min:3',
                'max:10000'
            ],
        ];

        if ($this->method() === 'PUT') {
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                // "unique:supports,subject,{$this->id},id"
                Rule::unique('supports')->ignore($this->id), // Informa que é único na tabela 'supports', entretanto  pode ignorar esse id.
            ];
        }

        return $rules;
    }
}
