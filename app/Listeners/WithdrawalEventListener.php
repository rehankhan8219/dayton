<?php

namespace App\Listeners;

use App\Events\Withdrawal\WithdrawalCreated;
use App\Events\Withdrawal\WithdrawalStatusUpdated;

/**
 * Class WithdrawalEventListener.
 */
class WithdrawalEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        activity('withdrawal')
            ->performedOn($event->withdrawal)
            ->log('Request to withdraw IDR '.formatAmount($event->withdrawal->amount));
    }

    /**
     * @param $event
     */
    public function onStatusUpdated($event)
    {
        // activity('withdrawal')
        //     ->performedOn($event->withdrawal)
        //     ->log(':causer.name updated withdrawal');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            WithdrawalCreated::class,
            'App\Listeners\WithdrawalEventListener@onCreated'
        );

        $events->listen(
            WithdrawalStatusUpdated::class,
            'App\Listeners\WithdrawalEventListener@onStatusUpdated'
        );
    }
}
