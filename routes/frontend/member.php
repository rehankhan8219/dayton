<?php

use App\Http\Controllers\Frontend\MemberPagesController;

/** All route names are prefixed with 'frontend.'.
 *  These routes can only be accessed by users with type `user`
 */
Route::group(['as' => 'member.', 'middleware' => ['auth', 'is_user']], function () {
    Route::get('/home', [MemberPagesController::class, 'home'])->name('home');
    Route::get('/broker-list', [MemberPagesController::class, 'brokerList'])->name('broker-list');
    Route::get('/add-account', [MemberPagesController::class, 'addAccount'])->name('add-account');
    Route::get('/pay-now', [MemberPagesController::class, 'payNow'])->name('pay-now');
    Route::get('/grow-team-page', [MemberPagesController::class, 'growTeamPage'])->name('grow-team-page');
});