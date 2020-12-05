<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;

class NotificationIndex extends Component
{
    public $notifications;

    protected $listeners = [
        'deleteClicked' => '$refresh',
        'notificationDeleted' => '$refresh'
        // 'requestAccepted' => '$refresh',
        // 'requestDeclined' => '$refresh',
    ];

    public function getNotifications()
    {
        return Notification::latest()
        ->where('user_id', auth()->id())
        ->get();
    }

    public function mount()
    {
        $this->notifications = $this->getNotifications();
    }

    public function render()
    {
        return view('livewire.notification-index');
    }
}
