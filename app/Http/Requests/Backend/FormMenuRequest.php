<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;


class FormMenuRequest extends FormRequest
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
            'positions' => json_encode(request('positions')),
        ]);
    }



    public function rules(): array
    {
        // dd($this->all());
        $return = [];

        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        foreach ($active_langs as $lang){
            $return[] = [
                'name:' . $lang['code'] => ['required', 'max:50'],
                'slug:' . $lang['code'] => ['max:60'],
                'title:' . $lang['code'] => ['required', 'max:255'],
                'description:' . $lang['code'] => ['required', 'max:255'],
                'keywords:' . $lang['code'] => ['required', 'max:255'],
                'text:' . $lang['code'] => ['present'],
            ];
        }

        $return[] = [
//            'parent_id' => ['required','integer'],
            'positions' => 'required',
            'status' => 'required',
            'background_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
//                'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'background_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'about_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'slug:' . $lang['code'] => ['required','max:50']
                // 'slug' => 'unique:table,column_to_check,value_to_ignore',
            ];
        }

        return Arr::collapse($return);

    }
}
