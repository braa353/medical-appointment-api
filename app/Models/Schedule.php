<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $primaryKey = 'ScheduleID';
    protected $fillable = ['DoctorID', 'Day', 'StartTime', 'EndTime', 'MaxPatients'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'ScheduleID');
    }
}
