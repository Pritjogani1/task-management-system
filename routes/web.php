<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CommentController;

require __DIR__.'/user/user.php';
require __DIR__.'/admin/admin.php';

// Admin comment routes
Route::post('/admin/tasks/{task}/comments', [CommentController::class, 'store'])->name('admin.tasks.comments.store');



