<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostSingle extends Component
{
    public Post $post;

    public function mount($post)
    {
        $this->post = $post;
        // dd($post);
    }

    public function render()
    {
        return view('livewire.post-single');
    }
}
