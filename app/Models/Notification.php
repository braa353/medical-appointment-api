<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $primaryKey = 'NotificationID';
    protected $fillable = ['UserID', 'Message', 'NotificationType', 'IsRead', 'CreatedAt'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
