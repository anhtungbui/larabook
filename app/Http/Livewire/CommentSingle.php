<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentSingle extends Component
{
    public $comment;
    public $commenter;

    public function mount($comment)
    {   
        $this->comment = $comment;
        $this->commenter = $comment->user;
    }

    public function render()
    {
        return view('livewire.comment-single');
    }
}
