<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string|max:250',
            'message' => 'required|string',
        ];
    }

    public function rulesForCreate()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string|max:250',
            'message' => 'required|string',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string|max:250',
            'message' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
        ];
    }
}
