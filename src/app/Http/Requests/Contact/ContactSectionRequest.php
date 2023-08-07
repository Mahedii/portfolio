<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactSectionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:20',
            'subtitle' => 'required|string|max:150',
        ];
    }

    public function rulesForCreate()
    {
        return [
            'title' => 'required|string|max:20',
            'subtitle' => 'required|string|max:150',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => 'required|string|max:120',
            'subtitle' => 'required|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title field may not be greater than :max characters.',
            'subtitle.required' => 'The subtitle field is required.',
            'subtitle.string' => 'The subtitle field must be a string.',
            'subtitle.max' => 'The subtitle field may not be greater than :max characters.',
        ];
    }
}
