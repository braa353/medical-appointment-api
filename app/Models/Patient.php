<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $primaryKey = 'PatientID';
    protected $fillable = ['UserID', 'Name', 'Phone'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'PatientID');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'PatientID');
    }
}
