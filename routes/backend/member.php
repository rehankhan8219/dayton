<?php

use App\Models\Broker;
use Tabuna\Breadcrumbs\Trail;
use App\Models\User as Member;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BrokerController;
use App\Http\Controllers\Backend\MemberController;

// All route names are prefixed with 'admin.'.
Route::group([
    'prefix' => 'member',
    'as' => 'member.'
], function(){
    Route::group([
        // 'middleware' => 'role:'.config('boilerplate.access.role.admin'),
        'middleware' => 'permission:admin.access.user',
    ], function(){
        Route::get('/create', [MemberController::class, 'create'])
            ->name('create')
            ->breadcrumbs(fn (Trail $trail) => $trail->parent('admin.member.index')->push(__('Create Member'), route('admin.member.create')));
        
        Route::post('/store', [MemberController::class, 'store'])->name('store');

        Route::group(['prefix' => '{member}'], function(){
            Route::get('/edit', [MemberController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(fn (Trail $trail, Member $member) => $trail->parent('admin.member.index')->push(__('Edit Member'), route('admin.member.edit', $member)));
            
            Route::patch('/update', [MemberController::class, 'update'])->name('update');
            Route::delete('/delete', [MemberController::class, 'delete'])->name('delete');

        });
    });
    
    Route::group([
        // 'middleware' => 'permission:admin.access.member.list|admin.access.member.deactivate|admin.access.member.reactivate|admin.access.member.clear-session|admin.access.member.impersonate|admin.access.member.change-password',
        'middleware' => 'permission:admin.access.user',
    ], function(){
        Route::get('/', [MemberController::class, 'index'])
            ->name('index')
            // ->middleware('permission:admin.access.member.list|admin.access.member.deactivate|admin.access.member.clear-session|admin.access.member.impersonate|admin.access.member.change-password')
            ->breadcrumbs(fn (Trail $trail) => $trail->parent(homeRoute())->push(__('Members'), route('admin.member.index')));

        Route::group(['prefix' => '{member}'], function(){
            Route::get('/', [MemberController::class, 'show'])
                ->name('show')
                // ->middleware('permission:admin.access.member.list')
                ->breadcrumbs(fn (Trail $trail, Member $member) => $trail->parent('admin.member.index')->push(__('View Member'), route('admin.member.show', $member)));

            Route::post('clear-session', [MemberController::class, 'clearSession'])
                ->name('clear-session');
                // ->middleware('permission:admin.access.member.clear-session');

            Route::patch('mark/{status}', [MemberController::class, 'updateActiveStatus'])
                ->name('mark')
                ->where(['status' => '[0,1]']);
                // ->middleware('permission:admin.access.member.deactivate|admin.access.member.reactivate');

            Route::get('password/change', [MemberController::class, 'showEditPasswordForm'])
                ->name('change-password')
                // ->middleware('permission:admin.access.member.change-password')
                ->breadcrumbs(function (Trail $trail, Member $member) {
                    $trail->parent('admin.member.index')
                        ->push(__('Change Password'), route('admin.member.change-password', $member));
                });

            Route::patch('password/change', [MemberController::class, 'updatePassword'])
                ->name('change-password.update');
                // ->middleware('permission:admin.access.member.change-password');

            Route::group([
                'prefix' => 'broker',
                'as' => 'broker.'
            ], function(){
                Route::get('/create', [BrokerController::class, 'create'])
                    ->name('create')
                    ->breadcrumbs(fn (Trail $trail, Member $member) => $trail->parent('admin.member.index')->push(__('Create Broker'), route('admin.member.broker.create', $member)));
                
                Route::post('/store', [BrokerController::class, 'store'])->name('store');

                Route::get('/fetch', [BrokerController::class, 'getByMemberId'])->name('fetch');

                Route::group(['prefix' => '{broker}'], function(){
                    Route::get('/edit', [BrokerController::class, 'edit'])
                        ->name('edit')
                        ->breadcrumbs(fn (Trail $trail, Member $member, Broker $broker) => $trail->parent('admin.member.index')->push(__('Edit Broker'), route('admin.member.broker.edit', [$member, $broker])));
                    
                    Route::patch('/update', [BrokerController::class, 'update'])->name('update');
                    Route::delete('/delete', [BrokerController::class, 'delete'])->name('delete');
                });
            });
        });
    });
});
