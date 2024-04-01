<?php

use App\Http\Controllers\Frontend\BillController;

Route::group([
    'prefix' => 'bill',
    'as' => 'bill.',
], function(){
    Route::get('/pay-now', [BillController::class, 'index'])->name('index');
    Route::post('/store', [BillController::class, 'store'])->name('store');
    Route::get('/thanks', [BillController::class, 'showThanksPage'])->name('thanks');
    Route::get('/history', [BillController::class, 'paymentHistory'])->name('history');
});