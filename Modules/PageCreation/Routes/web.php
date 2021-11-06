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
use Modules\PageCreation\Http\Controllers\PageCreationController;

Route::prefix('pagecreation')->middleware(['auth', 'is_blocked'])->group(function() {
    Route::get('/', [PageCreationController::class, 'create']);
    Route::post('/', [PageCreationController::class, 'store']);
    Route::get('/list', [PageCreationController::class, 'index']);
});

Route::get('{page:slug}', [PageCreationController::class, 'show']);
