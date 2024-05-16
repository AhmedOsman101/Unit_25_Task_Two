<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('test')->group(function () {

    Route::prefix('relation')->group(function () {

        Route::get('ServiceToCategory', [
            TestingController::class,
            'ServiceToCategory'
        ]);
        Route::get('CategoryToService', [
            TestingController::class,
            'CategoryToService'
        ]);
    });
});

require __DIR__ . '/auth.php';
