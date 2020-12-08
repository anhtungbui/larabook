<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikeCounter extends Component
{
    public $post;
    public $likeCount;
    public $isPostLiked;
    protected $listeners = ['likeBtnClicked', 'unlikeBtnClicked'];

    public function mount($post)
    {
        $this->post = $post;
        $this->likeCount = $this->post->likes->count();
        $this->isPostLiked = $this->checkPostLiked();
    }

    public function checkPostLiked()
    {
        return $this->post->likes->where('user_id', auth()->id())
                                 ->isNotEmpty();
    }

    public function likeBtnClicked($postId)
    {
        if ($this->post->id === $postId) {
            $this->isPostLiked = true;
            $this->likeCount += 1;
        }
    }

    public function unlikeBtnClicked($postId)
    {
        if ($this->post->id === $postId) {
            $this->isPostLiked = false;
            $this->likeCount -= 1;
        }
    }

    public function render()
    {
        return view('livewire.like-counter');
    }
}
