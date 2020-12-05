<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FriendRequestSingle extends Component
{
    public $friendRequest;
    public $requester;

    public function mount($friendRequest)
    {
        $this->friendRequest = $friendRequest;
        $this->requester = $this->getRequester();
    }

    public function getRequester()
    {
        return User::findOrFail($this->friendRequest->user_id);
    }

    public function render()
    {
        return view('livewire.friend-request-single');
    }
}
