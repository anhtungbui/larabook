<nav class="nav nav-borders mt-2 pl-3 justify-content-between">
    <div class="d-flex">
        <a class="nav-link {{ Request::path() === Request::segment(1) ? 'active' : '' }}" href="{{ route('profile', [$user->username]) }}">Posts</a>
        <a class="nav-link" href="{{ route('profile', [$user->username]) }}/about">About</a>
        <a 
            class="nav-link {{ Str::contains(Request::path(),'friends') ? 'active' : '' }}" 
            href="{{ route('profile', [$user->username]) }}/friends">Friends
        </a>
        <a 
            class="nav-link {{ Str::contains(Request::path(),'photos') ? 'active' : '' }}"
            href="{{ route('profile', [$user->username]) }}/photos">Photos
        </a>
    </div>
    <div class="mr-4 mb-2 d-flex">
        
        @if (auth()->id() !== $user->id)
            <!-- Add friend -->
            <form action="" method="POST">
                    <input type="submit" class="btn btn-success" value="Add Friend">
            </form>
            <!-- Follow -->
            @if ($followingUsers->contains($user->id))
                <form action="{{ route('profile', [$user->username]) }}/unfollow" method="POST" class="pl-2">
                    @csrf
                    <input type="submit" class="btn btn-outline-danger" value="Unfollow">
                </form>
            @else
                <form action="{{ route('profile', [$user->username]) }}/follow" method="POST" class="pl-2">
                    @csrf
                    <input type="submit" class="btn btn-outline-success" value="Follow">
                </form>
            @endif
        @endif

    </div>
</nav>
<hr class="mt-0 mb-4" />