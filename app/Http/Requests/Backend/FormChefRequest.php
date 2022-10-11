<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;

class FormChefRequest extends FormRequest
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
        // For Store

        $return[] = [

            'name' => ['required', 'max:80', 'regex:/^([^0-9]*)$/'],
            'position' => ['required', 'max:80', 'regex:/^([^0-9]*)$/'],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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
