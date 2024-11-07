<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDashController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showlogin'])->name('login');

Route::get('/admin_dashboard', [AdminDashController::class, 'showadmindash'])->name('admin_dashboard');