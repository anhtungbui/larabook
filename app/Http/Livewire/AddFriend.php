<?php

namespace App\Http\Livewire;

use App\Models\Friend;
use App\Models\Notification;
use Livewire\Component;

class AddFriend extends Component
{
    public $user;
    public $isFriend;

    public function mount($user)
    {
        $this->user = $user;
        $this->isFriend = $this->isFriend();
    }

    public function isFriend()
    {
        $status = Friend::where([
            ['user_id', '=', auth()->id()],
            ['friend_id', '=', $this->user->id]
        ])->pluck('status');

        return $status->isEmpty() ? null : $status[0];
    }

    public function addFriend()
    {
        auth()->user()->friends()->attach($this->user);
        $this->isFriend = 'pending';
        $this->notify();
    }

    public function removeFriend()
    {
        auth()->user()->friends()->detach($this->user);
        Friend::where([
            ['user_id', $this->user->id],
            ['friend_id', auth()->id()],
            ['status', 'accepted']
        ])->delete();
        $this->isFriend = null;
    }

    public function notify()
    {
        Notification::create([
            'from_user_id' => auth()->id(),
            'user_id' => $this->user->id,
            'content' => auth()->user()->name . ' sent you a friend request',
            'source_url' => route('profile', [auth()->user()->username]),
            'type' => 'friend request',
        ]);
    }

    public function render()
    {
        return view('livewire.add-friend');
    }
}
