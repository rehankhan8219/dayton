<?php

use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RiskCalculatorController;
use App\Models\RiskCalculator;

// All route names are prefixed with 'admin.'.
Route::group([
    'prefix' => 'riskcalculator',
    'as' => 'riskcalculator.'
], function(){
    Route::group([
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function(){
        Route::get('/create', [RiskCalculatorController::class, 'create'])
            ->name('create')
            ->breadcrumbs(fn (Trail $trail) => $trail->parent('admin.riskcalculator.index')->push(__('Create RiskCalculator'), route('admin.riskcalculator.create')));
        
        Route::post('/store', [RiskCalculatorController::class, 'store'])->name('store');

        Route::group(['prefix' => '{riskcalculator}'], function(){
            Route::get('/edit', [RiskCalculatorController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(fn (Trail $trail, RiskCalculator $riskcalculator) => $trail->parent('admin.riskcalculator.index')->push(__('Edit RiskCalculator'), route('admin.riskcalculator.edit', $riskcalculator)));
            
            Route::patch('/update', [RiskCalculatorController::class, 'update'])->name('update');
            Route::delete('/delete', [RiskCalculatorController::class, 'delete'])->name('delete');

        });
    });
    
    Route::group([
        'middleware' => 'permission:admin.access.riskcalculator.list|admin.access.riskcalculator.deactivate|admin.access.riskcalculator.reactivate|admin.access.riskcalculator.clear-session|admin.access.riskcalculator.impersonate|admin.access.riskcalculator.change-password',
    ], function(){
        Route::get('/', [RiskCalculatorController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.access.riskcalculator.list|admin.access.riskcalculator.deactivate|admin.access.riskcalculator.clear-session|admin.access.riskcalculator.impersonate|admin.access.riskcalculator.change-password')
            ->breadcrumbs(fn (Trail $trail) => $trail->parent(homeRoute())->push(__('RiskCalculators'), route('admin.riskcalculator.index')));

        Route::group(['prefix' => '{riskcalculator}'], function(){
            Route::get('/', [RiskCalculatorController::class, 'show'])
                ->name('show')
                ->middleware('permission:admin.access.riskcalculator.list')
                ->breadcrumbs(fn (Trail $trail, RiskCalculator $riskcalculator) => $trail->parent('admin.riskcalculator.index')->push(__('View RiskCalculator'), route('admin.riskcalculator.show', $riskcalculator)));

            Route::post('clear-session', [RiskCalculatorController::class, 'clearSession'])
                ->name('clear-session')
                ->middleware('permission:admin.access.riskcalculator.clear-session');

            Route::patch('mark/{status}', [RiskCalculatorController::class, 'updateActiveStatus'])
                ->name('mark')
                ->where(['status' => '[0,1]'])
                ->middleware('permission:admin.access.riskcalculator.deactivate|admin.access.riskcalculator.reactivate');

            Route::get('password/change', [RiskCalculatorController::class, 'showEditPasswordForm'])
                ->name('change-password')
                ->middleware('permission:admin.access.riskcalculator.change-password')
                ->breadcrumbs(function (Trail $trail, RiskCalculator $riskcalculator) {
                    $trail->parent('admin.riskcalculator.index')
                        ->push(__('Change Password'), route('admin.riskcalculator.change-password', $riskcalculator));
                });

            Route::patch('password/change', [RiskCalculatorController::class, 'updatePassword'])
                ->name('change-password.update')
                ->middleware('permission:admin.access.riskcalculator.change-password');
        });
    });
});
