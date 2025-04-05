<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->get();
        return response()->json($doctors);
    }

    public function show($id)
    {
        $doctor = Doctor::with('user')->find($id);
        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }
        return response()->json($doctor);
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }

        $doctor->update($request->all());
        return response()->json($doctor);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'DoctorID' => 'required',
            'UserID' => 'required|exists:users,UserID',
            'Specialization' => 'required|string',
            'Bio' => 'nullable|string',
            'Rating' => 'nullable|decimal:1,2',
        ]);

        $doctor = Doctor::create($validated);
        return response()->json($doctor, 201);
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }

        $doctor->delete();
        return response()->json(['message' => 'Doctor deleted successfully']);
    }
}
