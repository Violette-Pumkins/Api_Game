<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // index
    public function index($dialogue_id)
    {
        // Retrieve all messages belonging to the dialogue
        $messages = Message::where('dialogue_id', $dialogueId)->get();

        if($message == 0){
            return response()->json(['message' => 'This conversation is empty'], 200, 200);
        }
        else{
        // Return the response
        return response()->json($messages, 200);
        }
    }

    // create
    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'dialogue_id' => 'required|exists:dialogues,id',
            'content' => 'required',
        ]);

        // Create a new message
        $message = new Message([
            'user_id' => $request->user_id,
            'universe_id' => $request->universe_id,
            'character_id' => $request->character_id,
            'dialogue_id' => $request->dialogue_id,
            'content' => $request->content,
        ]);
        $message->save();

        // Return the response
        return response()->json($message, 201);
    }
    // update
    public function update($dialogueId)
    {
        // Retrieve the last message in the dialogue
        $message = Message::where('dialogue_id', $dialogueId)->latest()->first();

        // Return the response
        return response()->json($message, 200);
    }
}
