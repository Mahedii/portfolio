<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:10',
            'quote' => 'required|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field may not be greater than :max characters.',
            'quote.required' => 'The quote field is required.',
            'quote.string' => 'The quote field must be a string.',
            'quote.max' => 'The quote field may not be greater than :max characters.',
        ];
    }
}
