<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class FormLanguageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'default' => $this->has('default') ? '1' : '0',
            'status' => $this->has('status') ? '1' : '0',
        ]);
    }

    public function rules()
    {
        $return[] = [
            'name' => 'required|max:20|regex:/^([^0-9]*)$/|unique:language',
            'code' => 'required|alpha|size:2|unique:language',
            'status' => ['required', 'boolean'],
            'default' => ['required', 'boolean'],
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
                'name' => ['required','max:20','regex:/^([^0-9]*)$/',Rule::unique('language')->ignore( $this->language->id )],
                'code' => ['required','alpha','size:2',Rule::unique('language')->ignore( $this->language->id )],
            ];
        }

        return Arr::collapse($return);


    }

    public function attributes()
    {
        return [

            'name' => trans('backend.labels.name'),
            'code' => trans('backend.labels.code')
        ];
    }
}
