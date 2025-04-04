<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'PatientID' => 'required|exists:patients,PatientID',
            'DoctorID' => 'required|exists:doctors,DoctorID',
            'ScheduleID' => 'required|exists:schedules,ScheduleID',
            'AppointmentDate' => 'required|date',
            'AppointmentTime' => 'required|date_format:H:i:s',
            'Status' => 'required|in:Pending,Accepted,Rejected,Completed',
        ]);

        $appointment = Appointment::create($validated);
        return response()->json($appointment, 201);
    }

    public function index()
    {
        $appointments = Appointment::with('patient', 'doctor', 'schedule')->get();
        return response()->json($appointments);
    }

    public function show($id)
    {
        $appointment = Appointment::with('patient', 'doctor', 'schedule')->find($id);
        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }
        return response()->json($appointment);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }

        $appointment->update($request->all());
        return response()->json($appointment);
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }

        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
