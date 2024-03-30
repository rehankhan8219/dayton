<?php

use App\Http\Controllers\Backend\HelpCategoryController;

Route::group([
    'prefix' => 'helpcategory',
    'as' => 'helpcategory.',
    // 'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    'middleware' => 'permission:admin.access.grow_tree',
], function () {
    Route::post('/', [HelpCategoryController::class, 'store'])->name('store');
});