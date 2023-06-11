<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypedTextsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => 'required|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'The text field is required.',
            'text.string' => 'The text field must be a string.',
            'text.max' => 'The text field may not be greater than :max characters.',
        ];
    }
}
