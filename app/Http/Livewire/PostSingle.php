<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class PostSingle extends Component
{
    public Post $post;
    public User $user;

    public function mount($post, $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.post-single');
    }
}
