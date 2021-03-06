<?php

use App\Http\Controllers\AppSettingsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ManageLessonController;
use App\Http\Controllers\ManageQuizController;
use App\Http\Controllers\ManageRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestorePasswordController;
use App\Http\Controllers\ViewProgressController;
use App\Http\Controllers\ViewResultsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web роуты
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ps1', function() {
    return redirect('/ps');
});

Route::middleware('guest')->group(function(){
    Route::resource('register', RegisterController::class);
    Route::resource('auth', AuthController::class);
    Route::resource('restore', RestorePasswordController::class);
});

Route::middleware('auth')->group(function(){
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('regroup', [AuthController::class, 'regroup'])->name('auth.regroup');
    Route::post('profile/updatepassword', [ProfileController::class, 'update'])->name('password.update');

    Route::resource('lessons', LessonController::class);
    Route::resource('quiz', QuizController::class);
    Route::resource('progress', ViewProgressController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('help', HelpController::class, ['parameters' => ['help' => 'helpPage']]);

    Route::middleware('auth.admin')->group(function(){
        Route::prefix('admin')->group(function(){
            Route::resource('grouprequests', ManageRequestController::class);
           
            Route::prefix("manage")->name("manage")->group(function(){
                Route::resource('lessons', ManageLessonController::class);
                Route::resource('quiz', ManageQuizController::class);
            });

            Route::prefix("view")->name("view")->group(function(){
                Route::resource('results', ViewResultsController::class);
            });

            Route::resource('results/export', ViewResultsController::class);

            Route::post('settings/save', [AppSettingsController::class, 'store'])->name('settings.save');
        });
    });
});