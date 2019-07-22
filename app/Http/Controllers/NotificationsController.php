<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index() 
    {
    	$user = auth()->user();
    	
    	$unreadNotificationIds = $user->unreadNotifications->pluck('id')->toArray();
    	foreach ($user->unreadNotifications as $notification) {
		    $notification->markAsRead();
		}

    	return view('notifications.index', ['notifications' => $user->notifications, 'unreadNotificationIds' => $unreadNotificationIds ]);
    }
}
