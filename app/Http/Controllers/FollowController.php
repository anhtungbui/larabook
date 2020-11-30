<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Mail;
use App\Mail\FollowNotification;

class FollowController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->follows()->attach($user);

        /**
         * Save for later when we setup user settings system 
         */
        // Mail::to($user->email)
        //     ->send(new FollowNotification(auth()->user()));

        $user->notifications()->create([
                    'content' => auth()->user()->name . ' started following you',
                    'source_url' => route('profile', [auth()->user()->username]),
                    'type' => 'follow',
                    ]);

        return back()->with('status', $user->name . ' followed');
    }

    public function destroy(User $user)
    {
        auth()->user()->follows()->detach($user);

        return back()->with('status', $user->name . ' unfollowed');
    }
}
