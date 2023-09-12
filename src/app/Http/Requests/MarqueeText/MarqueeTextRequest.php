<?php

namespace App\Http\Requests\MarqueeText;

use Illuminate\Foundation\Http\FormRequest;

class MarqueeTextRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:20'
        ];
    }

    public function rulesForCreate()
    {
        return [
            'name' => 'required|string|max:20'
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'name' => 'required|string|max:20'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field may not be greater than :max characters.',
        ];
    }
}
