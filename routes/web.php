<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('/')->group(function() {
    Route::get('login','login')->name('login');
    Route::get('logout','logout')->name('logout');
    Route::post('authenticate','authenticate')->name('auth-authenticate');
});
Route::middleware(['auth'])->group(function() {
    
    Route::group(['controller' => DashboardController::class, 'prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
        Route::get('index','index')->name('index');
    });
});

