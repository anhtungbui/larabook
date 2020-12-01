<div class="ml-2">
    @if ($isFollowed)
        <button class="btn btn-danger" wire:click="unfollowUser">
            <div>
                <i class="fas fa-heart-broken mr-2"></i>Unfollow
            </div>
        </button>
    @else
        <button class="btn btn-primary" wire:click="followUser">
            <div>
                <i class="fas fa-heart mr-2"></i>Follow
            </div>
        </button>
    @endif
</div>
