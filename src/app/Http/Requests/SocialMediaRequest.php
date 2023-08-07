<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'url' => 'required|string|max:100',
            'icon_name' => 'required|string|max:20|nullable',
        ];
    }

    public function rulesForCreate()
    {
        return [
            'name' => 'required|string|max:50',
            'url' => 'required|string|max:100',
            'icon_name' => 'required|string|max:20|nullable',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'name' => 'required|string|max:50',
            'url' => 'required|string|max:100',
            'icon_name' => 'string|max:20|nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field may not be greater than :max characters.',
            'url.required' => 'The url field is required.',
            'icon_name.required' => 'The icon name field is required.',
            'icon_name.string' => 'The icon name field must be a string.',
            'icon_name.max' => 'The icon name field may not be greater than :max characters.',
        ];
    }
}
