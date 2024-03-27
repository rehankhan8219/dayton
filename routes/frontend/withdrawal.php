<?php

use App\Models\Withdrawal;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Frontend\WithdrawalController;

Route::group([
    'prefix' => 'withdrawal',
    'as' => 'withdrawal.',
    'middleware' => ['auth', 'is_user'],
], function () {
    Route::get('/', [WithdrawalController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent(homeRoute())
                ->push(__('Withdrawal Management'), route('frontend.withdrawal.index'));
        });

    Route::get('create', [WithdrawalController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.withdrawal.index')
                ->push(__('Create Withdrawal'), route('frontend.withdrawal.create'));
        });

    Route::post('/', [WithdrawalController::class, 'store'])->name('store');

    Route::get('/request-submitted', [WithdrawalController::class, 'showRequestSubmittedPage'])
        ->name('submitted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.withdrawal.create')
                ->push(__('Withdrawal Request Submitted'), route('frontend.withdrawal.submitted'));
        });
});