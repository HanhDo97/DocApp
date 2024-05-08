<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use App\Models\LoginHistory;

class LoginHistoryListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoginEvent $event): void
    {
        $history = LoginHistory::create([
            'user_id'     => $event->user->id,
        ]);

    }
}
