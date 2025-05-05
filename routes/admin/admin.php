<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserManagement;
Route::prefix("admin")->group(function() {

    Route::middleware("guest:admin")->group(function() {
        Route::get("login", [AdminController::class, "index"])->name("admin.login");
    Route::post("login", [AdminController::class, "authenticate"])->name("admin.authenticate");
    });


    Route::middleware("auth:admin")->group(function() {
    Route::get("dashboard", [AdminController::class, "dashboard"])->name("admin.dashboard");
    Route::get("logout", [AdminController::class, "logout"])->name("admin.logout");
    Route::get('tasks', [TaskController::class, 'tasks'])->name('admin.tasks');
    Route::post('tasks', [TaskController::class, 'store'])->name('admin.tasks.store');
    Route::get('tasksall', [TaskController::class, 'show'])->name('admin.tasks.all');
Route::put('tasks/{task}', [TaskController::class, 'update'])->name('admin.tasks.update');
Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('admin.tasks.destroy');

    Route::get('users', [UserManagement::class, 'index'])->name('admin.users.index');
    Route::post('users', [UserManagement::class, 'store'])->name('admin.users.store');
    Route::get('users/create', [UserManagement::class, 'create'])->name('admin.users.create');
    Route::get('users/{user}', [UserManagement::class, 'show'])->name('admin.users.show');
    Route::get('users/{user}/edit', [UserManagement::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserManagement::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserManagement::class, 'destroy'])->name('admin.users.destroy');
    
    });
    




});