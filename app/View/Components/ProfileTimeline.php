<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileTimeline extends Component
{
    public $user;
    public $posts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $posts)
    {
        $this->user = $user;
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.profile-timeline');
    }
}
