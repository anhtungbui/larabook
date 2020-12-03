<?php

namespace App\Http\Livewire\Sidebar;

use App\Models\User;
use Livewire\Component;

class IntroCard extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.sidebar.intro-card');
    }
}
