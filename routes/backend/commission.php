<?php

use App\Models\Commission;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\CommissionController;

Route::group([
    'prefix' => 'commission',
    'as' => 'commission.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', [CommissionController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Commission Management'), route('admin.commission.index'));
        });

    Route::get('create', [CommissionController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.commission.index')
                ->push(__('Create Commission'), route('admin.commission.create'));
        });

    Route::post('/', [CommissionController::class, 'store'])->name('store');

    Route::group(['prefix' => '{commission}'], function () {
        Route::get('edit', [CommissionController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Commission $commission) {
                $trail->parent('admin.commission.index')
                    ->push(__('Editing :commission', ['commission' => $commission->name]), route('admin.commission.edit', $commission));
            });

        Route::patch('/', [CommissionController::class, 'update'])->name('update');
        Route::delete('/', [CommissionController::class, 'destroy'])->name('destroy');
    });
});