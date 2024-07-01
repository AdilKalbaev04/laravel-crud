<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.chat');
    }

    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->user_id = auth()->id();
        $message->message = $request->message;
        $message->save();

        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Message Sent!']);
    }
}

