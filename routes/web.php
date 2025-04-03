<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pages\PageController;

Route::get('/', function () {
    return view('welcome');
});
/**
 * AuthController
 */
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
});

Route::middleware(['auth', 'role:{role}'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'showDashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
/**
* PageController 
*/
    Route::controller(PageController::class)->group(function () {
        Route::get('/home', 'showHome');
        Route::get('/profile', 'showProfile');
        Route::get('/employee', 'showEmployee');
        Route::get('/user', 'showUser');
    });
});