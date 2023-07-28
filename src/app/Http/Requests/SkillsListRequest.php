<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillsListRequest extends FormRequest
{
    public function rules()
    {
        return [
            'skill_name' => 'required|string|max:50',
            'icon_name' => 'required|string|max:20|nullable',
        ];
    }

    public function rulesForCreate()
    {
        return [
            'skill_name' => 'required|string|max:50',
            'icon_name' => 'required|string|max:20|nullable',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'skill_name' => 'required|string|max:50',
            'icon_name' => 'string|max:20|nullable',
        ];
    }

    public function messages()
    {
        return [
            'skill_name.required' => 'The skill name field is required.',
            'skill_name.string' => 'The skill name field must be a string.',
            'skill_name.max' => 'The skill name field may not be greater than :max characters.',
            'icon_name.string' => 'The icon name field must be a string.',
            'icon_name.max' => 'The icon name field may not be greater than :max characters.',
        ];
    }
}
