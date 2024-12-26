<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/validate_login', [AuthController::class, 'validateLogin'])->name('validate_login');

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('payment_methods', PaymentMethodController::class);
});
