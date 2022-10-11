<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CheckoutOneClickRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'color_id' => decrypt($this->color_id),
            'product_id' => decrypt($this->product_id),
        ]);
    }

    public function rules()
    {
        $return [] = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'email|max:120,unique:users,phone',
            'phone' => 'required|max:15',
            'more_info' => 'nullable|string|max:1000',
            'delivery_method_id' => 'required|exists:delivery_methods,id',
            'district_id' => 'required_if:delivery_method_id,==,1',
            'address' => 'required_if:delivery_method_id,==,2|max:1000',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'credit_month_id'=>'required_if:payment_method_id,==,1',
            'installment_card_id' => 'required_if:payment_method_id,==,2',
            'installment_card_month_id' => 'required_if:payment_method_id,==,2',
        ];

        return Arr::collapse($return);

    }

}
