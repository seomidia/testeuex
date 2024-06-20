<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::prefix('login')->group(function () {
    Route::name('login.')->group(function () {
        Route::controller(LoginController::class)->group(function () {
            Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('auth');
            Route::get('/lembrar-senha', 'forget')->name('forget');
            Route::post('/forget', 'forgetSend')->name('forget.send');
            Route::get('/reset/{token}', 'reset')->name('reset');
            Route::post('/reset', 'updatePassword')->name('resetupdate');
            Route::get('/sair', 'logout')->name('logout');
            Route::get('/register', 'createUser')->name('createUser');
            Route::post('/register/user', 'storeUser')->name('storeUser');
        });
    });
});

Route::prefix('dashboard')->group(function () {
    Route::name('admin.')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('index')->middleware('auth');
            Route::delete('/deletar-conta', 'AccontDelete')->name('AccontDelete')->middleware('auth');
            Route::get('contatos/search', 'SearchContatos')->name('search')->middleware('auth');
        });
        Route::controller(ContactController::class)->group(function () {
            Route::get('/contato/criar', 'create')->name('contact.create')->middleware('auth');
            Route::post('/contato/store', 'store')->name('contact.store')->middleware('auth');
            Route::get('/contato/{contact_id}/edit', 'edit')->name('contact.edit')->middleware('auth');
            Route::put('/contato/{contact_id}/update', 'update')->name('contact.update')->middleware('auth');
            Route::get('/contato/{contact_id}/show', 'show')->name('contact.show')->middleware('auth');
            Route::delete('/contato/{contact_id}/delete', 'destroy')->name('contact.delete')->middleware('auth');
            Route::get('buscar-endereco/{cep}', 'viacepApi')->name('contact.viacepApi')->middleware('auth');
        });
    });
});
