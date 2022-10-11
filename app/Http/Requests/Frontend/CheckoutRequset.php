<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CheckoutRequset extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $return [] = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:120',
            'phone' => 'required|max:15',
            'more_info' => 'nullable|string|max:1000',
            'delivery_method_id' => 'required|exists:delivery_methods,id',
            'district_id' => 'required_if:delivery_method_id,==,1|exists:districts,id',
            'address' => 'required_if:delivery_method_id,==,2|max:1000',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'installment_card_month_id' => 'required_if:payment_method_id,==,2',
            'credit_month_id'=>'required_if:payment_method_id,==,1',
        ];

        return Arr::collapse($return);

    }
}
