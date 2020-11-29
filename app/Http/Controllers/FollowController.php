<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->follows()->attach($user);

        return back()->with('status', $user->name . ' followed');
    }

    public function destroy(User $user)
    {
        auth()->user()->follows()->detach($user);

        return back()->with('status', $user->name . ' unfollowed');
    }
}
