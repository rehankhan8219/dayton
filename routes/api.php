<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'namespace' => 'Api\\V1',
    'prefix' => 'v1',
], function(){
    
    // Authentication related routes
    Route::group([
        'prefix' => 'auth'
    ], function(){
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        // Route::post('resend-verification-email', [AuthController::class, 'resendEmail']);
        // Route::post('verify-email', [AuthController::class, 'verifyEmail']);
        Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
        Route::post('reset-password', [AuthController::class, 'resetPassword']);
    });
    
    // These routes requires token
    Route::group([
        'middleware' => 'auth:sanctum'
    ], function(){
        Route::get('dashboard', [DashboardController::class, 'index']);
    });
});