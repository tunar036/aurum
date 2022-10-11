<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8'
        ];
    }

    public function attributes()
    {
        return [

            'old_password' => trans('frontend.labels.old_password'),
            'new_password' => trans('frontend.labels.new_password')
        ];
    }
}