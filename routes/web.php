<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StartController;
use App\Http\Controllers\StartTestController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\SubmitController;
use Illuminate\Support\Facades\Route;

//Auth routes

Route::get('/', [StartController::class, 'goHome'])->name('start')->middleware("auth");

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware("guest");
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware("guest");

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware("guest");
Route::post('/login', [LoginController::class, 'store'])->name('login')->middleware("guest");

Route::post('/logout', [LogoutController::class, 'store'])->name('logout')->middleware("auth");

Route::get('/forgot-password', [ForgotPasswordController::class, "index"])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, "post"])->middleware('guest')->name('password.email');

Route::get('/reset-password', [ResetPasswordController::class, "index"])->middleware('guest')->name("password.reset");
Route::post('/reset-password', [ResetPasswordController::class, "post"])->middleware('guest')->name('password.update');


//Main routes

Route::get('/home', [StartController::class, 'goHome'])->name('home')->middleware("auth");

Route::post('/restart', [DeleteController::class, 'delete'])->name("restart")->middleware("auth");

Route::post('/startTest', [StartTestController::class, "start"])->name('startTest')->middleware("auth");

Route::get('/question', [QuestionController::class, "goQuestion"])->name("question")->middleware("auth");
Route::post('/question', [QuestionController::class, "answer"])->name("answer")->middleware("auth");

Route::get('/leaderboard', [LeaderboardController::class, "index"])->name("leaderboard");
Route::post('/leaderboard', [LeaderboardController::class, "filter"])->name("leaderboardFilter");
Route::post('/leaderboardDelete', [LeaderboardController::class, "delete"])->name("leaderboardDelete")->middleware("auth");

Route::post('/statistics', [StatisticsController::class, "statistics"])->name("statistics")->middleware("auth");

//routes needs updates below 



Route::get('/statistics', [StatisticsController::class, "index"])->name("statistics")->middleware("auth");
