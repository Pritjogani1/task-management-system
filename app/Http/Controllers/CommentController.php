<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->task_id = $task->id;
        $comment->user_id = Auth::guard('admin')->user()->id;
        $comment->user_type = 'admin'; // To identify admin comments
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}