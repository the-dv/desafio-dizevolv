<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/projeto/{name}', [ProjectController::class, 'index'])->name('department.financial');

    // insercao
    Route::post('/cadastro', [ProjectController::class, 'store'])->name('project.store');
});
