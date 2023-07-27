<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationHistoryListRequest extends FormRequest
{
    public function rules()
    {
        return [
            'institute_name' => 'required|string|max:30',
            'degree' => 'required|string|max:50',
            'year' => 'required|string|max:50',
        ];
    }

    public function rulesForCreate()
    {
        return [
            'institute_name' => 'required|string|max:30',
            'degree' => 'required|string|max:50',
            'year' => 'required|string|max:50',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'institute_name' => 'required|string|max:30',
            'degree' => 'required|string|max:50',
            'year' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'institute_name.required' => 'The institute name field is required.',
            'institute_name.string' => 'The institute name field must be a string.',
            'institute_name.max' => 'The institute name may not be greater than :max characters.',
            'degree.required' => 'The degree field is required.',
            'degree.string' => 'The degree field must be a string.',
            'degree.max' => 'The degree field may not be greater than :max characters.',
            'year.required' => 'The year field is required.',
            'year.string' => 'The year field must be a string.',
            'year.max' => 'The year field may not be greater than :max characters.',
        ];
    }
}
