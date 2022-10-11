<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormCampaignDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        $return = [];

        $return[] = [
            'campaign_id' => ['required','exists:campaign,id'],
            'campaign_type' => ['required','exists:campaign_types,id'],
            'started_at' => ['required','date', 'after:' . now()->format('d.m.Y H:i:s')],
            'ended_at' => ['required','date', 'after:' . now()->format('d.m.Y H:i:s')],

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
