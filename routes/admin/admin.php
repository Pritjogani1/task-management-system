<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserManagement;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CommentController;

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

    Route::get('users', [UserManagement::class, 'index'])->name('admin.users.index')->can('user');
    Route::post('users', [UserManagement::class, 'store'])->name('admin.users.store');
    Route::get('users/create', [UserManagement::class, 'create'])->name('admin.users.create');
    Route::get('users/{user}', [UserManagement::class, 'show'])->name('admin.users.show');
    Route::get('users/{user}/edit', [UserManagement::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserManagement::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserManagement::class, 'destroy'])->name('admin.users.destroy');
    
    Route::prefix('admins')->group(function(){
        Route::get('/',[AuthAdminController::class,'index'])->name('admin.admins.index');

        Route::get('/create',[AuthAdminController::class,'create'])->name('admin.admins.create');
        Route::post('/create',[AuthAdminController::class,'store'])->name('admin.admins.store');

        Route::get('/{admin}/edit',[AuthAdminController::class,'edit'])->name('admin.admins.edit');
        Route::patch('/{admin}/update',[AuthAdminController::class,'update'])->name('admin.admins.update');
        Route::delete('/{admin}/delete',[AuthAdminController::class,'destroy'])->name('admin.admins.destroy');
    });

    Route::prefix('role')->group(function(){
        Route::get('/',[RoleController::class,'index'])->name('admin.role');

        Route::get('/create',[RoleController::class,'create'])->name('admin.role.create');
        Route::post('/create',[RoleController::class,'store'])->name('admin.role.store');

        Route::get('/{role}/edit',[RoleController::class,'edit'])->name('admin.role.edit');
        Route::patch('/{role}/update',[RoleController::class,'update'])->name('admin.role.update');

        Route::delete('/{role}/delete',[RoleController::class,'destroy'])->name('admin.role.destroy');
    });
    
    Route::prefix('permission')->group(function(){
        Route::get('/',[PermissionController::class,'index'])->name('admin.permission');

        Route::get('/create',[PermissionController::class,'create'])->name('admin.permission.create');
        Route::post('/create',[PermissionController::class,'store'])->name('admin.permission.store');

        Route::get('/{permission}/edit',[PermissionController::class,'edit'])->name('admin.permission.edit');
        Route::patch('/{permission}/update',[PermissionController::class,'update'])->name('admin.permission.update');

        Route::delete('/{permission}/delete',[PermissionController::class,'destroy'])->name('admin.permission.destroy');
    });
    Route::post('/tasks/{task}/comments', [CommentController::class, 'store'])->name('admin.tasks.comments.store');
    });


 

   
        


});