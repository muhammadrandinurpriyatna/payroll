<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;

Route::get('/', [AbsenController::class, 'index'])->name('absen');
Route::post('/', [AbsenController::class, 'absen']);
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/data-user', [UserController::class, 'data'])->name('user.data');
    Route::get('/user/add', [UserController::class, 'add'])->name('user.add');
    Route::post('/user/add', [UserController::class, 'addAction']);
});