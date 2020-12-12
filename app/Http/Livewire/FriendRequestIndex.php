<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;

class FriendRequestIndex extends Component
{
    public $friendRequests;
    
    protected $listeners = [
                'requestAccepted',
                'requestDeclined',
            ];

    public function mount()
    {
        //
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
        $this->emit('friendRequestUpdated', $requesterId);      // NotificationIndex listens to it
        $this->dispatchBrowserEvent('action-performed', ['message' => 'Friend request accepted']);
        
        $this->friendRequests = $this->getFriendRequests();
    }

    public function requestDeclined($requesterId)
    {
        $friendship = Friend::where('user_id', $requesterId);
        $friendship->delete();

        $this->emit('friendRequestUpdated', $requesterId);      // NotificationIndex listens to it
        $this->dispatchBrowserEvent('action-performed', ['message' => 'Friend request declined']);

        $this->friendRequests = $this->getFriendRequests();
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
   
    public function render()
    {
        $this->friendRequests = $this->getFriendRequests();

        return view('livewire.friend-request-index');
    }
}
