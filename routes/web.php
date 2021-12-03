<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsuarioController;

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


Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/task/show', [TaskController::class, 'index']);

Route::get('/task/create', [TaskController::class, 'create']);

Route::post('/task/create', [TaskController::class, 'store']);

Route::get('/task/search', function () {
    return view('search');
});

Route::post('/task/search', [TaskController::class, 'search']);

Route::delete('/task/delete/{id}', [TaskController::class, 'destroy']);

Route::get('/task/advanced', [TaskController::class, 'advanced']);

Route::post('/task/advanced', [TaskController::class, 'advanced2']);



Route::get('/user/show', [UsuarioController::class, 'index']);

Route::get('/user/create', [UsuarioController::class, 'create']);

Route::post('/user/create', [UsuarioController::class, 'store']);

Route::view('/user/search', function () {
    return view('search');
});

Route::post('/user/search', [UsuarioController::class, 'search']);

Route::delete('/user/delete/{id}', [UsuarioController::class, 'destroy']);

