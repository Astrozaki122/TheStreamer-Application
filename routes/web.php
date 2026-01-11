<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\VideoController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AccountController::class, 'showlogin'])->name('login');
Route::post('/login', [AccountController::class, 'login']);

Route::get('/register', [AccountController::class, 'showregister']);
Route::post('/register', [AccountController::class, 'register']);

Route::post('/logout', [AccountController::class, 'logout'])->middleware('auth');

Route::get('/mainpage', [VideoController::class, 'index'])->middleware('auth');

Route::get('/video/upload', [VideoController::class, 'create'])->middleware('auth'); // show form
Route::post('/video/upload', [VideoController::class, 'store'])->middleware('auth'); // handle upload

Route::get('/video/{id}', [VideoController::class, 'show'])->middleware('auth'); // show specific video

