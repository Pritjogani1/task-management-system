<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskDetails extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->with('comments')->get();
        return view('user.taskdetails', compact('tasks'));
    }
}
