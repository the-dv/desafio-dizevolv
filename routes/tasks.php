<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/get-tasks-by-project', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/save-new-task', [TaskController::class, 'store'])->name('tasks.store');
    Route::patch('/update-task', [TaskController::class, 'update'])->name('tasks.update');
});
