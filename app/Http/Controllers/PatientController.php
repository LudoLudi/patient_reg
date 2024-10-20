<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // GET
    public function index()
    {
        return Patient::all();
    }

    // POST
    public function store(Request $request)
    {
        $patient = new Patient();
        $patient->fill($request->all());
        $patient->save();
        return response()->json([
            "success" => true,
            "data" => $patient
        ]);
    }

    // GET a single patient by ID
    public function show(string $id)
    {
        return Patient::find($id);
    }

    // PUT
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'nid' => 'required|string|max:20',
            'dob' => 'required|date',
            'address_id' => 'required|exists:addresses,id',
        ]);

        $patient->update($request->all());

        return response()->json([
            'message' => 'Patient updated successfully',
            'data' => $patient
        ], 200);
    }

    // DELETE
    public function destroy(string $id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully'], 200);
    }
}