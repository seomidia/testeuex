<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ContactController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register'])->middleware('auth.basic');
    Route::post('/exists', [UserController::class, 'UserExists'])->middleware('auth.basic');
    Route::post('/lembrar-senha', [UserController::class, 'forget'])->middleware('auth.basic');
    Route::put('/password', [UserController::class, 'setPassword'])->middleware('auth.basic');
    Route::put('{users_id}/update', [UserController::class, 'update'])->middleware('auth.basic');
    Route::delete('{users_id}/delete', [UserController::class, 'delete'])->middleware('auth.basic');
});

Route::prefix('contato')->group(function () {
    Route::post('/criar', [ContactController::class, 'store'])->middleware('auth.basic');
    Route::put('/update/{contact_id}', [ContactController::class, 'update'])->middleware('auth.basic');
    Route::delete('{contact_id}/delete', [ContactController::class, 'delete'])->middleware('auth.basic');
    Route::get('/{contact_id}', [ContactController::class, 'contactById'])->middleware('auth.basic');
    Route::get('/search/{termo}', [ContactController::class, 'search'])->middleware('auth.basic');
});

Route::post('/viacep', [ContactController::class, 'viacep'])->name('viacep')->middleware('auth.basic');
