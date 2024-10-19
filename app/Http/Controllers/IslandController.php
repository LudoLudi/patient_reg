<?php

namespace App\Http\Controllers;

use App\Models\Island;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class IslandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Island::all();
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Island::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'atoll' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $island = Island::find($id);
        if (!$island) {
            return response()->json(['message' => 'Island not found'], 404);
        }

        $island->fill($request->all());
        $island->save();

        return response()->json([
            'message' => 'Island updated successfully',
            'data' => $island
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
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
