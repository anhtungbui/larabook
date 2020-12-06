<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PostIndex extends Component
{
    public User $user;
    public $posts;
    public $amountOfPosts = 3;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function getPosts()
    {
        return $this->user->posts()->latest()
                                   ->take($this->amountOfPosts)
                                   ->get();
    }

    public function loadMore()
    {
        $this->amountOfPosts += 3;
    }

    public function render()
    {
        $this->posts = $this->getPosts();

        return view('livewire.post-index');
    }
}
