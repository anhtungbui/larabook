<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class CommentIndex extends Component
{
    public Post $post;
    public $comments;
    public $lastComment;
    protected $listeners = ['commentCreated'];
    
    public function mount($post)
    {
        $this->post = $post;
        $this->lastComment = Comment::where('post_id', $this->post->id)
                                            ->get()
                                            ->last();
    }

    public function showAll()
    {
        $this->lastComment = null;
        $this->comments = Comment::where('post_id', $this->post->id)->get();
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
