<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RequestModelController;
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

Route::view('/', 'home')->name('home');

Route::middleware([
    'auth',
    'verified'
])->get('dashboard', [
    RequestModelController::class,
    'index'
])->name('dashboard');


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

Route::middleware('auth')->group(
    function () {

        Route::view('profile', 'profile')->name('profile');


        Route::get('request/{id}', [
            RequestModelController::class,
            'edit'
        ])->name('request.edit');

        Route::delete('request/{id}', [
            RequestModelController::class,
            'destroy'
        ])->name('request.delete');

        Route::patch('request/{id}', [
            RequestModelController::class,
            'cancel'
        ])->name('request.cancel');

        Route::get('service/{id}', [
            ServiceController::class,
            'show'
        ]);
    }
);

Route::get('categories', [
    CategoryController::class,
    'index'
])->name('categories');

Route::get('categories/{id}', [
    CategoryController::class,
    'show'
])->name('categories.show');

Route::get('services', [
    ServiceController::class,
    'index'
])->name('services');

require __DIR__ . '/auth.php';
