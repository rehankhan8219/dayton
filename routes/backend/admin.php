<?php

use Tabuna\Breadcrumbs\Trail;
use App\Events\User\UserLoggedIn;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;

// All route names are prefixed with 'admin.'.
// Route::redirect('/', route('admin.dashboard'), 301);
// For sub directory hosting
Route::get('/', function(){
    return redirect()->route('admin.dashboard', [], 301);
});

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(fn (Trail $trail) => $trail->push(__('Home'), homeRoute()));

Route::group(['prefix' => 'profile/', 'as' => 'profile.'], function(){
    Route::get('/', [ProfileController::class, 'showEditProfileForm'])->name('edit');
    Route::patch('/update', [ProfileController::class, 'update'])->name('update');
});

Breadcrumbs::for('admin.settings.index', fn($trail) => $trail->push(__('Home'), homeRoute())->push(__('Settings'), 'admin.settings.index'));