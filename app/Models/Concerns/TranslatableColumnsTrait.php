<?php

namespace App\Models\Concerns;

use function config;

trait TranslatableColumnsTrait {

    public function getTransNameAttribute()
    {
        return $this->translate(config('app.locale'))['name'] ?? null;
    }

    public function getTransSlugAttribute()
    {
        return $this->translate(config('app.locale'))['slug'] ?? null;
    }
    public function getTransTextAttribute()
    {
        return $this->translate(config('app.locale'))['text'] ?? null;
    }
    public function getTransTitleAttribute()
    {
        return $this->translate(config('app.locale'))['title'] ?? null;
    }
    public function getTransDescriptionAttribute()
    {
        return $this->translate(config('app.locale'))['description'] ?? null;
    }
    public function getTransKeywordsAttribute()
    {
        return $this->translate(config('app.locale'))['keywords'] ?? null;
    }
    public function getTransImageAltAttribute()
    {
        return $this->translate(config('app.locale'))['image_alt'] ?? null;
    }

}
