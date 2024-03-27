<?php

use App\Http\Controllers\Frontend\BrokerController;

Route::group([
    'prefix' => 'brokers',
    'as' => 'broker.',
], function(){
    Route::get('/', [BrokerController::class, 'index'])->name('index');
    Route::get('/create', [BrokerController::class, 'create'])->name('create');
    Route::post('/store', [BrokerController::class, 'store'])->name('store');
    Route::patch('/update', [BrokerController::class, 'update'])->name('update');

    Route::group([
        'prefix' => '{broker}',
    ], function(){
        Route::get('/edit', [BrokerController::class, 'edit'])->name('edit');
        Route::patch('/update', [BrokerController::class, 'update'])->name('update');
        // Route::delete('/delete', [BrokerController::class, 'delete'])->name('delete');
    });
});