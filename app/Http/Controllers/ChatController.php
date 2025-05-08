<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        // Get all admins for the user to chat with
        $users = Admin::all();
        
        return view('chat.index', compact('users'));
    }
    
    public function show($id)
    {
        $receiver = Admin::findOrFail($id);
        
        // Get messages between the current user and the selected admin
        $messages = Message::where(function($query) use ($id) {
                $query->where('sender_id', Auth::id())
                      ->where('sender_type', 'App\\Models\\User')
                      ->where('receiver_id', $id)
                      ->where('receiver_type', 'App\\Models\\Admin');
            })
            ->orWhere(function($query) use ($id) {
                $query->where('sender_id', $id)
                      ->where('sender_type', 'App\\Models\\Admin')
                      ->where('receiver_id', Auth::id())
                      ->where('receiver_type', 'App\\Models\\User');
            })
            ->orderBy('created_at')
            ->get();
            
        // Mark messages as read
        Message::where('sender_id', $id)
              ->where('sender_type', 'App\\Models\\Admin')
              ->where('receiver_id', Auth::id())
              ->where('receiver_type', 'App\\Models\\User')
              ->where('is_read', false)
              ->update(['is_read' => true]);
        
        return view('chat.show', compact('receiver', 'messages'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:admins,id',
            'message' => 'required|string'
        ]);
        
        $message = Message::create([
            'sender_id' => Auth::id(),
            'sender_type' => 'App\\Models\\User',
            'receiver_id' => $request->receiver_id,
            'receiver_type' => 'App\\Models\\Admin',
            'message' => $request->message,
        ]);
        
        return redirect()->back();
    }
}