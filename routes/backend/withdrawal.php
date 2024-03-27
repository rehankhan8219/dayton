<?php

use App\Models\Withdrawal;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\WithdrawalController;

Route::group([
    'prefix' => 'withdrawal',
    'as' => 'withdrawal.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', [WithdrawalController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Withdrawal Management'), route('admin.withdrawal.index'));
        });

    Route::get('create', [WithdrawalController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.withdrawal.index')
                ->push(__('Create Withdrawal'), route('admin.withdrawal.create'));
        });

    Route::post('/', [WithdrawalController::class, 'store'])->name('store');

    Route::group(['prefix' => '{withdrawal}'], function () {
        Route::patch('mark/{status}', [WithdrawalController::class, 'updateStatus'])
                ->name('mark')
                ->where(['status' => '[1,2]']);
    });
});