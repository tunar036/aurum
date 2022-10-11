<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class FormPageRequest extends FormRequest
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
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        foreach ($active_langs as $lang){
            $return[] = [
                'name:' . $lang['code'] => ['required', 'max:30'],
                'page_title:' . $lang['code'] => ['required', 'max:255'],
                'title:' . $lang['code'] => ['required', 'max:255'],
                'description:' . $lang['code'] => ['required', 'max:255'],
                'keywords:' . $lang['code'] => ['required', 'max:255'],
                'text:' . $lang['code'] => ['present'],
            ];
        }

        $return[] = [
            'status' => ['required'],
        ];

        return Arr::collapse($return);

    }

}
