<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Events\Dispatcher;

class UserEventListener
{
    /**
     * Handle user login events.
     */
    public function onLoggedIn($event): void
    {
        // Update the logging in users time & IP
        $event->user->update([
            'last_login_at' => now(),
            'last_login_ip' => request()->getClientIp(),
        ]);
    }
 
    /**
     * Register the listeners for the subscriber.
     *
     * @return array<string, string>
     */
    public function subscribe(): array
    {
        return [
            UserLoggedIn::class => 'onLoggedIn',
        ];
    }
}
