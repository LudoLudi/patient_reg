<?php

namespace App\Http\Controllers;

use App\Models\Island;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class IslandController extends Controller
{
    // GET
    public function index()
    {
        return Island::all();
    }

    // POST
    public function store(Request $request)
    {
        $island = new Island();
        $island->fill($request->all());
        $island->save();
        return response()->json([
            "success" => true,
            "data" => $island
        ]);
    }

    // GET by id
    public function show(string $id)
    {
        return Island::find($id);
    }

    // PUT
    public function update(Request $request, Island $island)
    {
        $request->validate([
            'atoll' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $island->update($request->all());

        return response()->json([
            'message' => 'Island updated successfully',
            'data' => $island
        ], 200);
    }

    // DELETE
    public function destroy(string $id)
    {
        $island = Island::find($id);
        if (!$island) {
            return response()->json(['message' => 'Island not found'], 404);
        }

        $island->delete();

        return response()->json(['message' => 'Island deleted successfully'], 200);
    }
}
