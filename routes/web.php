<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PositionController;

Route::get('login', [LoginController::class, 'index'])->name('login')->withoutMiddleware(['auth', 'manager']);
Route::post('login', [LoginController::class, 'attempt'])->name('login.attempt')->withoutMiddleware(['auth', 'manager']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->withoutMiddleware('manager');

Route::get('/', [HomeController::class, 'index'])->name('home')->withoutMiddleware('manager');

// Positions
Route::resource('positions', PositionController::class)->names('positions');

// Countries
Route::resource('countries', CountryController::class)->names('countries');

// Cities
Route::resource('countries/{country}/cities', CityController::class)->names('cities')->except(['show']);

// Users
Route::resource('users', UserController::class)->names('users');
