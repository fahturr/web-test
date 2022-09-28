<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/menu')->middleware('auth')->group(function () {
    Route::prefix('/users')->group(function () {
        Route::get('/create', [WebController::class, 'showAddUsers'])->name('menu.users.add');
        Route::post('/create', [WebController::class, 'createUsers'])->name('menu.users.add.post');

        Route::get('/read', [WebController::class, 'showUsers'])->name('menu.users');

        Route::get('/update/{id}', [WebController::class, 'showEditUsers'])->name('menu.users.edit');
        Route::put('/update/{id}', [WebController::class, 'updateUsers'])->name('menu.users.edit.put');

        Route::get('/delete/{id}', [WebController::class, 'deleteUsers'])->name('menu.users.delete');
    });

    Route::get('/products', [WebController::class, 'showProducts'])->name('menu.products');
});
