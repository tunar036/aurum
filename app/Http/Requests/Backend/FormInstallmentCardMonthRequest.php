<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class FormInstallmentCardMonthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => $this->has('status') ? '1' : '0',
        ]);
    }

    public function rules()
    {
        $return[] = [
            'installment_card_id' => ['required','exists:installment_cards,id'],
            'month' => ['required'],
            'status' => ['required'],
        ];

        return Arr::collapse($return);
    }
}
