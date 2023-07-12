<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Dialogue;
use App\Models\Universe;
use App\Models\Character;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DialogueController extends Controller
{
    public function index()
    {
        // Retrieve all dialogues
        $dialogues = Dialogue::all();

        // Return the response
        return response()->json($dialogues, 200);
    }

    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'character_id' => 'required|exists:characters,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Retrieve the character based on the provided character_id
        $character = Character::findOrFail($request->character_id);

        // Retrieve the user based on the provided user_id
        $user = User::findOrFail($request->user_id);

        // Retrieve the universe associated with the character
        $universe = $character->universe;

        // Create a new dialogue and assign the relationships
        $dialogue = new Dialogue();
        $dialogue->character_id = $character->id;
        $dialogue->user_id = $user->id;
        $dialogue->universe_id = $universe->id;
        $dialogue->save();

        // Return the response
        return response()->json($dialogue, 201);
    }

    public function show($id)
    {
        // Retrieve the dialogue based on the provided ID
        $dialogue = Dialogue::findOrFail($id);

        // Return the response
        return response()->json($dialogue, 200);
    }

    public function destroy($id)
    {
        // Retrieve the dialogue based on the provided ID
        $dialogue = Dialogue::findOrFail($id);

        // Delete the dialogue
        $dialogue->delete();

        // Return the response
        return response()->json(['message' => 'Dialogue deleted successfully'], 200);
    }
}
