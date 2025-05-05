<?php

use App\Http\Controllers\User\RegisterUserController;
use Dotenv\Util\Regex;
use Illuminate\Support\Facades\Route;

// Guest routes
Route::middleware("guest:user")->group(function() {
    Route::get("register", [RegisterUserController::class, "create"])->name("");
    Route::post("register", [RegisterUserController::class, "store"])->name("register");
   Route::get("login", [RegisterUserController::class, "index"])->name("user.login");
    Route::post("login", [RegisterUserController::class, "authenticate"])->name("user.authenticate");
    
});

Route::middleware("auth:user")->group(function() {
    Route::get("logout", [RegisterUserController::class, "logout"])->name("user.logout");
    Route::get("dashboard", [RegisterUserController::class, "dashboard"])->name("user.dashboard");
});
   
