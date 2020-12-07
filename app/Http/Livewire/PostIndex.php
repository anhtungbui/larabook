<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class PostIndex extends Component
{
    public User $user;
    public $posts;
    public $amountOfPosts = 3;

    public function mount($user)
    {
        // ddd($user);
        $this->user = $user;

        // foreach($user->posts as $post) {
        //     ddd($post);
        // }
        // ddd($this->amountOfPosts);
        
                                  

        // ddd($this->posts);    
        // dd($user->posts()->first());
        // $this->posts = $user->posts->take(3);

        // $this->posts = Post::with(['comments', 'likes'])->where('user_id', $user->id)->get();
        // ddd($this->posts);
    }

    public function getPosts()
    {
        return $this->user->posts()->latest()
                                   ->take($this->amountOfPosts)
                                   ->get();
    }

    public function loadMore()
    {
        $this->amountOfPosts += 3;
    }

    public function render()
    {
        $this->posts = $this->user->posts
                                  ->take($this->amountOfPosts);
        
                                  
        // $this->posts = $this->getPosts();
        // ddd($this->user->posts);
        return view('livewire.post-index');
    }
}
