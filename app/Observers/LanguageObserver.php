<?php

namespace App\Observers;

use App\Models\Language;

class LanguageObserver
{
    public function created(Language $language)
    {
        cache()->forget('active_langs');
        cache()->forget('default_langs');
    }

    public function updated(Language $language)
    {
        cache()->forget('active_langs');
        cache()->forget('default_langs');
    }

    public function deleted(Language $language)
    {
        cache()->forget('active_langs');
        cache()->forget('default_langs');
    }

    public function restored(Language $language)
    {}

    public function forceDeleted(Language $language)
    {}
}
