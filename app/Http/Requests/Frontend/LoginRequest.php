<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'email'    => 'required|email|max:40',
            'password' => 'required|min:8'
        ];
    }

    public function attributes()
    {
        return [

            'email'    => trans('frontend.labels.email'),
            'password' => trans('frontend.labels.password')
        ];
    }
}