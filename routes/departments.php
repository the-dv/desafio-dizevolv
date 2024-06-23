<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/financeiro', [DepartmentController::class, 'indexFinancial'])->name('department.financial');
    Route::get('/desenvolvimento', [DepartmentController::class, 'indexDevelopment'])->name('department.development');
    Route::get('/vendas', [DepartmentController::class, 'indexSelling'])->name('department.selling');
    Route::get('/marketing', [DepartmentController::class, 'indexMarketing'])->name('department.marketing');
    Route::get('/atendimento', [DepartmentController::class, 'indexAttendance'])->name('department.attendance');
});
