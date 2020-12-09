<?php

namespace App\Http\Livewire\Sidebar;

use Livewire\Component;
use App\Models\User;
use App\Models\Friend;

class FriendsList extends Component
{
    public $user;
    public $friends;

    public function mount(User $user)
    {   
        $this->user = $user;
        $this->friends = $this->user->approvedFriends;
        // dd($this->friends);
        // auth()->user()->friends->where('pivot.status', 'accepted');
        // $this->friends = $this->getFriends($user);
    }

    protected function getFriends($user)
    {
        $this->friends = Friend::where([
            ['user_id', $user->id],
            ['status', 'accepted'],
        ])->latest()->get();
        
        $friendIds = $this->friends->map(function ($friend) {
            return $friend->friend_id;
        });

        return $friendIds->map(function ($friendId) {
            return User::find($friendId);
        });
    }
    
    public function render()
    {
        return view('livewire.sidebar.friends-list');
    }
}
