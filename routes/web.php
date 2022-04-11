<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(UserController::class) -> group(function () {
    Route::post('/api/login', [UserController::class, 'login']);
    Route::get('/api/users', [UserController::class, 'showAll']);
    Route::post('/api/user', [UserController::class, 'insert']);
    Route::post('/api/user/{id}', [UserController::class, 'update']);
    Route::delete('/api/user/{id}', [UserController::class, 'destroy']);
});
