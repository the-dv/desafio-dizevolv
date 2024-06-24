<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaskController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/get-comments-by-project', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/save-new-comment', [CommentController::class, 'store'])->name('comments.store');
});
