<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Translatable, TranslatableColumnsTrait, Sortable, SpatieLogsActivity;

    protected $fillable = ['status'];
    public $translatedAttributes = ['name','page_title', 'title', 'description', 'keywords','text'];
    public $with = ['translations'];

    public function getTransPageTitleAttribute()
    {
        return $this->translate(config('app.locale'))['page_title']
            ?? $this->translate(config('app.fallback_locale'))['page_title'];
    }

}
