<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentIndex extends Component
{
    protected $listeners = ['commentCreated'];

    public $postId;

    public $comments;

    public $lastComment;

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->lastComment = Comment::where('post_id', $this->postId)->get()->last();
    }

    public function showAll()
    {
        $this->lastComment = null;
        $this->comments = Comment::where('post_id', $this->postId)->get();
    }

    public function commentCreated()
    {
        $this->showAll();
    }

    public function render()
    {
        return view('livewire.comment-index');
    }
}
