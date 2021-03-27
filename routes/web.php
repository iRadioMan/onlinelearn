<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageLessonController;
use App\Http\Controllers\ManageRequestController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){
    Route::resource('register', RegisterController::class);
    Route::resource('auth', AuthController::class);
});

Route::middleware('auth')->group(function(){
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware('auth.admin')->group(function(){
        Route::prefix('admin')->group(function(){
            Route::resource('grouprequests', ManageRequestController::class);
            Route::prefix("manage")->name("manage")->group(function(){
                Route::resource('lessons', ManageLessonController::class);
            });
        });
    });
});