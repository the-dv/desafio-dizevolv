<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FinancialController;
use App\Models\Department;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DepartmentController::class, 'index'])->name('dashboard');
});
