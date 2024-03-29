<?php

use App\Http\Controllers\Frontend\MemberController;

/** All route names are prefixed with 'frontend.'.
 *  These routes can only be accessed by users with type `user`
 */
Route::group(['as' => 'member.', 'middleware' => ['auth', 'is_user']], function () {
    Route::get('/home', [MemberController::class, 'home'])->name('home');
    
    Route::get('/pay-now', [MemberController::class, 'payNow'])->name('pay-now');
    Route::get('/grow-team-page', [MemberController::class, 'growTeamPage'])->name('grow-team-page');
    Route::get('/withdraw', [MemberController::class, 'withDraw'])->name('withdraw');
    Route::get('/withdraw-request-submit', [MemberController::class, 'withdrawRequestSubmit'])->name('withdraw-request-submit');
    Route::get('/withdraw-to-history', [MemberController::class, 'withdrawToHistory'])->name('withdraw-to-history');
    Route::get('/commision-report', [MemberController::class, 'commisionReport'])->name('commision-report');

    Route::group([
            'prefix' => 'profile',
            'as' => 'profile.',
        ], function(){
            Route::get('/', [MemberController::class, 'profile'])->name('index');
            Route::patch('/update', [MemberController::class, 'updateProfile'])->name('update');
        });

    Route::post('/get-risk-calculation-details', [MemberController::class, 'getRiskCalculationDetails'])->name('get-risk-calculation-details');
    
});

Route::group(['as' => 'member.'], function () {
    Route::get('/help-center', [MemberController::class, 'helpCenter'])->name('help-center');

    Route::group([
            'prefix' => 'contact-us',
            'as' => 'contact-us.',
        ], function(){
            Route::get('/', [MemberController::class, 'contactUs'])->name('index');
            Route::post('/store', [MemberController::class, 'storeContactUs'])->name('store');
        });
});