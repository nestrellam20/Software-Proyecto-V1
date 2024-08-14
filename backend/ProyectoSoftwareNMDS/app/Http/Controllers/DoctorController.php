<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        $doctor = Doctor::create([
            'name' => $validatedData['name'],
            'specialty' => $validatedData['specialty'],
        ]);

        return response()->json(['message' => 'Doctor created successfully'], 201);
    }


    public function index()
    {
        $doctors = Doctor::all();

        return response()->json($doctors, 200);
    }


    public function show($id)
    {
        $doctor = Doctor::find($id);

        if ($doctor) {
            return response()->json($doctor, 200);
        } else {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
    }

 
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        if ($doctor) {
            $doctor->delete();
            return response()->json(['message' => 'Doctor deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
    }
}
