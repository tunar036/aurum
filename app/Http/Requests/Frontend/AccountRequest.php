<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'fullname'     => 'required|max:30|regex:/^([^0-9]*)$/',
            'email'        => 'required|email|max:40',
            'phone_number' => 'required|numeric|digits_between:1,20'
        ];
    }

    public function attributes()
    {
        return [

            'fullname'     => trans('frontend.labels.fullname'),
            'email'        => trans('frontend.labels.email'),
            'phone_number' => trans('frontend.labels.phone_number')
        ];
    }
}