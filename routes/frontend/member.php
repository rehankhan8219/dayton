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
    Route::get('/withdraw', [MemberPagesController::class, 'withDraw'])->name('withdraw');
    Route::get('/withdraw-request-submit', [MemberPagesController::class, 'withdrawRequestSubmit'])->name('withdraw-request-submit');
    Route::get('/withdraw-to-history', [MemberPagesController::class, 'withdrawToHistory'])->name('withdraw-to-history');
    Route::get('/commision-report', [MemberPagesController::class, 'commisionReport'])->name('commision-report');
    Route::get('/profile', [MemberPagesController::class, 'Profile'])->name('profile');
    Route::get('/contact-us', [MemberPagesController::class, 'contactUs'])->name('contact-us');
    Route::get('/help-center', [MemberPagesController::class, 'helpCenter'])->name('help-center');
});