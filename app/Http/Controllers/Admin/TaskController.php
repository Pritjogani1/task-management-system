<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function tasks() {
        $users = User::all();
        
        return view('admin.create-task', compact('users'));
    }
    public function store(Request $request) {
       
        $task = Task::create($request->all());
        return redirect()->route('admin.dashboard');
    }
    public function show() {
        $task = Task::all();
        $users = User::all();
        return view('admin.task-show', compact('task','users'));
        
    }
    
    // Add a new method to show a single task with comments
    public function showTask(Task $task) {
        $singleTask = $task->load('comments');
        $users = User::all();
        return view('admin.task-detail', compact('singleTask', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'due_date' => 'nullable|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,completed',
        ]);
        

        $task->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully.');
    }
}

    

