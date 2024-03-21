<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;

Route::group(['as' => 'page.'], function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
    Route::get('/product', [PageController::class, 'product'])->name('product');
    Route::get('/career', [PageController::class, 'career'])->name('career');
});

