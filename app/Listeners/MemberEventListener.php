<?php

namespace App\Listeners;

use App\Events\Member\MemberCreated;
use App\Events\Member\MemberDeleted;
use App\Events\Member\MemberUpdated;

/**
 * Class MemberEventListener.
 */
class MemberEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        activity('member')
            ->performedOn($event->member)
            // ->withProperties([
            //     'member' => [
            //         'type' => $event->member->type,
            //         'name' => $event->member->name,
            //         'email' => $event->member->email,
            //         'active' => $event->member->active,
            //         'email_verified_at' => $event->member->email_verified_at,
            //     ],
            // ])
            // ->log(':causer.name created member :subject.name with roles: :properties.roles and permissions: :properties.permissions');
            ->log('Registered a new member');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        activity('member')
            ->performedOn($event->member)
            // ->withProperties([
            //     'member' => [
            //         'type' => $event->member->type,
            //         'name' => $event->member->name,
            //         'email' => $event->member->email,
            //     ],
            //     'roles' => $event->member->roles->count() ? $event->member->roles->pluck('name')->implode(', ') : 'None',
            //     'permissions' => $event->member->permissions ? $event->member->permissions->pluck('description')->implode(', ') : 'None',
            // ])
            // ->log(':causer.name updated member :subject.name with roles: :properties.roles and permissions: :properties.permissions');
            ->log('Updated new profile');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        activity('member')
            ->performedOn($event->member)
            ->log(':causer.name deleted member :subject.name');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            MemberCreated::class,
            'App\Listeners\MemberEventListener@onCreated'
        );

        $events->listen(
            MemberUpdated::class,
            'App\Listeners\MemberEventListener@onUpdated'
        );

        // $events->listen(
        //     MemberDeleted::class,
        //     'App\Listeners\MemberEventListener@onDeleted'
        // );
    }
}
