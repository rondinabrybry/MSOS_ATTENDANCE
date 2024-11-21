<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255',
            'student_id' => 'required|string|max:50',
            'rf_id' => 'required|string|max:50',
            'course' => 'required|string',
            'section' => 'required|string',
            'section1' => 'required|string',
            'time_preference' => 'required|string',
        ];
    }
    
}
