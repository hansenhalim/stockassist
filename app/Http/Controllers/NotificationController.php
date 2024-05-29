<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->authable->shop;

        return view('notification.index')
            ->with('notifications', $shop?->notifications);
    }
}
