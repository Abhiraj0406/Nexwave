<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/register', [AuthController::class,'showRegister'])->name('register');
// Route::get('/login', [AuthController::class,'showRegister'])->name('login');
// Route::post('/register', [AuthController::class, 'register']);

Route::controller(AuthController::class)->group(function () {
    Route::get('/register','showRegister')->name('register');
    Route::post('/register','register');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');

    Route::get('/logout', 'logout')->name('logout');
    Route::view('/{roles}/dashboard', 'dashboard')->name('dashboard');
    Route::get('/unauthorized', 'unauthorized')->name('unauthorized');
});

Route::middleware(['auth','role:{roles}'])->group(function(){
    Route::get('dashboard', function(){
        return "{role} Dashboard";
    });
});