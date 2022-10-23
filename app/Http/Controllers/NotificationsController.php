<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    //
    public function index(Request $request)
    {

        $notifications = Auth::user()->notifications;

        return view('notifications', compact('notifications'));
    }

    public function message($id)
    {

        if ($message = Auth::user()->notifications->find($id)) {
            if (! $message->read_at) {
                $message->markAsRead();
            }
            return view('message', compact('message'));
        } else {
            abort(404);
        }
    }

    public function markAsReadNotifications(Request $request): \Illuminate\Http\Response
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
