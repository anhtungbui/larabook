<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CommentIndex extends Component
{
    public Post $post;
    public $comments;
    protected $listeners = ['commentCreated'];
    public $viewAllBtnClicked = false;

    public function mount($post)
    {
        // dd($post);
        $this->post = $post;
        $this->comments = $this->post->comments;
        $this->comments->count() > 0 
                            ? $this->viewAllBtnClicked = false
                            : $this->viewAllBtnClicked = true;
    }

    public function viewAll()
    {
        $this->viewAllBtnClicked = true;
    }

    public function commentCreated($postId)
    {
        if ($this->post->id === $postId) {
            $this->viewAllBtnClicked ? '' : $this->viewAllBtnClicked = true;
        }
    }

    public function render()
    {
        return view('livewire.comment-index');
    }
}
