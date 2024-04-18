<?php

namespace App\Listeners;

use App\Events\LoginHistoryEvent;
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
    public function handle(LoginHistoryEvent $event): void
    {
        $history = LoginHistory::create([
            'user_id'     => $event->user->id,
        ]);

    }
}
