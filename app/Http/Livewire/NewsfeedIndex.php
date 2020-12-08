<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class NewsfeedIndex extends Component
{
    public $posts;
    public $friends;

    public function mount()
    {
      
    }

    public function render()
    {
        // For each random friend, get one latest post (10 people)
        $postsFromFriends = $this->getNewsFromFriends();

        // For each random following user, get one latest post (5 people)
        $postsFromFollowings = $this->getNewsFromFollowings();

        $this->posts = $postsFromFriends->merge($postsFromFollowings);
                                        
        $this->posts = $this->filterEmpty($this->posts)
                            ->sortByDesc('created_at');

        return view('livewire.newsfeed-index');
    }

    protected function getNewsFromFriends()
    {
        $friends = auth()->user()->friends->where('pivot.status', 'accepted');
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

    protected function getNewsFromFollowings()
    {
         $followingUsers = auth()->user()->follows;
         $followingUsers->count() > 5 
                        ? $randomFollowings = 5 
                        : $randomFollowings = $followingUsers->count(); 
         $followingUsers = $followingUsers->random($randomFollowings);

         $newsFromFollowings = collect([]);

         foreach ($followingUsers as $followingUser) {
             $followingsPosts = User::with(['latestPosts.user.profile', 'latestPosts.likes', 'latestPosts.comments'])
                                    ->find($followingUser->id)
                                    ->latestPosts->first();
 
             $newsFromFollowings->push($followingsPosts);
         }
 
        return $newsFromFollowings;
    }

    protected function filterEmpty($collection)
    {
        return $collection ->filter(function ($item) {
            return isset($item);
        });
    }
}
