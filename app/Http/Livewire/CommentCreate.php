<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class CommentCreate extends Component
{
    public $content;
    public $postId;

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function submit()
    {
        $this->validate([
            'content' => ['required']
            ]);

        auth()->user()->comments()->create([
                                    'content' => $this->content,
                                    'post_id' => $this->postId,
                                    ]);
                                    
        $this->emit('commentCreated');
        $this->content = '';
        $this->notify();
    }

    public function notify()
    {
        $post = Post::find($this->postId);
        
        // Fire a notification only if we do some activities on other people's profile
        if ($post->user->id !== auth()->id()) {
            $post->user->notifications()->create([
                    'from_user_id' => auth()->id(),
                    'content' => auth()->user()->name . ' commented on one of your posts',
                    'source_url' => route('posts.show', [$post->user->username, $this->postId]),
                    'type' => 'comment'
                ]);
        }
    }

    public function render()
    {
        return view('livewire.comment-create');
    }
}
