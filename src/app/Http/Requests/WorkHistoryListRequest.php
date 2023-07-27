<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationHistoryListRequest extends FormRequest
{
    public function rules()
    {
        return [
            'company_name' => 'required|string|max:30',
            'role' => 'required|string|max:50',
            'duration' => 'required|string|max:50',
            'role_description' => 'required|string|max:500',
        ];
    }

    public function rulesForCreate()
    {
        return [
            'company_name' => 'required|string|max:30',
            'role' => 'required|string|max:50',
            'duration' => 'required|string|max:50',
            'role_description' => 'required|string|max:500',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'company_name' => 'required|string|max:30',
            'role' => 'required|string|max:50',
            'duration' => 'required|string|max:50',
            'role_description' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'The company name field is required.',
            'company_name.string' => 'The company name field must be a string.',
            'company_name.max' => 'The company name may not be greater than :max characters.',
            'role.required' => 'The role field is required.',
            'role.string' => 'The role field must be a string.',
            'role.max' => 'The role field may not be greater than :max characters.',
            'duration.required' => 'The duration field is required.',
            'duration.string' => 'The duration field must be a string.',
            'duration.max' => 'The duration field may not be greater than :max characters.',
            'role_description.required' => 'The description field is required.',
            'role_description.string' => 'The description field must be a string.',
            'role_description.max' => 'The description field may not be greater than :max characters.',
        ];
    }
}
