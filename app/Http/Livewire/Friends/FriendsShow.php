<?php

namespace App\Http\Livewire\Friends;

use Livewire\Component;

class FriendsShow extends Component
{
    public $friend;

    public function mount($friend)
    {
        $this->friend = $friend;
    }

    public function render()
    {
        return view('livewire.friends.friends-show');
    }
}
