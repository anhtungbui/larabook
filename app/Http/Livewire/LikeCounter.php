<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikeCounter extends Component
{
    public $post;
    public $likeCount;
    protected $listeners = ['likeBtnClicked', 'unlikeBtnClicked'];

    public function mount($post)
    {
        $this->post = $post;
        $this->likeCount = $this->post->likes->count();
    }

    public function likeBtnClicked($postId)
    {
        if ($this->post->id === $postId) {
            $this->likeCount += 1;
        }
    }

    public function unlikeBtnClicked($postId)
    {
        if ($this->post->id === $postId) {
            $this->likeCount -= 1;
        }
    }

    public function render()
    {
        return view('livewire.like-counter');
    }
}
