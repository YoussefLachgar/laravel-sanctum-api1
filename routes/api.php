<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;


//public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('/tasks', TasksController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});


//Route::get('/test', function () {
//    return response()->json(['success' => true]);
//});


Route::post('/auth/register',[UserController::class,'createUser']);
Route::post('/auth/login',[UserController::class,'loginUser']);
