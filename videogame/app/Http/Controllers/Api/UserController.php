<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // index
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
    // show
    public function show(Request $request, $id)
    {
            // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Return the user data
        return response()->json($user);
    }
    // update
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        // La validation de données
        $this->validate($request, [
        'first_name' => 'required|max:100',
        'last_name' => 'required|max:100',
        'email' => 'required|email',
        'password' => 'required|min:8'
        ]);

        // On modifie les informations de l'utilisateur
        $user->update([
        "first_name" => $request->first_name,
        "last_name" => $request->last_name,
        "email" => $request->email,
        "password" => bcrypt($request->password)
        ]);

        // On retourne la réponse JSON
        return response()->json(['message' => 'User updated successfully'], 201);
    }
    
}
