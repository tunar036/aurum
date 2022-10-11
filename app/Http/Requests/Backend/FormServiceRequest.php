<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        // foreach ($active_langs as $lang){
        //     $this->merge([
        //         'keywords:' . $lang['code'] => request('keywords:'.$lang['code']) ?  implode(', ', array_column(json_decode(request('keywords:'.$lang['code'])), 'value')) : null,
        //     ]);
        // }

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
                'name:' . $lang['code'] => ['required', 'max:60'],
                'description:' . $lang['code'] => ['required', 'max:255'],
            ];

        }

        $return[] = [
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => ['required'],
        ];

        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
                'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ];
        }


        return Arr::collapse($return);
    }
}