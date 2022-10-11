<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormProductStatusRequest extends FormRequest
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
                'name:' . $lang['code'] => ['required', 'max:255'],
                'slug:' . $lang['code'] => ['max:255'],

            ];

        }

        $return[] = [
            'status' => ['required'],
        ];

        return Arr::collapse($return);
    }

    public function attributes()
    {
        return [

            'name'   => trans('backend.labels.name'),
            'name.*' => trans('backend.labels.name')
        ];
    }
}
