<?php

use App\Http\Controllers\Backend\LevelController;

Route::group([
    'prefix' => 'level',
    'as' => 'level.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::post('/', [LevelController::class, 'store'])->name('store');
});