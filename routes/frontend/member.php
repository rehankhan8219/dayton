<?php

use App\Http\Controllers\Frontend\MemberController;

/** All route names are prefixed with 'frontend.'.
 *  These routes can only be accessed by users with type `user`
 */
Route::group(['as' => 'member.', 'middleware' => ['auth', 'is_user']], function () {
    Route::get('/home', [MemberController::class, 'home'])->name('home');

    Route::get('/pay-now', [MemberController::class, 'payNow'])->name('pay-now');
    Route::get('/grow-team-page', [MemberController::class, 'growTeamPage'])->name('grow-team-page');
});