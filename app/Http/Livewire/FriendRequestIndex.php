<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;
use App\Models\Notification;

class FriendRequestIndex extends Component
{
    public $friendRequests;
    
    protected $listeners = [
                'requestAccepted',
                'requestDeclined',
            ];

    public function mount()
    {
        $this->friendRequests = $this->getFriendRequests();
    }

    public function getFriendRequests()
    {
        return Friend::where([
                    ['friend_id', auth()->id()],
                    ['status', 'pending']
                ])
                ->latest()
                ->get();
    }

    public function requestAccepted($requesterId)
    {
        $friendship = Friend::where('user_id', $requesterId);
        $friendship->update(['status' => 'accepted']);

        Friend::create([
            'user_id' => auth()->id(),
            'friend_id' => $requesterId,
            'status' => 'accepted',
        ]);
        
        $this->notify($requesterId);
        $this->deleteNotification($requesterId);
        $this->emit('notificationDeleted');
        
        $this->friendRequests = $this->getFriendRequests();
        session()->flash('message', 'Friend request accepted');
    }

    public function requestDeclined($requesterId)
    {
        $friendship = Friend::where('user_id', $requesterId);
        $friendship->delete();

        $this->deleteNotification($requesterId);
        $this->emit('notificationDeleted');
        
        $this->friendRequests = $this->getFriendRequests();
        session()->flash('message', 'Friend request declined');
    }

    protected function notify($requesterId)
    {
        User::find($requesterId)->notifications()->create([
            'from_user_id' => auth()->id(),
            'content' => auth()->user()->name . ' accepted your friend request',
            'source_url' => route('profile', [auth()->user()->username]),
            'type' => 'confirmation',
            ]);
    }

    protected function deleteNotification($requesterId)
    {
        $notification = Notification::where([
            ['from_user_id', $requesterId],
            ['user_id', auth()->id()],
            ['type', 'friend request']
        ]);
        $notification->delete();
    }
   
    public function render()
    {
        return view('livewire.friend-request-index');
    }
}
