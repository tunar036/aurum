<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'fullname' => 'required|max:50',
            'city'     => 'required|max:50',
            'address'  => 'required'
        ];
    }

    public function attributes()
    {
        return [

            'fullname' => trans('frontend.labels.fullname'),
            'city'     => trans('frontend.labels.city'),
            'address'  => trans('frontend.labels.address')
        ];
    }
}