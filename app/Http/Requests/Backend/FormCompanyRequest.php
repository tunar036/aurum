<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormCompanyRequest extends FormRequest
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

        foreach ($active_langs as $lang){
            $this->merge([
                'keywords:' . $lang['code'] => request('keywords:'.$lang['code']) ?  implode(', ', array_column(json_decode(request('keywords:'.$lang['code'])), 'value')) : null,
            ]);
        }

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
                'slug:' . $lang['code'] => ['max:60', Rule::unique('category_translations','slug')],
                'title:' . $lang['code'] => ['required', 'max:255'],
                'description:' . $lang['code'] => ['required', 'max:255'],
                'keywords:' . $lang['code'] => ['required', 'max:255'],
                'features' => 'required',
                'features.*' => 'exists:features,id',
            ];

            // For Update
            if ($this->filled('_method') && $this->get('_method') == 'PUT') {
                $return[] = [
                    'slug:' . $lang['code'] => ['required','max:60', Rule::unique('company_translations','slug')->ignore($this->company->id, 'company_id')],
                ];
            }
        }

        $return[] = [
//            'parent_id' => 'required',
//            'mega' => 'nullable',
//            'icon' => 'required_if:parent_id,0|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

//            'home' => ['required'],
            'status' => ['required'],
        ];

        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
//                'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ];
        }


        return Arr::collapse($return);
    }
}
