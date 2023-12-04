<?php

use App\Http\Controllers\CalorieTrackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [LoginController::class, 'login']);
Route::resource('/user', UserController::class, ['only'=> ['store']]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource("v1/calories",CalorieTrackController::class);
    Route::post('v1/calories/search', [CalorieTrackController::class, 'search']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::put('user/update', [UserController::class, 'update']);
});


