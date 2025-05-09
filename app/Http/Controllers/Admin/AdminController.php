<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view("admin.admin-login");
    }
    public function authenticate(Request $request) {
    $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }
    public function dashboard() {
        $totalTasks = Task::all()->count();
        $recentTasks = Task::orderBy('created_at', 'desc')->take(5)->get();
    
        $totalUsers = User::all()->count();
        
        return view("admin.admin", compact('totalTasks', 'totalUsers', 'recentTasks'));
    }
    public function logout() {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
