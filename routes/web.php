<?php

use App\Http\Controllers\Admin\AdminChatController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/user/user.php';
require __DIR__.'/admin/admin.php';


// User chat routes
Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/{id}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/send', [ChatController::class, 'store'])->name('chat.store');
});

// Admin chat routes
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/chat', [AdminChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/{id}', [AdminChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/send', [AdminChatController::class, 'store'])->name('chat.store');
});


