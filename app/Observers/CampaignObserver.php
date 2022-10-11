<?php

namespace App\Observers;

use App\Models\Campaign;

class CampaignObserver
{
    public function created(Campaign $campaign)
    {
        cache()->forget('counts');
    }

    public function updated(Campaign $campaign)
    {
        cache()->forget('counts');
    }

    public function deleted(Campaign $campaign)
    {
        cache()->forget('counts');
    }

    public function restored(Campaign $campaign)
    {
        cache()->forget('counts');
    }

    public function forceDeleted(Campaign $campaign)
    {
        cache()->forget('counts');
    }
}
