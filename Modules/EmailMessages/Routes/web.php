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
use Modules\EmailMessages\Http\Controllers\EmailMessagesController;

Route::prefix('emailmessages')->middleware(['auth', 'is_blocked'])->group(function() {
    Route::get('create', [EmailMessagesController::class, 'create']);
    Route::post('create', [EmailMessagesController::class, 'send']);
});
