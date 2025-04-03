<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'RatingValue' => 'required|integer|min:1|max:5',
            'Comment' => 'nullable|string',
        ]);

        $rating = Rating::create($validated);
        return response()->json($rating, 201);
    }

    public function index()
    {
        $ratings = Rating::with('patient', 'doctor')->get();
        return response()->json($ratings);
    }

    public function show($id)
    {
        $rating = Rating::with('patient', 'doctor')->find($id);
        if (!$rating) {
            return response()->json(['error' => 'Rating not found'], 404);
        }
        return response()->json($rating);
    }
}
