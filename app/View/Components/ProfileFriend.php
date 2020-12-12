<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileFriend extends Component
{
    public User $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        // dd($this->user);
        return view('components.profile-friend');
    }
}
