<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $primaryKey = 'AdminID';
    protected $fillable = ['UserID', 'Permissions'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
