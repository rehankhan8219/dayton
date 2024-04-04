<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BillController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\BrokerController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\DashboardController;
use App\Http\Controllers\Api\V1\WithdrawalController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
        // Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
        // Route::post('reset-password', [AuthController::class, 'resetPassword']);
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    });
    
    // Contact related routes
    Route::group([
        'prefix' => 'contact'
    ], function(){
        Route::get('/', [ContactController::class, 'index']);
        Route::get('/help-center', [ContactController::class, 'getHelpCenterDetails']);
        Route::post('/store', [ContactController::class, 'store']);
    });
    
    // These routes requires token
    Route::group([
        'middleware' => 'auth:sanctum'
    ], function(){
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::post('risk-calculation-details', [DashboardController::class, 'getRiskCalculationDetails']);
        Route::get('grow-level', [DashboardController::class, 'getGrowLevelDetails']);

        Route::group([
            'prefix' => 'broker'
        ], function(){
            Route::get('/', [BrokerController::class, 'index']);
            Route::post('/store', [BrokerController::class, 'store']);
            Route::patch('{broker}/update', [BrokerController::class, 'update']);
        });

        Route::group([
            'prefix' => 'bill'
        ], function(){
            Route::get('/', [BillController::class, 'index']);
            Route::post('/store', [BillController::class, 'store']);
            Route::get('/payment-history', [BillController::class, 'paymentHistory']);
        });

        Route::group([
            'prefix' => 'withdrawal'
        ], function(){
            Route::get('/', [WithdrawalController::class, 'index']);
            Route::post('/store', [WithdrawalController::class, 'store']);
        });

        Route::group([
            'prefix' => 'user'
        ], function(){
            Route::patch('/update-profile', [UserController::class, 'updateProfile']);
        });
    });
});