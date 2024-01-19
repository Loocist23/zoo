<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class AnimalStoreRequest extends FormRequest
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
            'name' => 'required|string|max:55',
            "sex" =>'required|boolean',
            'birthday' => 'required|date|before_or_equal:today',
            'death' => 'nullable|date|after_or_equal:birthday',
            'specie_name' => 'required|exists:species,name'
        ];
    }
}
