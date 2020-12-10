<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class NewsfeedFollowings extends Component
{
    public $posts;

    public function render()
    {
        $this->posts = $this->getNewsFromFollowings();

        return view('livewire.newsfeed-followings');
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

        return $this->filterEmpty($newsFromFollowings);
    }

    protected function filterEmpty($collection)
    {
        return $collection ->filter(function ($item) {
            return isset($item);
        });
    }
}
