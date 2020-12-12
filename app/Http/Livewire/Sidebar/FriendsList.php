<?php

namespace App\Http\Livewire\Sidebar;

use Livewire\Component;
use App\Models\User;
use App\Models\Friend;

class FriendsList extends Component
{
    public $user;
    public $friends;
    public $friendsCount;

    public function mount(User $user)
    {   
        $this->user = $user;
    }

    public function render()
    {
        $this->friends = $this->user->approvedFriends;

        $this->friendsCount = $this->friends->count();

        // Only show 15 random friends 
        $this->friendsCount > 15
                ? $this->friends = $this->friends->random(15)
                : null;

        return view('livewire.sidebar.friends-list');
    }
}
