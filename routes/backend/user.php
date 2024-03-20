<?php

use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Models\User;

// All route names are prefixed with 'admin.'.
Route::group([
    'prefix' => 'user',
    'as' => 'user.'
], function(){
    Route::group([
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function(){
        Route::get('/create', [UserController::class, 'create'])
            ->name('create')
            ->breadcrumbs(fn (Trail $trail) => $trail->parent('admin.user.index')->push(__('Create User'), route('admin.user.create')));
        
        Route::post('/store', [UserController::class, 'store'])->name('store');

        Route::group(['prefix' => '{user}'], function(){
            Route::get('/edit', [UserController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(fn (Trail $trail, User $user) => $trail->parent('admin.user.index')->push(__('Edit User'), route('admin.user.edit', $user)));
            
            Route::patch('/update', [UserController::class, 'update'])->name('update');
            Route::delete('/delete', [UserController::class, 'delete'])->name('delete');

        });
    });
    
    Route::group([
        'middleware' => 'permission:admin.access.user.list|admin.access.user.deactivate|admin.access.user.reactivate|admin.access.user.clear-session|admin.access.user.impersonate|admin.access.user.change-password',
    ], function(){
        Route::get('/', [UserController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.access.user.list|admin.access.user.deactivate|admin.access.user.clear-session|admin.access.user.impersonate|admin.access.user.change-password')
            ->breadcrumbs(fn (Trail $trail) => $trail->parent(homeRoute())->push(__('Users'), route('admin.user.index')));

        Route::group(['prefix' => '{user}'], function(){
            Route::get('/', [UserController::class, 'show'])
                ->name('show')
                ->middleware('permission:admin.access.user.list')
                ->breadcrumbs(fn (Trail $trail, User $user) => $trail->parent('admin.user.index')->push(__('View User'), route('admin.user.show', $user)));

            Route::post('clear-session', [UserController::class, 'clearSession'])
                ->name('clear-session')
                ->middleware('permission:admin.access.user.clear-session');

            Route::patch('mark/{status}', [UserController::class, 'updateActiveStatus'])
                ->name('mark')
                ->where(['status' => '[0,1]'])
                ->middleware('permission:admin.access.user.deactivate|admin.access.user.reactivate');

            Route::get('password/change', [UserController::class, 'showEditPasswordForm'])
                ->name('change-password')
                ->middleware('permission:admin.access.user.change-password')
                ->breadcrumbs(function (Trail $trail, User $user) {
                    $trail->parent('admin.user.index')
                        ->push(__('Change Password'), route('admin.user.change-password', $user));
                });

            Route::patch('password/change', [UserController::class, 'updatePassword'])
                ->name('change-password.update')
                ->middleware('permission:admin.access.user.change-password');
        });
    });
});
