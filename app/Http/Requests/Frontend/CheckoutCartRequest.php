<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CheckoutCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $return [] = [
            'payment_method_id' => 'required|exists:payment_methods,id',
            'delivery_method_id' => 'required|exists:delivery_methods,id',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required_if:delivery_method_id,==,2|max:1000',
            'phone' => 'required|max:15',
            'email' => 'email|max:120,unique:users,phone',
            'more_info' => 'nullable|string|max:1000',
        ];

        return Arr::collapse($return);

    }

}
