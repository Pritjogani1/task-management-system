<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $task = Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function assignUsers(Request $request, Task $task)
    {
        $task->users()->sync($request->user_ids);
        return redirect()->route('tasks.index');
    }

    public function addComment(Request $request, Task $task)
    {
        $task->comments()->create(['content' => $request->content]);
        return redirect()->route('tasks.index');
    }
}
