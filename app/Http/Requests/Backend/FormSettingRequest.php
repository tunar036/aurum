<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class FormSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'name'      => 'required|max:30',
            'slug'      => 'required|max:255',
            'content'   => 'nullable',
        ];
    }

    public function attributes()
    {
        return [

            'name'      => trans('backend.labels.name'),
            'content'   => trans('backend.labels.content'),
            'content.*' => trans('backend.labels.content')
        ];
    }
}
