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
        // 'middleware' => 'role:'.config('boilerplate.access.role.admin'),
        'middleware' => 'permission:admin.access.risk_calculator',
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
        'middleware' => 'permission:admin.access.risk_calculator',
    ], function(){
        Route::get('/', [RiskCalculatorController::class, 'index'])
            ->name('index')
            ->breadcrumbs(fn (Trail $trail) => $trail->parent(homeRoute())->push(__('RiskCalculators'), route('admin.riskcalculator.index')));

        Route::group(['prefix' => '{riskcalculator}'], function(){
            Route::get('/', [RiskCalculatorController::class, 'show'])
                ->name('show')
                ->breadcrumbs(fn (Trail $trail, RiskCalculator $riskcalculator) => $trail->parent('admin.riskcalculator.index')->push(__('View RiskCalculator'), route('admin.riskcalculator.show', $riskcalculator)));

        });
    });
});
