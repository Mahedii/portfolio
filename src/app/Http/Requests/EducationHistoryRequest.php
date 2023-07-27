<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationHistoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:50',
            'title_description' => 'required|string|max:500',
        ];
    }

    public function rulesForCreate()
    {
        return [
            'title' => 'required|string|max:50',
            'title_description' => 'required|string|max:500',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => 'required|string|max:50',
            'title_description' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title field may not be greater than :max characters.',
            'title_description.required' => 'The description field is required.',
            'title_description.string' => 'The description field must be a string.',
            'title_description.max' => 'The description field may not be greater than :max characters.',
        ];
    }
}
