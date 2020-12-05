<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;

class NotificationSingle extends Component
{   
    public $notification;

    public function mount($notification) 
    {
        $this->notification = $notification;
    }

    public function deleteNotification($notificationId)
    {
        Notification::find($notificationId)->delete();
        $this->emitTo('notification-index', 'deleteClicked', $notificationId);
    }

    public function render()
    {
        return view('livewire.notification-single');
    }
}
