<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    // GET all addresses
    public function index()
    {
        return Address::all();
    }

    // POST
    public function store(Request $request)
    {
        $address = new address();
        $address->fill($request->all());
        $address->save();
        return response()->json([
            "success" => true,
            "data" => $address
        ]);
    }

    // GET by id
    public function show(string $id)
    {
        return Address::find($id);
    }

    // PUT
    public function update(Request $request, Address $address)
    {
        $request->validate([
            'num' => 'required|string|max:255',
            'apartment' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'island_id' => 'required|exists:islands,id', // Ensure island exists
        ]);

        // Update the address with the validated data
        $address->update($request->all());

        return response()->json([
            'message' => 'Address updated successfully',
            'data' => $address
        ], 200);
    }

    // DELETE
    public function destroy(string $id)
    {
        $address = Address::find($id);
        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        $address->delete();

        return response()->json(['message' => 'Address deleted successfully'], 200);
    }
}

