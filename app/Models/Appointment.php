<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $primaryKey = 'AppointmentID';
    protected $fillable = ['PatientID', 'DoctorID', 'ScheduleID', 'AppointmentDate', 'AppointmentTime', 'Status', 'CreatedAt', 'UpdatedAt'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'ScheduleID');
    }
}
