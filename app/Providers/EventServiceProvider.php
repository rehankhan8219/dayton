<?php

namespace App\Providers;

use App\Models\Withdrawal;
use App\Listeners\UserEventListener;
use App\Listeners\BrokerEventListener;
use App\Listeners\MemberEventListener;
use Illuminate\Auth\Events\Registered;
use App\Listeners\WithdrawalEventListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        UserEventListener::class,
        MemberEventListener::class,
        BrokerEventListener::class,
        WithdrawalEventListener::class,
    ];
}
