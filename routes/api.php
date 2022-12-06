<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\ScheduleApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth', [AuthApiController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    // get signed in user
    Route::get('/user', [AuthApiController::class, 'show']);

    // get info
    Route::get('/scheduleinfo', [ScheduleApiController::class, 'index']);
});
