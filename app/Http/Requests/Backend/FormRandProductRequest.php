<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormRandProductRequest extends FormRequest
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
                'title:' . $lang['code'] => ['required','max:255'],
            ];

            // For Update
            if ($this->filled('_method') && $this->get('_method') == 'PUT') {
                $return[] = [
                    'title:' . $lang['code'] => ['required','max:255'],
                ];
            }
        }

        $return[] =  [
            'product_id' => 'required|exists:products,id',
            'status' => ['required'],
        ];

        return Arr::collapse($return);

    }


}
