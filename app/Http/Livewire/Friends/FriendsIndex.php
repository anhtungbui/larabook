<?php

namespace App\Http\Livewire\Friends;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;

class FriendsIndex extends Component
{
    public $user;
    public $friends;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->friends = $this->getFriends($user);
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
        return view('livewire.friends.friends-index');
    }
}
