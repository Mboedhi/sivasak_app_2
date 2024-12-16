<?php

use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/vehicles/{id}', [VehicleController::class, 'index']);
Route::post('/complaint/{id}', [ComplaintController::class, 'store']);
