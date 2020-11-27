<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfilePhoto extends Component
{
    public $photos;
    public $user;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($photos, $user)
    {
        $this->photos = $photos;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.profile-photo');
    }
}
