<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CommentCounter extends Component
{
    public $post;
    public $commentCount;
    protected $listeners = ['commentCreated'];

    public function mount($post)
    {
        $this->post = $post;
        $this->commentCount = $post->comments->count();
    }

    public function commentCreated($postId)
    {
        if ($this->post->id === $postId) {
            $this->commentCount += 1;
        }
    }

    public function render()
    {
        return view('livewire.comment-counter');
    }
}
