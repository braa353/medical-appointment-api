<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $primaryKey = 'CenterID';
    protected $fillable = ['UserId', 'Name', 'LocationID', 'DoctorID'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }
}
