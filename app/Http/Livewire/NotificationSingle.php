<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationSingle extends Component
{   
    public $notification;

    public function mount($notification) 
    {
        $this->notification = $notification;
    }

    public function render()
    {
        return view('livewire.notification-single');
    }
}
