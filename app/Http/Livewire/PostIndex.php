<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PostIndex extends Component
{
    public User $user;
    public $posts;

    public function mount($user)
    {
        $this->user = $user;
        $this->posts = $this->getPosts();
    }

    public function getPosts()
    {
        return $this->user->posts()->latest()->get();
    }

    public function render()
    {
        return view('livewire.post-index');
    }
}
