<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FollowButton extends Component
{
    public $user;
    public $isFollowed;

    public function mount($user)
    {
        $this->user = $user;
        $this->isFollowed = $this->isFollowed();
    }

    public function isFollowed() 
    {
        return auth()->user()->follows->contains($this->user);
    }

    public function followUser()
    {
        auth()->user()->follows()->attach($this->user);
        $this->isFollowed = true;
        $this->notify();
    }

    public function unfollowUser()
    {
        auth()->user()->follows()->detach($this->user);
        $this->isFollowed = false;
    }

    public function notify()
    {
        $this->user->notifications()->create([
                    'from_user_id' => auth()->id(),
                    'content' => auth()->user()->name . ' started following you',
                    'source_url' => route('profile', [auth()->user()->username]),
                    'type' => 'follow',
                    ]);
    }

    protected function notifyByEmail()
    {
         /**
         * Save for later when we setup user settings system 
         */
        // Mail::to($user->email)
        //     ->send(new FollowNotification(auth()->user()));
    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}
