<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminChatController extends Controller
{
    public function index()
    {
        // Get all users for the admin to chat with
        $users = User::all();
        
        return view('admin.chat.index', compact('users'));
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        // Get messages between the current admin and the selected user
        $messages = Message::where(function($query) use ($id) {
                $query->where('sender_id', Auth::guard('admin')->id())
                      ->where('sender_type', 'App\\Models\\Admin')
                      ->where('receiver_id', $id)
                      ->where('receiver_type', 'App\\Models\\User');
            })
            ->orWhere(function($query) use ($id) {
                $query->where('sender_id', $id)
                      ->where('sender_type', 'App\\Models\\User')
                      ->where('receiver_id', Auth::guard('admin')->id())
                      ->where('receiver_type', 'App\\Models\\Admin');
            })
            ->orderBy('created_at')
            ->get();
            
        // Mark messages as read
        Message::where('sender_id', $id)
              ->where('sender_type', 'App\\Models\\User')
              ->where('receiver_id', Auth::guard('admin')->id())
              ->where('receiver_type', 'App\\Models\\Admin')
              ->where('is_read', false)
              ->update(['is_read' => true]);
        
        return view('admin.chat.show', compact('user', 'messages'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);
        
        $message = Message::create([
            'sender_id' => Auth::guard('admin')->id(),
            'sender_type' => 'App\\Models\\Admin',
            'receiver_id' => $request->user_id,
            'receiver_type' => 'App\\Models\\User',
            'message' => $request->message,
        ]);
        
        return redirect()->back();
    }
}