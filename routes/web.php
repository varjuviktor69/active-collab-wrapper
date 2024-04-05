<?php

declare(strict_types=1);

use App\Http\Controllers\ActiveCollab\LoginController;
use App\Http\Controllers\ActiveCollab\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('login/')->group(function() {
    Route::get('', [LoginController::class, 'index'])->name('login.index');
    Route::post('', [LoginController::class, 'login'])->name('login.create');
});

Route::prefix('tasks/')->middleware('auth:active-collab')->group(function() {
    Route::get('index', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('{id}', [TaskController::class, 'view'])->name('tasks.view');
});

