<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{movie}',[MovieController::class, 'show']);

Route::post('/reservations/{schedule}',[ReservationController::class, 'store']);

Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);

Route::group([
    'middleware' => 'auth:api'
], function(){
    Route::post('/movies', [MovieController::class, 'store']);
    Route::put('/movies/{movie}', [MovieController::class, 'update']);
    Route::delete('/movies/{movie}', [MovieController::class, 'destroy']);

    Route::post('/schedules/{movie}',[ScheduleController::class, 'store']);
    
    Route::post('/logout',[AuthController::class, 'logout']);
});
