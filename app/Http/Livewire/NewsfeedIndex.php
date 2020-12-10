<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class NewsfeedIndex extends Component
{
    public $posts;
    protected $listeners = [
        'followingsClicked',
        'groupClicked'
    ];

    public function mount()
    {
      $this->posts = $this->getNewsFromFriends();
    }

    public function render()
    {
        return view('livewire.newsfeed-index');
    }

    protected function getNewsFromFriends()
    {
        // $friends = auth()->user()->friends->where('pivot.status', 'accepted');
        $friends = auth()->user()->approvedFriends;
        $friends->count() > 5 
                ? $randomFriends = 5
                : $randomFriends = $friends->count(); 
        $friends = $friends->random($randomFriends);

        $newsfeedPosts = collect([]);
        foreach ($friends as $friend) {
            $friendsPosts = User::with(['latestPosts.user.profile', 'latestPosts.likes', 'latestPosts.comments'])
                                ->find($friend->id)
                                ->latestPosts->take(1);

            $newsfeedPosts->push($friendsPosts);
        }
        
        return $newsfeedPosts->flatten(1);
    }
}
