<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use Translatable, SpatieLogsActivity;

    protected $fillable = ['status'];
    public $translatedAttributes = ['question', 'answer'];
    public $with = ['translations'];

    public function getTransQuestionAttribute()
    {
        return ucfirst($this->translate(config('app.locale'))['question'])
            ?? ucfirst($this->translate(config('app.fallback_locale'))['question']);
    }

    public function getTransAnswerAttribute()
    {
            return ucfirst($this->translate(config('app.locale'))['answer'])
                ?? ucfirst($this->translate(config('app.fallback_locale'))['answer']);
    }


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
