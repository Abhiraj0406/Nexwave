<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Pages\SiteController;
use App\Http\Controllers\Pages\ReadoutController;

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
        Route::get('/site', 'showSite')->name('site');
        Route::get('/sensor_configuration', 'showSensorConfig');
    });
/**
 * ReadoutController
 */
    Route::controller(ReadoutController::class)->group(function () {
        Route::get('/readings', 'showReadings');
    });
/**
 * SiteController
 */
    Route::controller(SiteController::class)->group(function () {
        Route::get('/site', 'siteDetails')->name('site');
        Route::get('/site/create-site', 'showCreatesite')->name('create_site');
        Route::post('/site/create-site', 'createSite')->name('createSite');
    });
});