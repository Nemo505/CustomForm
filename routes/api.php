<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\UserApiController;

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
Route::group(
    ['prefix' => 'v1',],
    function () {

    Route::post('/login', [AuthApiController::class, 'login']);
    Route::post('/register', [AuthApiController::class, 'register']);

    Route::middleware(['auth:sanctum'])->group(function () {

        Route::post('/logout', [AuthApiController::class, 'logout']);

        Route::controller(UserApiController::class)->group(function () {
            Route::post('/submitting-form', 'store')->name('submitting-data');
            Route::post('/complete-form', 'storeForm')->name('complete-data');
        });
    });
});

