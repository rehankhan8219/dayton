<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\TwoFactorAuthenticationController;

Route::group(['as' => 'auth.', 'prefix' => 'auth'], function(){
    // Route::redirect('/', '/admin/dashboard', 301);
    Route::group(['middleware' => 'auth'], function(){
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        // Two-factor Authentication
        Route::group(['prefix' => 'account/2fa', 'as' => 'account.2fa.'], function () {
            Route::group(['middleware' => '2fa:disabled'], function () {
                Route::get('enable', [TwoFactorAuthenticationController::class, 'create'])->name('create');
            });

            Route::group(['middleware' => '2fa:enabled'], function () {
                Route::get('recovery', [TwoFactorAuthenticationController::class, 'show'])->name('show');
                Route::patch('recovery/generate', [TwoFactorAuthenticationController::class, 'update'])->name('update');
                Route::get('disable', [DisableTwoFactorAuthenticationController::class, 'show'])->name('disable');
                Route::delete('/', [DisableTwoFactorAuthenticationController::class, 'destroy'])->name('destroy');
            });
        });
    });
    Route::group(['middleware' => 'guest'], function(){
        // Authentication
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);

        // Password Reset
        Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    });
});