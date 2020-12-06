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
        $this->comments = Comment::latest()
                                ->where('post_id', $this->post->id)
                                ->take(2)
                                ->get();
                                
        $this->comments->count() === 2 
            ? $this->lastComment = $this->comments->pop()
            : $this->lastComment = null;

    }

    public function viewAll()
    {
        $this->lastComment = null;
        $this->comments = Comment::where('post_id', $this->post->id)->get();
    }

    public function commentCreated($newComment)
    {
        $this->post->id === $newComment['post_id'] ? $this->viewAll() : '';
    }

    public function render()
    {
        return view('livewire.comment-index');
    }
}
