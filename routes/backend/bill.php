<?php

use App\Models\Bill;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\BillController;

Route::group([
    'prefix' => 'bill',
    'as' => 'bill.',
    // 'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    'middleware' => 'permission:admin.access.bill',
], function () {
    Route::get('/', [BillController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Bill Management'), route('admin.bill.index'));
        });

    Route::get('create', [BillController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.bill.index')
                ->push(__('Create Bill'), route('admin.bill.create'));
        });

    Route::post('/', [BillController::class, 'store'])->name('store');

    Route::group(['prefix' => '{bill}'], function () {
        Route::get('edit', [BillController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Bill $bill) {
                $trail->parent('admin.bill.index')
                    ->push(__('Editing :bill', ['bill' => $bill->name]), route('admin.bill.edit', $bill));
            });

        Route::patch('/', [BillController::class, 'update'])->name('update');
        Route::delete('/', [BillController::class, 'destroy'])->name('destroy');
    });
});