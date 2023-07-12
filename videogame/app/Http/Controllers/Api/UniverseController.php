<?php

namespace App\Http\Controllers\Api;

use App\Models\Universe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UniverseController extends Controller
{
    public function index()
    {
        $universes = Universe::all();

        return response()->json(['universes' => $universes], 200);
    }

    public function show($id)
    {
        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json(['error' => 'Universe not found'], 404);
        }

        return response()->json(['universe' => $universe], 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $universe = Universe::create([
            'title' => $request->title,
        ]);

        return response()->json(['universe' => $universe], 201);
    }

    public function update(Request $request, $id)
    {
        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json(['error' => 'Universe not found'], 404);
        }

        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $universe->title = $request->title;
        $universe->save();

        return response()->json(['universe' => $universe], 200);
    }

    public function destroy($id)
    {
        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json(['error' => 'Universe not found'], 404);
        }

        $universe->delete();

        return response()->json(['message' => 'Universe deleted successfully'], 200);
    }
}
