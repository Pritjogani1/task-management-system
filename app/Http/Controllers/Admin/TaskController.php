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
//   dd($request->all());
      $validated  =   $request->validate([
            
            'title' =>'required|string|max:255|unique:tasks',
            'description' => 'nullable|string|max:1000',
           'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'due_date' => 'nullable|date',
            'priority' =>'required|in:low,medium,high',
           'status' =>'required|in:pending,in_progress,completed',
           
        ]);

        $task = Task::create(
            [
                'title' => $validated['title'],
                'description' => $validated['description'],
                'due_date' => $validated['due_date'],
                'priority' => $validated['priority'],
                'status' => $validated['status'],

            ]
        );
        $task->users()->attach($validated['user_ids']);
        return redirect()->route('admin.dashboard');
    }
    public function show() {
        $task = Task::with('users')->get();
        
        return view('admin.task-show', compact('task'));
        
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

    

