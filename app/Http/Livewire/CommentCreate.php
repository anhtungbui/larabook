<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Notifications\CommentCreated;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class CommentCreate extends Component
{
    public Post $post;
    public $content;
    
    protected $rules = [
        'content' => 'required|min:2'
    ];

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.comment-create');
    }

    public function submitComment()
    {
        $this->validate();

        auth()->user()->comments()->create([
                                        'content' => $this->content,
                                        'post_id' => $this->post->id,
                                    ]);
                                    
        $this->content = '';

        Notification::send($this->post->user, new CommentCreated($this->post));
        $this->emit('commentCreated', $this->post->id);
    }
}
