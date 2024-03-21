<?php

use App\Models\PayAccount;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\PayAccountController;

Route::group([
    'prefix' => 'payaccount',
    'as' => 'payaccount.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', [PayAccountController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Pay Account Management'), route('admin.payaccount.index'));
        });

    Route::get('create', [PayAccountController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.payaccount.index')
                ->push(__('Create Pay Account'), route('admin.payaccount.create'));
        });

    Route::post('/', [PayAccountController::class, 'store'])->name('store');

    Route::group(['prefix' => '{payaccount}'], function () {
        Route::get('edit', [PayAccountController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, PayAccount $payaccount) {
                $trail->parent('admin.payaccount.index')
                    ->push(__('Editing :payaccount', ['payaccount' => $payaccount->name]), route('admin.payaccount.edit', $payaccount));
            });

        Route::patch('/', [PayAccountController::class, 'update'])->name('update');
        Route::delete('/', [PayAccountController::class, 'destroy'])->name('destroy');
    });
});