<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
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
        
        return view('chat.show', compact('receiver'));
        // return response()->json($messages);
    }
    public function getMessages($id)
    {
        $receiver = Admin::findOrFail($id);
        
        // Get messages between the current user and the selected admin
        $messages = Message::where(function($query) use ($id) {
                $query->where('sender_id', Auth::id())
                      ->where('sender_type', 'user')
                      ->where('receiver_id', $id)
                      ->where('receiver_type', 'admin');
            })
            ->orWhere(function($query) use ($id) {
                $query->where('sender_id', $id)
                      ->where('sender_type', 'admin')
                      ->where('receiver_id', Auth::id())
                      ->where('receiver_type', 'user');
            })
            ->orderBy('created_at')
            ->get();
            
        // Mark messages as read
        Message::where('sender_id', $id)
              ->where('sender_type', 'admin')
              ->where('receiver_id', Auth::id())
              ->where('receiver_type', 'user')
              ->where('is_read', false)
              ->update(['is_read' => true]);
          
        return response()->json($messages);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:admins,id',
            'message' => 'required|string'
        ]);
       
        
        $message = Message::create([
            'sender_id' => Auth::id(),
            'sender_type' => 'user',
            'receiver_id' => $request->receiver_id,
            'receiver_type' => 'admin',
            'message' => $request->message,
        ]);
        broadcast(new MessageSent($message))->toOthers();
        return response()->json($message);
    }
}
