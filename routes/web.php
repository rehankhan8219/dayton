<?php

use Illuminate\Support\Facades\Route;

Route::impersonate();

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    require __DIR__.'/auth.php';
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
* Backend Routes
*
* These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    require __DIR__.'/auth.php';
    Route::group(['middleware' => 'admin'], function () {
        includeRouteFiles(__DIR__.'/backend/');
    });
});