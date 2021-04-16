<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);

Route::group([
    'middleware' => 'auth:api'
], function(){
    Route::post('/logout',[AuthController::class, 'logout']);
});
