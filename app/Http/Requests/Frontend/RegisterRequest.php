<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'fullname'     => 'required|max:30|regex:/^([^0-9]*)$/',
            'email'        => 'required|email|max:40|unique:users',
            'phone_number' => 'required|numeric|digits_between:1,20',
            'password'     => 'required|min:8|confirmed',
            'city'         => 'required|max:50',
            'address'      => 'required'
        ];
    }

    public function attributes()
    {
        return [

            'fullname'     => trans('frontend.labels.fullname'),
            'email'        => trans('frontend.labels.email'),
            'phone_number' => trans('frontend.labels.phone_number'),
            'password'     => trans('frontend.labels.password'),
            'city'         => trans('frontend.labels.city'),
            'address'      => trans('frontend.labels.address')
        ];
    }
}
