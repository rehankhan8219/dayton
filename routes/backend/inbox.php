<?php

use App\Models\Inbox;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\InboxController;

Route::group([
    'prefix' => 'inbox',
    'as' => 'inbox.',
    'middleware' => 'permission:admin.access.inbox',
], function () {
    Route::get('/', [InboxController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Inbox Management'), route('admin.inbox.index'));
        });
});