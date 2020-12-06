<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Notification;
use Livewire\Component;

class LikeButton extends Component
{
    public $isPostLiked = false;
    public $post;

    public function mount($post)
    {
        $this->post = $post;
        $this->isPostLiked = $this->checkPostLiked();
    }

    public function checkPostLiked()
    {
        return Like::where([
                ['user_id', auth()->id()],
                ['post_id', $this->post->id]
            ])
            ->get()
            ->isNotEmpty();
    }

    public function like()
    {
        auth()->user()->likes()->create(['post_id' => $this->post->id]);
        auth()->id() === $this->post->user->id ? '' : $this->notify();
        $this->emit('likeBtnClicked');
        $this->isPostLiked = true;
    }

    public function unlike()
    {
        auth()->user()->likes()->where('post_id', $this->post->id)
                               ->delete();
        $this->emit('unlikeBtnClicked');
        $this->isPostLiked = false;
    }

    protected function notify()
    {
        Notification::create([
            'from_user_id' => auth()->id(),
            'user_id' => $this->post->user->id,
            'content' => auth()->user()->name . ' liked one of your posts',
            'source_url' => route('posts.show', [$this->post->user->username, $this->post->id]),
            'type' => 'like'
        ]);
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
