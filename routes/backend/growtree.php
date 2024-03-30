<?php

use App\Models\GrowTree;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\GrowTreeController;

Route::group([
    'prefix' => 'growtree',
    'as' => 'growtree.',
    // 'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    'middleware' => 'permission:admin.access.grow_tree',
], function () {
    Route::get('/', [GrowTreeController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Grow Tree Management'), route('admin.growtree.index'));
        });

    Route::get('create', [GrowTreeController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.growtree.index')
                ->push(__('Create Grow Tree'), route('admin.growtree.create'));
        });

    Route::post('/', [GrowTreeController::class, 'store'])->name('store');

    Route::group(['prefix' => '{growtree}'], function () {
        Route::get('edit', [GrowTreeController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, GrowTree $growtree) {
                $trail->parent('admin.growtree.index')
                    ->push(__('Editing :growtree', ['growtree' => $growtree->name]), route('admin.growtree.edit', $growtree));
            });

        Route::patch('/', [GrowTreeController::class, 'update'])->name('update');
        Route::delete('/', [GrowTreeController::class, 'destroy'])->name('destroy');
    });
});