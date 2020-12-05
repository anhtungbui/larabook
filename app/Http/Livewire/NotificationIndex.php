<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;

class NotificationIndex extends Component
{
    public $notifications;
    public $amount = 5;
    public $totalAmount;

    protected $listeners = [
        'deleteClicked' => '$refresh',
        'notificationDeleted',
        'friendRequestUpdated',
    ];

    public function mount()
    {
        $this->totalAmount = Notification::latest()
                    ->where('user_id', auth()->id())
                    ->get()
                    ->count();
    }

    protected function getNotifications()
    {
        return Notification::latest()
        ->where('user_id', auth()->id())
        ->take($this->amount)
        ->get();
    }

    public function notificationDeleted($notificationId)
    {
        Notification::findOrFail($notificationId)->delete();
        $this->decreaseTotalAmount();
        session()->flash('message', 'Notification deleted');
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
        $this->totalAmount -= 1;
    }
    
    public function render()
    {
        $this->notifications = $this->getNotifications();

        return view('livewire.notification-index');
    }
}
