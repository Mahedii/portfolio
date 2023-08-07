<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactMeInformationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'address' => 'required|string:max:100',
            'phone' => 'required|string:max:14',
        ];
    }

    public function rulesForCreate()
    {
        return [
            'email' => 'required|email',
            'address' => 'required|string:max:100',
            'phone' => 'required|string:max:14',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'email' => 'required|email',
            'address' => 'required|string:max:100',
            'phone' => 'required|string:max:14',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The email field is required.',
        ];
    }
}
