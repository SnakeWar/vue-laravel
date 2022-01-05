<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/todos', [TodoController::class, 'index']);
//Route::post('/todos/store', [TodoController::class, 'store']);
//Route::post('/todos/delete', [TodoController::class, 'destroy']);
Route::resource('/todos', TodoController::class);
Route::post('/todos/store', [TodoController::class, 'store']);
Route::get('/todos/{id}', [TodoController::class, 'show']);


