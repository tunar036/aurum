<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormProductRequest extends FormRequest
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
//             'discount_price' => !empty(request('discount_number')) ? (request('price') - request('discount_number')) : null,
             'status' => $this->has('status') ? '1' : '0',
        ]);

    }


    public function rules()
    {
// dd($this->all());
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        foreach ($active_langs as $lang) {
            $return[] = [
                'text:' . $lang['code'] => ['required', 'string'],
                'title:' . $lang['code'] => ['required', 'string', 'max:255'],
                'description:' . $lang['code'] => ['required', 'string', 'max:255'],
                'keywords:' . $lang['code'] => ['required', 'string', 'max:255'],
//                'image_alt:' . $lang['code'] => ['nullable', 'max:255'],
            ];
        }

        $return[] = [
            'name'          => 'required|max:255',
            'slug'          => ['max:255', Rule::unique('products','slug')],
            'category_id' => 'required|exists:categories,id',
//            'brand_id' => 'required|exists:brands,id',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'options' => 'nullable',
//            'options.*' => 'exists:options,id',
//            'badges' => 'nullable',
//            'badges.*' => 'exists:badges,id',
//            'colors' => 'required',
//            'colors.color_id.*' => 'exists:colors,id',
//            'credits' => 'required',
//            'credits.*' => 'exists:credits,id',
//            'statuses' => 'nullable',
//            'statuses.*' => 'exists:product_statuses,id',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
//            'discount_number' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
//            'discount_price' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
//            'weight' => 'present',
//            'length' => 'present',
//            'height' => 'present',
//            'width' => 'present',
//            'quantity_type' => 'required|in:1,2,3',
//            'quantity' => 'required_unless:quantity_type,1,2',
//            'points' => 'present|numeric',
//            'minimum' => 'required|numeric',
            'status' => ['required', 'boolean'],
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
                'slug' => ['required','max:255',Rule::unique('products','slug')->ignore($this->product)],
                'image' => 'filled',
            ];
        }

        return Arr::collapse($return);
    }
}
