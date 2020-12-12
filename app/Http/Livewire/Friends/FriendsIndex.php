<?php

namespace App\Http\Livewire\Friends;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;

class FriendsIndex extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $friends = $this->user->approvedFriends()
                              ->with('profile')
                              ->paginate(6);

        return view('livewire.friends.friends-index', compact('friends'));
    }
}
