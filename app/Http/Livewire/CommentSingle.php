<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentSingle extends Component
{
    public $comment;

    public function mount($comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.comment-single');
    }
}
