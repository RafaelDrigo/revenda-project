<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\JwtAuthController;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/user/login', [JwtAuthController::class, 'login']);
    Route::post('/me', [JwtAuthController::class, 'me']);

});

Route::get('/', function(){
    return response()->json('conect');
});
Route::post('/user', [UserController::class, 'create']);
Route::post('/users/{user}/client', [ClientController::class, 'create']);
Route::post('/clients/{client}/vehicle', [VehicleController::class, 'create']);

Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/clients/{client}', [ClientController::class, 'show']);

Route::put('/users/{user}', [UserController::class, 'update']);
Route::put('/clients/{client}', [ClientController::class, 'update']);
Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update']);

Route::delete('/users/{user}', [UserController::class, 'delete']);
Route::delete('/clients/{client}', [ClientController::class, 'delete']);
Route::delete('/clients/{client}/vehicles/{vehicle}', [VehicleController::class, 'delete']);