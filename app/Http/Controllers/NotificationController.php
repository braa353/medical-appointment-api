<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index($userId)
    {
        $notifications = Notification::where('UserID', $userId)->get();
        return response()->json($notifications);
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

        $notification->update(['IsRead' => true]);
        return response()->json($notification);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'UserID' => 'required|exists:users,UserID',
            'Message' => 'required|string',
            'NotificationType' => 'required|string',
            'IsRead' => 'boolean',
        ]);

        $notification = Notification::create($validated);
        return response()->json($notification, 201);
    }
}
