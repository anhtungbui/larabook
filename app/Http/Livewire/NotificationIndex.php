<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;

class NotificationIndex extends Component
{
    public $notifications;
    public $amount = 5;
    public $unreadNotificationsCount;

    protected $listeners = [
        'notificationDeleted',
        'friendRequestUpdated',
    ];

    public function mount()
    {
        $this->unreadNotificationsCount = auth()->user()->unreadNotifications->count();
    }

    public function render()
    {
        $this->notifications = $this->getNotifications();

        return view('livewire.notification-index');
    }

    protected function getNotifications()
    {
        $notifications = Notification::latest()
        ->where('user_id', auth()->id())
        ->take($this->amount)
        ->get();

        foreach($notifications as $notification) {
            $notification->is_read = true;
            $notification->save();
        }

        return $notifications;
    }

    public function notificationDeleted($notificationId)
    {
        Notification::findOrFail($notificationId)->delete();
        $this->dispatchBrowserEvent('action-performed', ['message' => 'Notification deleted']);
        $this->decreaseTotalAmount();
    }

    public function loadMore()
    {
        $this->amount += 5;
    }

    public function friendRequestUpdated($requesterId)
    {
        $notification = Notification::where([
            ['from_user_id', $requesterId],
            ['user_id', auth()->id()],
            ['type', 'friend request']
        ]);
        $notification->delete();
        $this->decreaseTotalAmount();
    }
    
    protected function decreaseTotalAmount()
    {
        $this->unreadNotificationsCount -= 1;
    }
}
