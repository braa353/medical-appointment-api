<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $primaryKey = 'location_id';
    protected $fillable = ['address', 'city', 'country', 'latitude', 'longitude'];

    public function centers()
    {
        return $this->hasMany(Center::class, 'LocationID');
    }
}
