<?php

namespace App\Observers;

use App\Models\Faq;

class FaqObserver
{
    public function created(Faq $faq)
    {
        cache()->forget('counts');
    }

    public function updated(Faq $faq)
    {
        cache()->forget('counts');
    }

    public function deleted(Faq $faq)
    {
        cache()->forget('counts');
    }

    public function restored(Faq $faq)
    {
        cache()->forget('counts');
    }

    public function forceDeleted(Faq $faq)
    {
        cache()->forget('counts');
    }
}
