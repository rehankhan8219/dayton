<?php

use App\Models\HelpCenter;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\HelpCenterController;

Route::group([
    'prefix' => 'helpcenter',
    'as' => 'helpcenter.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', [HelpCenterController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Help Center Management'), route('admin.helpcenter.index'));
        });

    Route::get('create', [HelpCenterController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.helpcenter.index')
                ->push(__('Create Help Center'), route('admin.helpcenter.create'));
        });

    Route::post('/', [HelpCenterController::class, 'store'])->name('store');

    Route::group(['prefix' => '{helpcenter}'], function () {
        Route::get('edit', [HelpCenterController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, HelpCenter $helpcenter) {
                $trail->parent('admin.helpcenter.index')
                    ->push(__('Editing :helpcenter', ['helpcenter' => $helpcenter->name]), route('admin.helpcenter.edit', $helpcenter));
            });

        Route::patch('/', [HelpCenterController::class, 'update'])->name('update');
        Route::delete('/', [HelpCenterController::class, 'destroy'])->name('destroy');
    });
});