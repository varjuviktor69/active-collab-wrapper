<?php

declare(strict_types=1);

use App\Http\Controllers\ActiveCollab\LoginController;
use App\Http\Controllers\ActiveCollab\LogoutController;
use App\Http\Controllers\ActiveCollab\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('login/')->middleware('guest:active-collab')->group(function() {
    Route::get('', [LoginController::class, 'index'])->name('login.index');
    Route::post('', [LoginController::class, 'login'])->name('login.create');
});

Route::middleware('auth:active-collab')->group(function() {
    Route::prefix('tasks/')->group(function() {
        Route::get('', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('{id}', [TaskController::class, 'view'])->name('tasks.view');
    });

    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::get('{any}', function () {
    return view('not-found');
});

Route::redirect('/', 'tasks/');
