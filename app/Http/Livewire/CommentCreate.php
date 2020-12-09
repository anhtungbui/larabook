<?php

namespace App\Http\Livewire;

use App\Models\Post;
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
        $this->notify();
        $this->emit('commentCreated', $this->post->id);
    }

    public function notify()
    {
        // Fire a notification only if we do some activities on other people's profile
        if ($this->post->user->id !== auth()->id()) {
            $this->post->user->notifications()->create([
                    'from_user_id' => auth()->id(),
                    'content' => auth()->user()->name . ' commented on one of your posts',
                    'source_url' => route('posts.show', [$this->post->user->username, $this->post->id]),
                    'type' => 'comment'
                ]);
        }
    }
}
