<?php

namespace App\Listeners;

use App\Events\Broker\BrokerCreated;
use App\Events\Broker\BrokerDeleted;
use App\Events\Broker\BrokerUpdated;

/**
 * Class BrokerEventListener.
 */
class BrokerEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        activity('broker')
            ->performedOn($event->broker)
            ->log('Broker created :subject.broker_id');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        activity('broker')
            ->performedOn($event->broker)
            ->log('Broker updated :subject.broker_id');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        activity('broker')
            ->performedOn($event->broker)
            ->log('Broker deleted :subject.broker_id');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            BrokerCreated::class,
            'App\Listeners\BrokerEventListener@onCreated'
        );

        $events->listen(
            BrokerUpdated::class,
            'App\Listeners\BrokerEventListener@onUpdated'
        );

        $events->listen(
            BrokerDeleted::class,
            'App\Listeners\BrokerEventListener@onDeleted'
        );
    }
}
