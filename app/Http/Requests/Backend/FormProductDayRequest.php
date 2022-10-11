<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormProductDayRequest extends FormRequest
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
        $return = [];

        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        foreach ($active_langs as $lang){
            $return[] = [
                'title:' . $lang['code'] => ['required','max:255', Rule::unique('product_day_translations','title')],
            ];

            // For Update
            if ($this->filled('_method') && $this->get('_method') == 'PUT') {
                $return[] = [
                    'title:' . $lang['code'] => ['required','max:255',Rule::unique('product_day_translations','title')->ignore($this->product_day)],
                ];
            }
        }

        $return[] =  [
            'product_id' => 'required|exists:products,id',
            'expired_at' => ['required','date', 'after:' . now()->format('d.m.Y H:i:s')],
        ];

        return Arr::collapse($return);

    }


}
