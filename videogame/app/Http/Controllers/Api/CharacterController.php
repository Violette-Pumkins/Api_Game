<?php

namespace App\Http\Controllers\Api;

use App\Models\Universe;
use App\Models\Character;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::with('universe')->get();

        $groupedCharacters = $characters->groupBy('universe_id');

        return response()->json(['characters' => $groupedCharacters], 200);
    }
    // create
    public function create(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'universe_id' => 'required|exists:universes,id',
        ]);

        $character = Character::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'universe_id' => $request->universe_id,
        ]);

        return response()->json(['character' => $character], 201);
    }


    // update
    public function update(Request $request, Universe $universe_id, $character_id)
    {
        
        $character = Character::find($character_id);
        $universe = Universe::with('characters')->find( $universe_id);
        
        // La validation de données
        $this->validate($request, [
        'first_name' => 'required|max:100',
        'last_name' => 'required|max:100',
        ]);

        // On modifie les informations du personnage
        $character->update([
        "first_name" => $request->first_name,
        "last_name" => $request->last_name,
        ]);

        // On retourne la réponse JSON
        return response()->json(['message' => 'Character updated successfully'], 200);
    }

    // destroy
    public function destroy(Universe $universe_id, $character_id)
    {
        
        $character = Character::find($character_id);
        $universe = Universe::with('characters')->find( $universe_id);

        if (!$character) {
            return response()->json(['error' => 'Character not found'], 404);
        }

        $character->delete();

        return response()->json(['message' => 'Character deleted successfully'], 200);
    }
}
