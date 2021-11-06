<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UserController;

Route::prefix('users')->group(function() {
    Route::middleware('guest')->group(function() {
        Route::get('login', [UserController::class, 'login_create'])->name('login');
        Route::post('login', [UserController::class, 'login_store']);
        Route::get('register', [UserController::class, 'register_create']);
        Route::post('register', [UserController::class, 'register_store']);
    });

    Route::post('logout', [UserController::class, 'destroy'])->middleware('auth');
});
