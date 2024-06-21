<?php

use App\Http\Controllers\FinancialController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::middleware('auth')->group(function () {
    Route::get('/financeiro', [FinancialController::class, 'index'])->name('financial.index');
});
