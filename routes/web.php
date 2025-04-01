<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register','showRegister')->name('register');
    Route::post('/register','register');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
    Route::view('/{roles}/dashboard', 'dashboard')->name('dashboard')->middleware('role:{roles}');
    Route::get('/unauthorized', 'unauthorized')->name('unauthorized');
});

// Authentication Routes
// Route::controller(AuthController::class)->group(function () {
//     Route::get('/register', 'showRegister')->name('register');
//     Route::post('/register', 'register');
//     Route::get('/login', 'showLogin')->name('login');
//     Route::post('/login', 'login');
//     Route::get('/logout', 'logout')->name('logout');
//     Route::get('/unauthorized', 'unauthorized')->name('unauthorized');
// });

Route::middleware(['auth','role:{roles}'])->group(function(){
    Route::get('dashboard', function(){
        return "{role} Dashboard";
    });
});
// // Apply Role Middleware Correctly
// Route::middleware(['auth','role:admin'])->group(function(){
//     Route::get('dashboard', function() {
//         return "Admin Dashboard";
//     });
// });

// Route::middleware(['auth','role:employee'])->group(function(){
//     Route::get('dashboard', function() {
//         return "Employee Dashboard";
//     });
// });

// Route::middleware(['auth', 'role:user'])->group(function(){
//     Route::get('dashboard', function() {
//         return "User Dashboard";
//     });
// });