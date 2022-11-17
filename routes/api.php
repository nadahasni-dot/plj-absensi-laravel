<?php

use App\Http\Controllers\AuthApiController;
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

Route::controller(AuthApiController::class)->group(function () {
    // sign in
    Route::post('/auth', 'index');
});

Route::middleware('auth:sanctum')->group(function () {
    // get signed in user
    Route::get('/user', [AuthApiController::class, 'show']);
});
