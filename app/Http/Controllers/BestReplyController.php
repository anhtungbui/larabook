<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BestReplyController extends Controller
{
    public function update(User $user, Post $post, Comment $comment)
    {
        Gate::authorize('update-post', $post);

        $post->best_reply_id = $comment->id;
        $post->save();
        
        $this->notify($comment->user, $post);

        return back();
    }

    // TODO: notify type = comment?
    protected function notify($commenter, $post)
    {
        $commenter->notifications()->create([
                'from_user_id' => auth()->id(),
                'content' => auth()->user()->name . ' loved on one of your comments',
                'source_url' => route('posts.show', [auth()->user()->username, $post->id]),
                'type' => 'comment'
            ]);
    }
}
