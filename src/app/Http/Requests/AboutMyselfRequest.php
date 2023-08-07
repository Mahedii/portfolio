<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutMyselfRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:20',
            'subtitle' => 'required|string|max:150',
            'description' => 'required|string|max:450',
            'file_path' => 'required',
            'file_path' => 'file|mimes:jpeg,png,svg,jpg|max:2048', // Adjust file types and size limit as needed
        ];
    }

    public function rulesForCreate()
    {
        return [
            'title' => 'required|string|max:20',
            'subtitle' => 'required|string|max:150',
            'description' => 'required|string|max:450',
            'file_path' => 'required',
            'file_path' => 'file|mimes:jpeg,png,svg,jpg|max:2048', // Adjust file types and size limit as needed
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => 'required|string|max:20',
            'subtitle' => 'required|string|max:150',
            'description' => 'required|string|max:450',
            'file_path' => 'file|mimes:jpeg,png,svg,jpg|max:2048|nullable', // Adjust file types and size limit as needed
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
            'description.required' => 'The description field is required.',
            'description.string' => 'The description field must be a string.',
            'description.max' => 'The description field may not be greater than :max characters.',
            'file_path.required' => 'This field is required.',
            'file_path.file' => "File format doesn't match, accepted formats are: jpeg, png, svg, jpg",
            'file_path.max' => "File max size can not exceed more than :max kb",
        ];
    }
}
