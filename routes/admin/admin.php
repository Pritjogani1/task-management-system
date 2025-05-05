<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
Route::prefix("admin")->group(function() {

    Route::middleware("guest:admin")->group(function() {
        Route::get("login", [AdminController::class, "index"])->name("admin.login");
    Route::post("login", [AdminController::class, "authenticate"])->name("admin.authenticate");
    });


    Route::middleware("auth:admin")->group(function() {
    Route::get("dashboard", [AdminController::class, "dashboard"])->name("admin.dashboard");
    Route::get("logout", [AdminController::class, "logout"])->name("admin.logout");
    Route::get('tasks', [AdminController::class, 'tasks'])->name('admin.tasks');
    Route::post('tasks', [AdminController::class, 'create'])->name('admin.tasks.store');
    });
    




});