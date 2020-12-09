<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public User $user;

    public function mount($user)
    {
        $this->user = $user;
    }
    
    public function render()
    {
        $posts = $this->getPosts();
        
        return view('livewire.post-index', compact('posts'));
    }

    protected function getPosts()
    {
        return $this->user->latestPosts()
                          ->with('likes', 'comments', 'user')
                          ->paginate(5);
    }
}
