<?php

namespace App\View\Components;

use App\Models\Friend;
use Illuminate\View\Component;

class ProfileNavbar extends Component
{
    public $user;
    public $followingUsers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $followingUsers)
    {
        $this->user = $user;
        $this->followingUsers = $followingUsers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.profile-navbar');
    }
}
