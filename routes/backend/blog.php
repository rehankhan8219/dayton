<?php

use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BlogController;

// All route names are prefixed with 'admin.'.
Route::group([
    'prefix' => 'blog',
    'as' => 'blog.'
], function(){
    Route::group([
        'middleware' => 'permission:admin.access.blog',
    ], function(){
        Route::get('/', [BlogController::class, 'index'])
            ->name('index')
            ->breadcrumbs(fn (Trail $trail) => $trail->parent(homeRoute())->push(__('Blogs'), route('admin.blog.index')));

        Route::patch('{blog}/update', [BlogController::class, 'update'])
            ->name('update');
    });
});
