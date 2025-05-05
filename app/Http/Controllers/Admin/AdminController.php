<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view("admin.admin-login");
    }
    public function authenticate(Request $request) {
    

        $credentials = $request->only('email', 'password');

        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }
    public function dashboard() {
        return view("admin.admin");
    }
    public function logout() {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
