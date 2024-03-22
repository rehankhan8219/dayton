<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\MemberPagesController;

Route::group(['as' => 'page.'], function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
    Route::get('/product', [PageController::class, 'product'])->name('product');
    Route::get('/career', [PageController::class, 'career'])->name('career');
});

Route::group(['as' => 'member-pages.'], function () {
    Route::get('/home', [MemberPagesController::class, 'home'])->name('home');
    Route::get('/broker-list', [MemberPagesController::class, 'brokerList'])->name('broker-list');
    Route::get('/add-account', [MemberPagesController::class, 'addAccount'])->name('add-account');
    Route::get('/pay-now', [MemberPagesController::class, 'payNow'])->name('pay-now');
    Route::get('/grow-team-page', [MemberPagesController::class, 'growTeamPage'])->name('grow-team-page');
});

