<nav class="nav nav-borders mt-2 pl-3 justify-content-around">
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
            <livewire:add-friend :user="$user" />

            <!-- Follow/Unfollow -->
            <livewire:follow-button :user="$user" />
        @endif

    </div>
</nav>
<hr class="mt-0 mb-4" />