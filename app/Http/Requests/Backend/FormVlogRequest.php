<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormVlogRequest extends FormRequest
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

   public function rules(): array
    {
        $return = [];

        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        foreach ($active_langs as $lang){
            $return[] = [
                'name:' . $lang['code'] => ['required', 'max:255'],
                'slug:' . $lang['code'] => ['max:255', Rule::unique('blog_translations','slug')],
                'title:' . $lang['code'] => ['required', 'max:255'],
                'description:' . $lang['code'] => ['required', 'max:255'],
                'keywords:' . $lang['code'] => ['required', 'max:255'],
                'text:' . $lang['code'] => ['string'],
                'image_alt:' . $lang['code'] => ['nullable', 'max:255'],
            ];

            // For Update
            if ($this->filled('_method') && $this->get('_method') == 'PUT') {
                $return[] = [
                    'slug:' . $lang['code'] => ['required','max:255',Rule::unique('blog_translations','slug')->ignore($this->blog)],
                ];
            }
        }

        $return[] = [
            'link' => ['required', 'max:255'],
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => ['required'],
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
                'image' => 'filled',
            ];
        }

        return Arr::collapse($return);

    }

}
