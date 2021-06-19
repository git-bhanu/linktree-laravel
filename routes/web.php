<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\VisitController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// laravel-links.com/dashboard/
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/links', [LinkController::class, 'index']);
    Route::get('/links/new', [LinkController::class, 'create']);
    Route::post('/links/new', [LinkController::class, 'store']);
    Route::get('/links/{link}', [LinkController::class, 'edit']);
    Route::post('/links/{link}', [LinkController::class, 'update']);
    Route::delete('/links/{link}', [LinkController::class, 'destroy']);

    Route::get('/settings', [UserController::class, 'edit']);
    Route::post('/settings', [UserController::class, 'update']);
});

Route::post('/visit/{link}', [VisitController::class, 'store']);

// laravel-links.com/username
Route::get('/{user}', [UserController::class, 'show']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
