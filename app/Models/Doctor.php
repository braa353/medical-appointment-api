<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $primaryKey = 'DoctorID';
    protected $fillable = ['UserID', 'Specialization', 'Bio', 'Rating'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'DoctorID');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'DoctorID');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'DoctorID');
    }

    public function centers()
    {
        return $this->hasMany(Center::class, 'DoctorID');
    }
}
