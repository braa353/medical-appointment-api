<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $primaryKey = 'LogID';
    protected $fillable = ['UserID', 'Action', 'ActionDate'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
