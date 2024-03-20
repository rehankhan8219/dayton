<?php

use App\Models\Role;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\RoleController;

Route::group([
    'prefix' => 'role',
    'as' => 'role.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', [RoleController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Role Management'), route('admin.role.index'));
        });

    Route::get('create', [RoleController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.role.index')
                ->push(__('Create Role'), route('admin.role.create'));
        });

    Route::post('/', [RoleController::class, 'store'])->name('store');

    Route::group(['prefix' => '{role}'], function () {
        Route::get('edit', [RoleController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Role $role) {
                $trail->parent('admin.role.index')
                    ->push(__('Editing :role', ['role' => $role->name]), route('admin.role.edit', $role));
            });

        Route::patch('/', [RoleController::class, 'update'])->name('update');
        Route::delete('/', [RoleController::class, 'destroy'])->name('destroy');
    });
});