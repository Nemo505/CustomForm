<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(AgentController::class)->group(function () {
    Route::get('/list', 'index')->name('agents');
    Route::get('/create', 'agentCreate')->name('agents-create');
    Route::post('/store', 'create')->name('agents-store');
    Route::get('/detail', 'agentDetail')->name('detail');
    Route::get('/edit', 'detail')->name('agents-detail');
    Route::post('/update', 'update')->name('agents-update');
    Route::post('/delete', 'delete')->name('agents-delete');
    Route::post('/change-status', 'changeStatus')->name('agents-changeStatus');
});
