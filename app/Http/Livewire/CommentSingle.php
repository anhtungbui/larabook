<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentSingle extends Component
{
    public $comment;
    public $commenter;
    public $post;

    public function mount($comment, $post)
    {   
        $this->comment = $comment;
        $this->commenter = $comment->user;
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.comment-single');
    }
}
