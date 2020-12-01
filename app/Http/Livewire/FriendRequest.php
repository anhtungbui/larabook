<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;
use App\Models\Notification;

class FriendRequest extends Component
{
    public $friendRequests;
    public $isAccepted;
    public $isDeclined;

    public function mount($friendRequests)
    {
        $this->friendRequests = $friendRequests;
        $this->isAccepted = false;
        $this->isDeclined = false;
    }

    public function accept($fromUserId)
    {
        $friendship = Friend::where('user_id', $fromUserId);
        $friendship->update(['status' => 'accepted']);

        Friend::insert([
            'user_id' => auth()->id(),
            'friend_id' => $fromUserId,
            'status' => 'accepted'
        ]);

        $this->removeNotification($fromUserId);
        $this->notify($fromUserId);

        $this->isAccepted = true;
    }

    public function decline($fromUserId)
    {
        $friendship = Friend::where('user_id', $fromUserId);
        $friendship->delete();

        $this->removeNotification($fromUserId);

        $this->isDeclined = true;
    }

    protected function notify($fromUserId)
    {
        User::find($fromUserId)->notifications()->create([
            'from_user_id' => auth()->id(),
            'content' => auth()->user()->name . ' accepted your friend request',
            'source_url' => route('profile', [auth()->user()->username]),
            'type' => 'confirmation',
            ]);
    }

    protected function removeNotification($fromUserId)
    {
        $notification = Notification::where([
            ['from_user_id', $fromUserId],
            ['user_id', auth()->id()],
            ['type', 'friend request']
        ]);
        $notification->delete();
    }

    public function render()
    {
        return view('livewire.friend-request');
    }
}
