<?php

use App\Http\Controllers\CalorieTrackController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource("v1/calories",CalorieTrackController::class)->middleware("auth:sanctum");

Route::post('login', [LoginController::class, 'login']);
