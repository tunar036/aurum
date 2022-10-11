<?php

namespace App\Observers;


use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        cache()->forget('counts');
    }

    public function updated(User $user)
    {
        cache()->forget('counts');
    }

    public function deleted(User $user)
    {
        cache()->forget('counts');
    }

    public function restored(User $user)
    {}

    public function forceDeleted(User $user)
    {}
}
